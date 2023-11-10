      {{-- Barra lateral --}}
      <div class="w-[250px] bg-white p-3">
          <div class="">
              <a href="{{ route('dashboard') }}" class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-house" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Inicio</span>
              </a>

              <a href="{{ route('clients.index') }}"
                  class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-regular fa-user" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Clientes</span>
              </a>

              <a href="{{ route('accounts.index') }}"
                  class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-building-columns" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Cuentas</span>
              </a>
              <a href="{{ route('categories.index') }}"
                  class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-handshake" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Categorias</span>
              </a>

              <a href="{{ route('movements.index') }}"
                  class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-money-bill" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Movimientos</span>
              </a>
              <a href="{{ route('items.index') }}"
              class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
              <i class="fa-solid fa-box" style="color: #8c8c8c;"></i>
              <span class="text-sm">Inventario</span>
            </a>
            <a href="{{ route('invoices.index') }}"
                class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                <i class="fa-solid fa-ticket" style="color: #8c8c8c;"></i>
                <span class="text-sm">Facturas</span>
            </a>
            @role('admin')
            <a href="{{ route('users.index') }}"
                class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                <i class="fa-solid fa-user" style="color: #8c8c8c;"></i>
                <span class="text-sm">Usuarios</span>
            </a>
            @endrole

              {{-- <div class="px-4 py-2" x-data="{ open: false }">
                  <a hrehref="{{ route('invoices.index') }}" class="cursor-pointer text-sm" @click="open=!open">
                    <i class="fa-solid fa-arrow-trend-up" style="color: #8c8c8c;"></i>
                      <span class="">Ingresos</span>
                  </a>
                  <ul x-show=open class="flex flex-col py-2 pl-5 text-sm">
                      <a href="" class="hover:bg-gray-100 p-1 flex gap-2 items-center"> 
                        <i class="fa-solid fa-ticket" style="color: #8c8c8c;"></i>Ventas</a>
                      <a href="" class="hover:bg-gray-100 p-1 flex gap-2 items-center"> <i
                              class="fa-solid fa-handshake" style="color: #8c8c8c;"></i>Gastos</a>
                  </ul>
              </div> --}}


              {{-- <p class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-arrow-trend-up" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Ingresos</span>
              </p>

              <p class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-arrow-trend-down" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Gastos</span>
              </p> --}}
          </div>
      </div>
