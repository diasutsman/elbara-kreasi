<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;

class PrintInvoiceController extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        $invoiceNumber = 'INV-' . str_pad($invoice->id, 4, '0', STR_PAD_LEFT);
        $invoiceDate = $invoice->due_on->format('j-F-Y');
        $filename = "invoice_{$invoiceNumber}_{$invoiceDate}.pdf";
        // $html = view('invoice', [
        //     'invoice' => $invoice,
        //     'invoiceNumber' => $invoiceNumber,
        //     'filename' => "invoice_{$invoiceNumber}_{$invoiceDate}.pdf",
        // ])->render();
        // Browsershot::html($html)->save('storage/' . $filename);
        // return response()->download('storage/' . $filename)->deleteFileAfterSend();

        $data = [
            'invoice' => $invoice,
            'invoiceNumber' => $invoiceNumber,
            'filename' => "invoice_{$invoiceNumber}_{$invoiceDate}.pdf",
        ];
        $pdf = PDF::make();
        $pdf->loadView('invoice', $data);
        return $pdf->stream($filename);
    }
}
