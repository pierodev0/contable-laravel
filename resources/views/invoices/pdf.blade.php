@php
  $color['Por cobrar'] = "text-red-500";
  $color['Anulada'] = "text-blue-800";
  $color['Cobrada'] = "text-teal-500";
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
<body>
  
    <div class="bg-white p-6 rounded-lg space-y-5 relative">  
        <div class="mr-auto flex w-full flex-col gap-2 rounded-xl bg-white">
            <div class="flex justify-between">
                <div class="flex flex-col justify-center">
                    <h1 class="font-bold text-3xl">JHARDSYSTEX S.A.C</h1>
                    <p class="text-sm">AV. TUPAC AMARU NRO. 1719 URB. HUAQUILLAY ET. UNO LIMA - LIMA - COMAS</p>
                </div>
                <div class="flex flex-col justify-center items-center bg-gray-500/10 px-3 py-1">
                    <p class="text-2xl font-bold">Factura Electrónica</p>
                    <p class="font-bold">RUC: 20610936165</p>
                    <p class="font-bold">{{ $invoice->invoice_code }}</p>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label class="flex gap-2 items-center text-sm">
                    <span class="min-w-[150px]">Fecha de emisión:</span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ date('d-m-Y', strtotime($invoice->create_date)) }}
                    </p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="min-w-[150px]">Fecha de vencimiento:</span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ date('d-m-Y', strtotime($invoice->due_date)) }}
                    </p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="min-w-[150px]">Señor: </span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ $invoice->client->name }}</p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                  <span class="min-w-[150px]">Direccion del cliente:</span>
                  <p class=" font-bold py-0.5 px-2 rounded-md">{{ $invoice->client->direction }}</p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="min-w-[150px]">RUC: </span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ $invoice->client->ruc }}</p>
                  </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="min-w-[150px]">Tipo de moneda:</span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">Soles</p>
                </label>
            </div>
        </div>
        <table class="w-full table-auto">
            <thead class="bg-gray-100 text-xs font-semibold text-gray-400">
                <tr class="text-left">
                    <th class="p-3 text-blue-900">Item</th>
                    <th class="p-3 text-blue-900">Precio Unitario</th>
                    <th class="p-3 text-blue-900">Cantidad</th>
                    <th class="p-3 text-blue-900">Importe sin IGV</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white  text-sm min-h-[50px]" id="detalles">
                @foreach ($invoice->invoiceDetails as $invoiceDetail)
                    <tr>
                        <td class="p-3">{{ $invoiceDetail->item->name }}</td>
                        <td class="p-3">{{ $invoiceDetail->price }}</td>
                        <td class="p-3">{{ $invoiceDetail->quantity }}</td>
                        <td class="p-3">{{ number_format($invoiceDetail->price * $invoiceDetail->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-6 flex flex-col text-right w-1/3 ml-auto">
            <div class="flex flex-col">
                <p class="flex gap-2 justify-end p-1"><span>Subtotal</span><span class="w-1/2"
                        id="subtotal">S/{{ number_format($subtotal, 2) }}</span></p>
                <p class="flex gap-2 justify-end p-1"><span>IGV {{ number_format($invoice->tax,0) }}%</span><span class="w-1/2"
                        id="total_igv">S/{{ number_format(($subtotal * $invoice->tax) / 100, 2) }}</span></p>
                <p class="flex gap-2 justify-end p-1 font-bold bg-gray-100"><span>Total</span><span class="w-1/2"
                        id="total_html">S/{{ $invoice->total }}</span></p>
            </div>

        </div>
    </div>

  </body>
  </html>