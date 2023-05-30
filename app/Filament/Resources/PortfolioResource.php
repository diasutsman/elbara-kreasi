<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Forms\Components\TextInput;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PortfolioResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PortfolioResource\RelationManagers;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('client')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('product_id')
                    ->searchable()
                    ->required()
                    ->relationship('product', 'name'),
                Forms\Components\FileUpload::make('image')
                    ->directory('portfolio-images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable()->wrap(true),
                Tables\Columns\TextColumn::make('client')->searchable()->sortable()->wrap(true),
                Tables\Columns\TextColumn::make('product.name')->searchable()->sortable()->wrap(true),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePortfolios::route('/'),
        ];
    }
}
