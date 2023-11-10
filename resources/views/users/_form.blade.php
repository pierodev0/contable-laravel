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
      <input type="text" id="name" name="name" class="rounded-md" value="{{ old('name', $user->name) }}">
    </div>    
    <div class="flex flex-col">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="rounded-md" value="{{ old('email', $user->email) }}">
    </div>
    <div class="flex flex-col">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="rounded-md" value="">
    </div>
    <div class="flex flex-col">
        <label for="password_confirmation">Repetir Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="rounded-md">
    </div>
    
    @if($roles !== null)
    <h2 class="text-2xl font-bold">Listado de Roles</h2>
    @foreach ($roles as $role)
    <label for="" class="flex gap-2 items-center">          
      <input type="checkbox" name="roles[]" value="{{ $role->id }}" >
        {{ $role->name }}
  </label>
    @endforeach

    @endif
    <button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>
    @push('script')
        <script></script>
    @endpush

 