<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Artisan;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Process;

class PrintInvoiceController extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        // shell_exec("source /home/u1574149/nodevenv/elbara-kreasi/16/bin/activate");
        Process::run('source /home/u1574149/nodevenv/elbara-kreasi/16/bin/activate');

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
    }
}
