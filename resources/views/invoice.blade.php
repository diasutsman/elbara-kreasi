<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $filename }}</title>

    @vite('resources/css/app.css')
    <style>
        
    </style>
</head>

<body class="p-6 text-base">
    <div class="ml-auto flex w-fit flex-col text-end">
        <h1 class="text-xl font-bold uppercase">Invoice</h1>

        <h2 class="mt-8 text-lg uppercase">Elbara Kreasi</h2>
        <p>{{ $emailReceiver }} | {{ phone($phoneNumbers, 'ID', 1) }}</p>

        <div class="mt-16 flex w-full justify-between uppercase">
            <p>Invoice Number:</p>
            <p>{{ $invoiceNumber }}</p>
        </div>

        <div class="flex w-full justify-between uppercase">
            <p>Invoice Date:</p>
            <p>{{ $invoice->issued_on->format('j F Y') }}</p>
        </div>

        <div class="flex w-full justify-between uppercase">
            <p>Due:</p>
            <p>{{ $invoice->due_on->format('j F Y') }}</p>
        </div>
    </div>

    @php
        $total = 0;
    @endphp
    <table class="mt-10 w-full table-fixed rounded border" cellpadding="16">
        <thead class="text-end">
            <tr class="border-collapse border">
                <th class="text-start">Description</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($invoice->invoice_items as $item)
                @php
                    $total += $item->quantity * $item->price;
                @endphp
                <tr class="border-collapse border text-end">
                    <td class="text-start">{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ money($item->price, 'IDR', true) }}</td>
                    <td>{{ money($item->quantity * $item->price, 'IDR', true) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        $tax = $total * 0.11;
    @endphp
    <div class="ml-auto mt-8 w-1/3 border p-4">
        <div class="flex justify-between">
            <p>Sub Total (before tax):</p>
            <p>{{ money($total, 'IDR', true) }}</p>
        </div>

        <div class="flex justify-between">
            <p>Tax:</p>
            <p>{{ money($tax, 'IDR', true) }}</p>
        </div>

        <div class="mt-10 flex justify-between">
            <p>Amount due on {{ $invoice->due_on->format('j F Y') }}:</p>
            <p>{{ money($total + $tax, 'IDR', true) }}</p>
        </div>
    </div>

    <p class="mt-10 uppercase text-gray-400">Payment Instructions</p>

    <div class="flex justify-between">
        <div>
            <p class="my-2">Elbara Kreasi</p>
            <p>Bank name: Bank BCA</p>
            <p>No. Rek: 342920809428</p>
            <p>Please use {{ $invoiceNumber }} as a reference number</p>
        </div>
        <div>
            <p>Pay Online</p>
            <a class="underline" href="https://gopay.com">https://gopay.com</a>
        </div>
    </div>

    <p class="mt-8">For any questions please contact us at {{ $emailReceiver }}</p>

</body>

</html>

