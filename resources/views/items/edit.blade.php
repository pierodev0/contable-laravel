<x-app-layout>
  <div class="mb-4">
      <h1 class="text-2xl">Actualizar item</h1>
      {{-- <h2>Crea las categorias para gastos o ingresos</h2> --}}
  </div>
  <form action="{{ route('items.update',$item) }}" class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
      method="POST" novalidate>
      @csrf
      @method('PUT')
      @include('items._form', [
          'btnText' => 'Actualizar',
      ])
  </form>

  
</x-app-layout>
