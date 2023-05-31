<?php

namespace App\Filament\Resources;

use Closure;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Invoice;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Filament\Resources\InvoiceResource\RelationManagers\InvoiceItemsRelationManager;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Card::make([
                    Forms\Components\TextInput::make('bill_from')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('bill_to')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('bill_from_address')
                        ->required(),
                    Forms\Components\TextInput::make('bill_to_address')
                        ->required(),
                ])->columns(2),

                Forms\Components\TextInput::make('recipient_email')
                    ->email()
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('e.g. example@email.com')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bill_title')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Invoice for custom cup.')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('issued_on')
                    ->required()
                    ->minDate(now()->format('Y-m-d'))
                    ->reactive()
                    ->displayFormat('d M Y'),
                Forms\Components\DatePicker::make('due_on')
                    ->minDate(fn (Closure $get) => Carbon::parse($get('issued_on')))
                    ->displayFormat('d M Y')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bill_title'),
                Tables\Columns\TextColumn::make('bill_from')
                    ->description(fn (Invoice $record): string => $record->bill_from_address),
                Tables\Columns\TextColumn::make('bill_to')
                    ->description(fn (Invoice $record): string => $record->bill_to_address),
                Tables\Columns\TextColumn::make('recipient_email'),
                Tables\Columns\TextColumn::make('issued_on')
                    ->date('d M Y'),
                Tables\Columns\TextColumn::make('due_on')
                    ->date('d M Y'),
                Tables\Columns\CheckboxColumn::make('paid'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->view('invoice'),
                    Tables\Actions\ReplicateAction::make()->button()->color('danger')
                        ->form([
                            Forms\Components\DatePicker::make('issued_on')->required()
                                ->minDate(now()->format('Y-m-d'))
                                ->reactive()
                                ->displayFormat('d M Y'),
                            Forms\Components\DatePicker::make('due_on')->required()
                                ->minDate(fn (Closure $get) => Carbon::parse($get('issued_on')))
                                ->displayFormat('d M Y')
                                ->required()
                        ])
                        ->beforeReplicaSaved(function (Model $replica, array $data): void {
                            $replica->issued_on = $data['issued_on'];
                            $replica->due_on = $data['due_on'];
                        }),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('print')
                        ->icon('heroicon-o-printer')
                        ->url(fn (Invoice $record): string => route('print', $record))
                        ->openUrlInNewTab()
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            InvoiceItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
