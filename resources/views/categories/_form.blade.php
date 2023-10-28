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
    <label for="name">Nombre de categoria</label>
    <input
      type="text"
      id="name"
      name="name"
      class="rounded-md"
      value="{{ old('name',$category->name) }}"
    >
  </div>
  <select
    name="type"
    class="w-full rounded-md"
  >
    <option value="add" {{ $category->type == 'add' ? 'selected' : '' }}>Ingresos</option>
    <option value="out" {{ $category->type == 'out' ? 'selected' : '' }}>Egresos</option>
  </select>  
<button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>