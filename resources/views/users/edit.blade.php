<x-app-layout>
    <div class="mb-4">
        <h1 class="text-2xl">Actualizar usuario</h1>
        {{-- <h2>Crea las categorias para gastos o ingresos</h2> --}}
    </div>
    <form action="{{ route('users.update', $user) }}" class="mr-auto flex w-4/6 flex-col gap-2 rounded-xl bg-white p-6"
        method="POST" novalidate>
        @csrf
        @method('PUT')
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
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="rounded-md"
                    value="{{ old('name', $user->name) }}">
            </div>
            <div class="flex flex-col">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="rounded-md"
                    value="{{ old('email', $user->email) }}">
            </div>
            <div class="flex flex-col">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="old_password" class="rounded-md" value="">
            </div>
            @if (session('mensaje'))
                <p class="bg-red-500 p-2 text-white text-center rounded">{{ session('mensaje') }}</p>
            @endif
            <div class="flex flex-col">
                <label for="password_confirmation">Repetir Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="rounded-md">
            </div>

            @if ($roles !== null)
                <h2 class="text-2xl font-bold">Listado de Roles</h2>
                @foreach ($roles as $role)
                    <label for="" class="flex gap-2 items-center">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"  {{ in_array($role->id, $roles_seleccionados) ? 'checked' : '' }}>
                        {{ $role->name }}
                    </label>
                @endforeach

            @endif
            <button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">Actualizar usuario</button>


    </form>


</x-app-layout>
