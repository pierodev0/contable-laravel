<x-app-layout>
  <div class="mb-4">
      <h1 class="text-3xl">Nueva factura</h1>
      {{-- <h2>Crea las categorias para gastos o ingresos</h2> --}}
    </div>
<form
  action="{{ route('invoices.store') }}"
  class="mr-auto flex w-full flex-col gap-2 rounded-xl bg-white p-6"
  method="POST"
>
  @csrf
  @include('invoices._form', [
          'invoice' => new App\Models\Invoice(),
          'btnText' => 'Guardar',
      ])
</form>
</x-app-layout>

