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
      <input type="text" id="name" name="name" class="rounded-md" value="{{ old('name', $item->name) }}">
    </div>
    <div>
        <label for="type">Tipo de item</label>
        <select id="type" name="type" class="w-full rounded-md">
            <option value="product" {{ $item->type == 'product' ? 'selected' : '' }}>Producto</option>
            <option value="service" {{ $item->type == 'service' ? 'selected' : '' }}>Servicio</option>
        </select>
    </div>
    <div class="flex flex-col">
        <label for="stock">Cantidad</label>
        <input type="number" id="stock" name="stock" class="rounded-md" value="{{ old('stock', $item->stock) }}">
    </div>
    <div>
        <div class="flex flex-col">
            <label for="sell_price">Precio</label>
            <input type="number" id="sell_price" name="sell_price" class="rounded-md"
                value="{{ old('sell_price', $item->sell_price) }}">

        </div>
    </div>
    <button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>
    @push('script')
        <script></script>
    @endpush
