<x-app-layout>
    <div class="mb-10 flex items-start justify-between">
        <div class="">
            <h1 class="text-3xl">Movimientos</h1>
            {{-- <h2>Crea las categorias para tus gastos o ingresos</h2> --}}
        </div>
        <a href="{{ route('movements.create') }}"
            class="rounded-md bg-green-400 px-6 py-2 text-white hover:bg-green-700">Nuevo</a>
    </div>
    <article class="flex gap-2 mb-5">
        
            <div class="bg-white p-5 rounded-md shadow-md min-w-[250px]">
              <p class="text-2xl font-bold">Ingresos</p>
              <p class="text-3xl font-bold text-teal-500">S./ {{ $incomes }}</p>
            </div>
          
          
            <div class="bg-white p-5 rounded-md shadow-md min-w-[250px]">
              <p class="text-2xl font-bold">Egresos</p>
              <p class="text-3xl font-bold text-red-400">S./ {{ $expenses }}</p>
            </div>
          
    </article>
    <table class="w-full table-auto">
        <thead class="bg-gray-50 text-xs font-semibold text-gray-400">
            <tr class="text-left">
                <th class="p-3 text-blue-900">ID</th>
                <th class="p-3 text-blue-900">Fecha</th>
                <th class="p-3 text-blue-900">Tipo</th>
                <th class="p-3 text-blue-900">Monto</th>
                <th class="p-3 text-blue-900">Cuenta</th>
                <th class="p-3 text-blue-900">Referencia</th>
                <th class="p-3 text-blue-900">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white text-sm">
            @forelse ($movements as $movement)
                <tr class="hover:bg-gray-200">
                    <td class="p-3">{{ $movement->id }}</td>
                    <td class="p-3">{{ $movement->created_at }}</td>
                    <td class="p-3 {{ $movement->type === 'add' ? 'text-teal-500' : 'text-red-400' }}">
                        {{ $movement->type === 'add' ? 'Ingreso' : 'Egreso' }}</td>
                    <td class="p-3">{{ $movement->amount }}</td>
                    <td class="p-3"><a class="hover:underline hover:text-blue-700" href="{{ route('accounts.show',$movement->account) }}">{{ $movement->account->name }}</a></td>
                    @if ($movement->category?->name)
                        <td class="p-3">{{ $movement->category->name }}</td>
                    @else
                        <td class="p-3"><a class="hover:underline hover:text-blue-700" href="{{ route('invoices.show',$movement->invoice) }}">{{ $movement->invoice->invoice_code }}</a></td>
                    @endif
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
