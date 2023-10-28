<x-app-layout>
    <h1 class="text-2xl">Editar cuenta</h1>
    <h2>Crea tus cuentas de banco, efectivo o tarjetas de crédito</h2>
    <form action="{{ route('categories.update', $category) }}"
        class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6" method="POST">
        @csrf
        @method('PUT')
        @include('categories._form', [
            'btnText' => 'Actualizar',
        ])
    </form>
</x-app-layout>
