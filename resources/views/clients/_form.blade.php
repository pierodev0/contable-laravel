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
    <label for="ruc">Número de RUC </label>
    <input
      type="text"
      id="ruc"
      name="ruc"
      class="rounded-md"
      value="{{ old('ruc',$client->ruc) }}"
    >
  </div>
  {{-- <select
    name="type"
    class="w-full rounded-md"
  >
    <option value="DNI">DNI</option>
    <option value="RUC">RUC</option>
  </select> --}}
  <div class="flex flex-col">
    <label for="name">Nombre Completo o razon social</label>
    <input
      type="text"
      id="name"
      name="name"
      class="rounded-md"
      value="{{ old('name',$client->name) }}"
    >
  </div>
  <div class="flex flex-col">
    <label for="phone">Telefono</label>
    <input
      type="tel"
      id="phone"
      name="phone"
      class="rounded-md"
      value="{{ old('phone',$client->phone) }}"
    >
  </div>
  <div class="flex flex-col">
    <label for="email">Email</label>
    <input
      type="email"
      id="email"
      name="email"
      class="rounded-md"
      value="{{ old('email',$client->email) }}"
    >
  </div>
  <div class="flex flex-col">
    <label for="direction">Direccion</label>
    <input
      type="text"
      id="direction"
      name="direction"
      class="rounded-md"
      value="{{ old('direction',$client->direction) }}"
    >
  </div>
</div>
<button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>