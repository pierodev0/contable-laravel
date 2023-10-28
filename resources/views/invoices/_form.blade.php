<div class="p-4 flex justify-between">
    <h1 class="font-bold text-3xl">JHARDSYSTEX</h1>
    <p class="font-bold">N 0004</p>
</div>
<div class="flex gap-4">
    {{-- <div class="flex flex-col gap-2 items-end flex-1">
        <label class="flex gap-3 items-center w-full">
            <span class="w-1/3 text-right">Contacto</span>
            <input type="text" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1">
        </label>
        <label class="flex gap-3 items-center w-full">
            <span class="w-1/3 text-right">Identificacion</span>
            <input type="number" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1">
        </label>
        <label class="flex gap-3 items-center w-full">
            <span class="w-1/3 text-right">Telefono</span>
            <input type="number" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1">
        </label>
    </div>
    <div class="flex flex-col gap-2 items-end flex-1">
        <label class="flex gap-3 items-center w-full">
            <span class="w-1/3 text-right">Fecha</span>
            <input type="date" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1">
        </label>
        <label class="flex gap-3 items-center w-full">
            <span class="w-1/3 text-right">Plazo de pago</span>
            <input type="date" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1">
        </label>
        <label class="flex gap-3 items-center w-full">
            <span class="w-1/3 text-right">Vencimiento</span>
            <input type="date" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1">
        </label>
    </div> --}}

    <label class="flex flex-col gap-1 flex-grow-[2]">
        <span class="">Cliente</span>
        <select name="client_id" class="py-0.5 px-2 rounded-md border-gray-500/50 w-full" id="client_id">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </label>
    <label class="flex flex-col gap-1 flex-1">
        <span class="">Impuesto</span>
        <input type="number" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1" name="tax"
            id="tax" value="18">
    </label>
</div>
<div class="flex gap-4">
    <label class="flex flex-col gap-1 w-3/6">
        <span class="">Item</span>
        <select name="" class="py-0.5 px-2 rounded-md border-gray-500/50 w-full" id="item_id1">
            <option value="" disabled selected>Selecccione un producto</option>
            @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </label>
    <label class="flex flex-col gap-1 flex-1">
        <span class="">Precio</span>
        <input type="number" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1" name="price"
            id="price">
    </label>
    <label class="flex flex-col gap-1 flex-1">
        <span class="">Cantidad</span>
        <input type="number" class="text-sm py-0.5 px-2 rounded-md border-gray-500/50 flex-1" name="quantity"
            id="quantity">
    </label>
</div>
<div class="flex justify-between">
    <button id="agregar"
        class="text-teal-500 bg-white border-2 border-teal-500 hover:bg-gray-100  py-2 px-6 rounded-md w-fit"> + Agregar
    </button>
   
</div>
<table class="w-full table-auto">
    <thead class="bg-gray-50 text-xs font-semibold text-gray-400">
        <tr class="text-left">
            <th class="p-3 text-blue-900">Item</th>
            <th class="p-3 text-blue-900">Precio</th>
            <th class="p-3 text-blue-900">Cantidad</th>
            <th class="p-3 text-blue-900">Total</th>
            <th class="p-3 text-blue-900">Acciones</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 bg-white  text-sm min-h-[50px]" id="detalles">

    </tbody>
</table>

<div class="p-3 flex flex-col text-right w-1/3 ml-auto">
    <div class="flex flex-col">
        <p class="flex gap-2 justify-end"><span>Subtotal</span><span class="w-1/2" id="subtotal">S/0.00</span></p>
        <p class="flex gap-2 justify-end"><span>IGV</span><span class="w-1/2" id="total_igv">S/0.00</span></p>
    </div>
    <hr class="h-[1px] my-2 bg-gray-500/40 border-0">
    <p class="text-2xl">Total <span id="total_html">S/0.00</span></p>
    <input type="hidden" name="total" id="total_pagar"></p>
</div>
<button id="guardar" class="text-white bg-teal-500 hover:bg-teal-600 ml-auto  py-2 px-6 rounded-md w-fit"> + Registrar
    factura
</button>

@push('script')
    <script>
        let cont = 0;
        let total = 0;
        let subtotal = [];
        let impuesto = +$("#tax").val();

        $(document).ready(function() {
            $('#agregar').on('click', agregar)
            $("#guardar").hide();
            $('#tax').on('input', getImpuesto)
        })


        function agregar(e) {
            e.preventDefault();
            const item_id = $("#item_id1").val();
            const item = $("#item_id1 option:selected").text();
            const quantity = +$("#quantity").val();
            const price = +$("#price").val();
            impuesto = +$("#tax").val();

            subtotal[cont] = quantity * price;
            total = total + subtotal[cont];

            const fila = `
            <tr id="fila-${cont}">
                <td class="p-3">
                    <input type="hidden" name="item_id[]" value="${item_id}">
                    ${item}
                </td>            
                <td>
                    <input type="hidden" id="price[]" name="price[]" value="${price}">
                    ${price}
                </td>
                <td>
                    <input type="hidden" name="quantity[]" value="${quantity}">
                    ${quantity}
                </td>        
                <td class="p-3">${subtotal[cont]}</td>
                <td class="flex gap-5 p-3">
                    <button type="button" onclick="eliminar(${cont})";><i class="fa-solid fa-x" style="color: #878787;"></i></button>
                </td>
            </tr>
            `;
            cont++;
            $('#detalles').append(fila);
            limpiar();
            totales();
            evaluar();
        }

        function limpiar() {
            $("#quantity").val("");
            $("#price").val("");
        }

        function totales() {
            const total_impuesto = total * impuesto / 100;
            const total_pagar = total + total_impuesto;

            $("#subtotal").html("S/ " + total.toFixed(2));

            $("#total_igv").html("S/ " + total_impuesto.toFixed(2));
            $("#total_html").html("S/ " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#subtotal").html("S/" + total);
            $("#total_igv").html("S/" + total_impuesto);
            $("#total_html").html("S/" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila-" + index).remove();
             evaluar();
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function getImpuesto(){
            impuesto = +$("#tax").val();
            totales();
        }
    </script>
@endpush('script')
