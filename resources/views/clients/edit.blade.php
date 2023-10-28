<x-app-layout>
    <div class="mb-4">
        <h1 class="text-2xl">Nuevo cliente</h1>
        <h2>Crea los contactos que asociarás en tus documentos y transacciones de ingresos.</h2>
      </div>
  <form
    action="{{ route('clients.update',$client) }}"
    class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
    method="POST"
  >
    @csrf
    @method('PUT')
    @include('clients._form', [
            'btnText' => 'Actualizar',
        ])
  </form>
</x-app-layout>

