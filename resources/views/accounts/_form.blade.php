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
  <div class="flex flex-col">
    <label for="name">Nombre de la cuenta</label>
    <input
      type="text"
      id="name"
      name="name"
      class="rounded-md"
      value="{{ old('name',$account->name) }}"
    >
  </div>
  <select
    name="type"
    class="w-full rounded-md"
  >
    <option value="Banco nacional">Banco nacional</option>
    <option value="Tarjeta de credito">Tarjeta de crédito</option>
    <option value="Efectivo">Efectivo</option>
  </select>
  <div class="flex flex-col">
    <label for="number">Numero de cuenta</label>
    <input
      type="text"
      id="number"
      name="number"
      class="rounded-md"
      value="{{ old('number',$account->number) }}"
      
    >
  </div>
  <div class="flex flex-col">
    <label for="amount">Saldo</label>
    <input
    
      type="number"
      id="amount"
      name="amount"
      class="rounded-md {{ $account->amount ? 'bg-gray-100 cursor-not-allowed' : '' }}"
      value="{{ old('amount',$account->amount) }}"
      {{ $account->amount ? 'disabled readonly' : '' }}
    >
  </div>
</div>
<button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>