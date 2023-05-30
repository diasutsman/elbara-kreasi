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
                ->action(function () {
                    $invoice = $this->record;
                    $invoiceNumber = 'INV-' . str_pad($invoice->id, 4, '0', STR_PAD_LEFT);
                    $invoiceDate = $invoice->due_on->format('j-F-Y');
                    $filename = "invoice_{$invoiceNumber}_{$invoiceDate}.pdf";
                    $html = view('invoice', [
                        'invoice' => $invoice,
                        'invoiceNumber' => $invoiceNumber,
                        'filename' => "invoice_{$invoiceNumber}_{$invoiceDate}.pdf",
                    ])->render();
                    Browsershot::html($html)->save('storage/' . $filename);
                    return response()->download('storage/' . $filename)->deleteFileAfterSend();
                }),
            // ->url(fn () => route('print', $this->record))
            // ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
