<x-app-layout>
  <div class="mb-4">
      <h1 class="text-2xl">Nuevo item</h1>
      {{-- <h2>Crea las categorias para gastos o ingresos</h2> --}}
  </div>
  <form action="{{ route('items.store') }}" class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
      method="POST" novalidate>
      @csrf
      @include('items._form', [
          'item' => new App\Models\Item(),
          'btnText' => 'Crear Item',
      ])
  </form>

  
</x-app-layout>
