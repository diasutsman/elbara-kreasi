<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;

class PrintInvoiceController extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        // exec("source /home/u1574149/nodevenv/elbara-kreasi/16/bin/activate");
        // $process = new Process(['source', '/home/u1574149/nodevenv/elbara-kreasi/16/bin/activate']);
        // $process->run();

        // print_r($process->getErrorOutput());

        $invoiceNumber = 'INV-' . str_pad($invoice->id, 4, '0', STR_PAD_LEFT);
        $invoiceDate = $invoice->due_on->format('j-F-Y');
        $filename = "invoice_{$invoiceNumber}_{$invoiceDate}.pdf";
        $data = [
            'invoice' => $invoice,
            'invoiceNumber' => $invoiceNumber,
            'filename' => "invoice_{$invoiceNumber}_{$invoiceDate}.pdf",
        ];

        $pdf = App::make('snappy.pdf.wrapper');

        return $pdf->loadView('invoice', $data)->download($filename);

        // $html = view('invoice', $data)->render();
        // Browsershot::html($html)->save('storage/' . $filename);
        // return response()->download('storage/' . $filename)->deleteFileAfterSend();
    }
}
