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
    <label for="number">Número (RUC, DNI, Etc.) </label>
    <input
      type="text"
      id="number"
      name="number"
      class="rounded-md"
      value="{{ old('number',$client->number) }}"
    >
  </div>
  <select
    name="type"
    class="w-full rounded-md"
  >
    <option value="DNI">DNI</option>
    <option value="RUC">RUC</option>
  </select>
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
</div>
<button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>