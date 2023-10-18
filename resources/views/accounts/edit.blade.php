<x-app-layout>
    <form
      action="{{ route('accounts.update',$account) }}"
      class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
      method="POST"
    >
      @csrf
      @method('PUT')
      <div class="">
        <h1>Nueva cuenta</h1>
        <h2>Crea tus cuentas de banco, efectivo o tarjetas de crédito</h2>
      </div>
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
            value="{{ $account->name }}"
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
            value="{{ $account->number }}"
          >
        </div>
        <div class="flex flex-col">
          <label for="amount">Monto inicial</label>
          <input
            type="number"
            id="amount"
            name="amount"
            class="rounded-md"
            value="{{ $account->amount }}"
          >
        </div>
      </div>
      <button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">Editar cuenta</button>
    </form>
  </x-app-layout>

