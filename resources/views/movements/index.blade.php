<x-app-layout>
    <div class="mb-10 flex items-start justify-between">
        <div class="">
            <h1 class="text-3xl">Movimientos</h1>
            {{-- <h2>Crea las categorias para tus gastos o ingresos</h2> --}}
        </div>
        <a href="{{ route('movements.create') }}"
            class="rounded-md bg-green-400 px-6 py-2 text-white hover:bg-green-700">Nuevo</a>
    </div>

    <table class="w-full table-auto">
        <thead class="bg-gray-50 text-xs font-semibold text-gray-400">
            <tr class="text-left">
                <th class="p-3 text-blue-900">ID</th>
                <th class="p-3 text-blue-900">Fecha</th>
                <th class="p-3 text-blue-900">Tipo</th>
                <th class="p-3 text-blue-900">Monto</th>
                <th class="p-3 text-blue-900">Cuenta</th>
                <th class="p-3 text-blue-900">Categoria</th>
                <th class="p-3 text-blue-900">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white text-sm">
            @forelse ($movements as $movement)
                <tr class="hover:bg-gray-200">
                    <td class="p-3">{{ $movement->id }}</td>
                    <td class="p-3">{{ $movement->updated_at }}</td>
                    <td class="p-3 {{ $movement->type ===  'add' ? 'text-green-400' : 'text-red-400' }}">{{ $movement->type ===  'add' ? 'Ingreso' : 'Egreso' }}</td>
                    <td class="p-3">{{ $movement->amount }}</td>
                    <td class="p-3">{{ $movement->account->name }}</td>
                    <td class="p-3">{{ $movement->category->name }}</td>
                    <td class="flex gap-5 p-3">
                        <a href="{{ route('movements.edit', $movement) }}"><i class="fa-solid fa-pencil"
                                style="color: #878787;"></i></a>
                        <form class="formDelete" action="{{ route('movements.destroy', $movement) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"><i class="fa-solid fa-x" style="color: #878787;"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse

        </tbody>
    </table>

    @if (Session::has('success'))
        <script>
            Swal.fire(
                'Eliminado!',
                'El registro se ha eliminado',
                'success'
            )
        </script>
    @endif

    @if (Session::has('updated'))
        <script>
            Swal.fire(
                'Actualizado!',
                'El registro se ha actualizado',
                'success'
            )
        </script>
    @endif

    @push('script')
        <script>
            $(".formDelete").on("submit", function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "El registro se eliminara completamente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();

                    }
                })
            })
        </script>
    @endpush

</x-app-layout>