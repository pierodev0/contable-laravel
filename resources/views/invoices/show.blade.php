@php
  $color['Por cobrar'] = "text-red-500";
  $color['Anulada'] = "text-blue-800";
  $color['Cobrada'] = "text-teal-500";
@endphp
<x-app-layout>
  <h1 class="text-3xl mb-2 text-teal-800"> Factura de venta {{ $invoice->invoice_code }}</h1>
  <div class="mb-2">
    <button class="border text-sm border-teal-700 text-teal-700 py-0.5 px-5 rounded bg-white"><i class="fa-solid fa-print"></i> Imprimir</button>
    @if ($invoice->status == "Por cobrar")
    <a href="{{ route('movements.create',$invoice) }}" class="border text-sm border-teal-700 text-teal-700 py-0.5 px-5 rounded bg-white"><i class="fa-solid fa-plus"></i> Agregar pago</a>
    @endif   
  </div>

    <section class="shadow-md mb-4 flex divide-x-2">
      <div class="bg-white py-4 px-8 text-center flex-1">
        <p class="text-sm">Estado</p>
        <p class="font-bold {{ $color[$invoice->status] }}">{{ $invoice->status }}</p>
      </div>
      <div class="bg-white py-4 px-8 text-center flex-1">
        <p class="text-sm">Valor total</p>
        <p class="font-bold">S/{{ $invoice->total }}</p>
      </div>      
      <div class="bg-white py-4 px-8 text-center flex-1">
        <p class="text-sm">Cobrado</p>
        <p class="font-bold text-teal-500">S/ {{ $invoice->status == "Cobrada" ? $invoice->total : 0 }}</p>
      </div>
      <div class="bg-white py-4 px-8 text-center flex-1">
        <p class="text-sm">Por cobrar</p>
        <p class="font-bold text-red-400">S/{{ $invoice->status == "Por cobrar" ? $invoice->total : 0 }}</p>
      </div>
    </section>
    <div class="bg-white p-6 rounded-lg shadow-lg space-y-5 relative">  
        <div class="{{ $invoice->status == "Anulada" ? 'absolute inset-0 bg-white z-10 opacity-60' : '' }}"></div>      
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

</x-app-layout>
