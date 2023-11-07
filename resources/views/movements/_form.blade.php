<div class="space-y-3">
    @if ($errors->any())
        <div class="">
            <ul class="flex flex-col gap-2">
                @foreach ($errors->all() as $error)
                    <li class="bg-red-400 p-2 text-sm text-white rounded-md">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif   
    @if ($invoice != null)
        <input type="hidden" name="type" value="add">
    @endif
    @if ($invoice == null)
    <div>
        <label for="type">Tipo de movimiento</label>
        <select id="type" name="type" class="w-full rounded-md">
            <option value="add" {{ $movement->type == 'add' ? 'selected' : '' }}>Ingresos</option>
            <option value="out" {{ $movement->type == 'out' ? 'selected' : '' }}>Egresos</option>
        </select>
    </div>
    
    <div class="flex flex-col">
        <label for="amount">Monto</label>
        <input type="number" id="amount" name="amount" class="rounded-md"
            value="{{ old('amount', $movement->amount) }}">
    </div>   
    
    {{-- <div class="flex flex-col">
        <label for="tax">Impuesto</label>
        <input type="number" id="tax" name="tax" class="rounded-md" value="{{ old('tax', $movement->tax) }}">
    </div> --}}
    <div>
        <label for="type">Categorias</label>
        <select id="category_id" name="category_id" class="w-full rounded-md">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $movement->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div>
        <label for="type">Cuentas</label>
        <select id="account" name="account_id" class="w-full rounded-md">
            <option value="">--Seleccione una opcion --</option>
            @foreach ($accounts as $account)
                <option data-total={{ $account->amount }} value="{{ $account->id }}" {{ $movement->account_id == $account->id ? 'selected' : '' }}>
                    {{ $account->name }}</option>
            @endforeach
        </select>
        <p class="p-2">Saldo Actual: <span id="total"></span></p>   
  
    @if ($invoice != null)
    <table class="w-full table-auto">
        <thead class="bg-gray-50 text-xs font-semibold text-gray-400">
            <tr class="text-left">
                <th class="p-3 text-blue-900">ID</th>
                <th class="p-3 text-blue-900">Fecha</th>
                <th class="p-3 text-blue-900">Cliente</th>
                <th class="p-3 text-blue-900">Total</th>
                <th class="p-3 text-blue-900">Estado</th>
                <th class="p-3 text-blue-900">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white text-sm">
              @php
                  $color['Por cobrar'] = "text-red-500";
                  $color['Anulada'] = "text-blue-800";
                  $color['Cobrada'] = "text-teal-500";
              @endphp
            
               
                <tr class="hover:bg-gray-200">
                    <td class="p-3">{{ $invoice->invoice_code }}<input type="hidden" value="{{ $invoice->invoice_code }}" name="invoice_code"></td>
                    <td class="p-3">{{ formatDate($invoice->create_date) }}</td>
                    <td class="p-3">{{ $invoice->client->name }}</td>
                    <input type="hidden" value="{{ $invoice->total }}" name="amount">
                    <td class="p-3">{{ $invoice->total }}</td>
                    <td class="p-3 {{ $color[$invoice->status] }}">{{ $invoice->status }}</td>
                    <td class="flex gap-5 p-3">
                      <a href="{{ route('invoices.show', $invoice) }}"><i class="fa-solid fa-eye"
                          style="color: #878787;"></i>
                        </a>                                     
                    </td>
                </tr>
              
               
            
  
        </tbody>
    </table>
    @endif
    <button class="w-full rounded-md mt-5 bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>
@push('script')

<script>
    getTotalAccount();

    function getTotalAccount() {
        const accountSelect = document.querySelector('#account');
        const totalEl = document.querySelector('#total')
        // totalEl.textContent = accountSelect[0].dataset.total
        accountSelect.addEventListener('change', function(e) {
            let total = e.target[e.target.selectedIndex].dataset.total
            totalEl.textContent = total
        })
    }

    // const fechaInput = document.getElementById('date');
    // // Obtener la fecha actual en el formato YYYY-MM-DD
    // const fechaActual = new Date().toISOString().split('T')[0];
    // // Establecer el valor del input date
    // fechaInput.value = fechaActual;
</script>

@endpush