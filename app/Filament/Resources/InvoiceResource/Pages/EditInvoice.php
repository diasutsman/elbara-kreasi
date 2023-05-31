<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use Filament\Pages\Actions;
use Spatie\Browsershot\Browsershot;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\InvoiceResource;

class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('Print Invoice')->button()
            ->url(fn () => route('print', $this->record))
            ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
