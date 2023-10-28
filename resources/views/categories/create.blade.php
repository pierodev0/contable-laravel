<x-app-layout>
    <div class="mb-4">
        <h1 class="text-2xl">Nueva categoria</h1>
        <h2>Crea las categorias para gastos o ingresos</h2>
      </div>
  <form
    action="{{ route('categories.store') }}"
    class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
    method="POST"
  >
    @csrf
    @include('categories._form', [
            'category' => new App\Models\Category(),
            'btnText' => 'Crear categoria',
        ])
  </form>
</x-app-layout>

