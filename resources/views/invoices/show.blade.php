<x-app-layout>
    <div class="bg-white p-6 rounded-lg shadow-lg space-y-5">
        <div class="mr-auto flex w-full flex-col gap-2 rounded-xl bg-white">
            <div class="flex justify-between">
                <div class="flex flex-col justify-center">
                    <h1 class="font-bold text-3xl">JHARDSYSTEX S.A.C</h1>
                    <p class="text-sm">AV. TUPAC AMARU NRO. 1719 URB. HUAQUILLAY ET. UNO LIMA - LIMA - COMAS</p>
                </div>
                <div class="flex flex-col justify-center items-center bg-gray-500/10 px-3 py-1">
                    <p class="text-2xl font-bold">Factura</p>
                    <p class="font-bold">RUC: 20610936165</p>
                    <p class="font-bold">N 0004</p>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label class="flex gap-2 items-center text-sm">
                    <span class="">Fecha de emision:</span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ date('Y-m-d', strtotime($invoice->invoice_date)) }}
                    </p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="">Fecha de vencimiento:</span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ date('Y-m-d', strtotime($invoice->invoice_date)) }}
                    </p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="">Señor:(es)</span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ $invoice->client->name }}</p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                  <span class="">Direccion del cliente:</span>
                  <p class=" font-bold py-0.5 px-2 rounded-md">TODO: dIRECCION DEL CLIENTE</p>
              </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="">RUC:</span>
                    <p class=" font-bold py-0.5 px-2 rounded-md">{{ $invoice->client->number }}</p>
                </label>
                <label class="flex gap-2 items-center text-sm">
                    <span class="">Tipo de moneda:</span>
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
