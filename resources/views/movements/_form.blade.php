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
    <div class="flex flex-col">
        <label for="tax">Impuesto</label>
        <input type="number" id="tax" name="tax" class="rounded-md" value="{{ old('tax', $movement->tax) }}">
    </div>
    <div>
        <label for="type">Categorias</label>
        <select id="category_id" name="category_id" class="w-full rounded-md">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $movement->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="type">Cuentas</label>
        <select id="account" name="account_id" class="w-full rounded-md">
            <option>--Seleccione una opcion --</option>
            @foreach ($accounts as $account)
                <option data-total={{ $account->amount }} value="{{ $account->id }}" {{ $movement->account_id == $account->id ? 'selected' : '' }}>
                    {{ $account->name }}</option>
            @endforeach
        </select>
        <p>Saldo Actual: <span id="total"></span></p>
    </div>
    {{-- <div class="flex flex-col">
        <label for="date">Fecha</label>
        <input type="date" id="date" name="date" class="rounded-md" value="{{ old('date', $movement->date) }}">
    </div> --}}
    <button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>
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