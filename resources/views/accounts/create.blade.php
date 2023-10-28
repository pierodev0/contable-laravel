<x-app-layout>
    <div class="mb-4">
        <h1 class="text-2xl">Nueva cuenta</h1>
        <h2>Crea tus cuentas de banco, efectivo o tarjetas de crédito</h2>
    </div>
    <form action="{{ route('accounts.store') }}" class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
        method="POST">
        @csrf
        @include('accounts._form', [
            'account' => new App\Models\Account(),
            'btnText' => 'Crear cuenta',
        ])
    </form>
</x-app-layout>
