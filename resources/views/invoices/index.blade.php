<x-app-layout>
  <div class="mb-10 flex items-start justify-between">
      <div class="">
          <h1 class="text-3xl">Facturas</h1>
          {{-- <h2>Crea las categorias para tus gastos o ingresos</h2> --}}
      </div>
      <a href="{{ route('invoices.create') }}"
          class="rounded-md bg-green-400 px-6 py-2 text-white hover:bg-green-700">Crear factura</a>
  </div>

  <table class="w-full table-auto">
      <thead class="bg-gray-50 text-xs font-semibold text-gray-400">
          <tr class="text-left">
              <th class="p-3 text-blue-900">ID</th>
              <th class="p-3 text-blue-900">Fecha</th>
              <th class="p-3 text-blue-900">Cliente</th>
              <th class="p-3 text-blue-900">Total</th>
              <th class="p-3 text-blue-900">Estado</th>
              <th class="p-3 text-blue-900">Acciones</th>
          </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 bg-white text-sm">
            @php
                $color['Por cobrar'] = "text-red-500";
                $color['Anulada'] = "text-blue-800";
                $color['Cobrada'] = "text-teal-500";
            @endphp
          @forelse ($invoices as $invoice)
           
              <tr class="hover:bg-gray-200">
                  <td class="p-3">{{ $invoice->id }}</td>
                  <td class="p-3">{{ $invoice->invoice_date }}</td>
                  <td class="p-3">{{ $invoice->client->name }}</td>
                  <td class="p-3">{{ $invoice->total }}</td>
                  <td class="p-3 {{ $color[$invoice->status] }}">{{ $invoice->status }}</td>
                  <td class="flex gap-5 p-3">
                    <a href="{{ route('invoices.show', $invoice) }}"><i class="fa-solid fa-eye"
                        style="color: #878787;"></i></a>
                      <a href="{{ route('invoices.edit', $invoice) }}"><i class="fa-solid fa-pencil"
                              style="color: #878787;"></i></a>
                      <form class="formDelete" action="{{ route('invoices.destroy', $invoice) }}" method="POST">
                          @csrf
                          @method('delete')
                          @if ($invoice->status != 'Anulada')                              
                          <button type="submit"><i class="fa-solid fa-x" style="color: #878787;"></i></button>
                          @endif
                          
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
              'La factura ha sido cancelada',
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
                  title: '¿Anular factura?',
                  text: "Esta operacion no se puede revertir",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Aceptar'
              }).then((result) => {
                  if (result.isConfirmed) {
                      this.submit();

                  }
              })
          })
      </script>
  @endpush

</x-app-layout>
