<x-app-layout>
    <div class="mb-4">
        <h1 class="text-2xl">Nuevo movimiento</h1>
        {{-- <h2>Crea las categorias para gastos o ingresos</h2> --}}
    </div>
    <form action="{{ route('movements.store') }}" class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
        method="POST" novalidate>
        @csrf
        @include('movements._form', [
            'movement' => new App\Models\Movement(),
            'btnText' => 'Crear Movimiento',
        ])
    </form>

    
</x-app-layout>
