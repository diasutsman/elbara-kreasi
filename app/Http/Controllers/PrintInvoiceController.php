<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintInvoiceController extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        $invoiceNumber = 'INV-' . str_pad($invoice->id, 4, '0', STR_PAD_LEFT);
        $invoiceDate = $invoice->due_on->format('j-F-Y');
        $filename = "invoice_{$invoiceNumber}_{$invoiceDate}.pdf";
        // $pdf = Pdf::loadView('invoice', [
        //     'invoice' => $invoice,
        //     'invoiceNumber' => $invoiceNumber,
        //     'filename' => $filename,
        // ]);
        // return $pdf->stream($filename);
        return view('invoice', [
            'invoice' => $invoice,
            'invoiceNumber'=> $invoiceNumber, 
            'filename' => "invoice_{$invoiceNumber}_{$invoiceDate}.pdf",
        ]);
    }
}
