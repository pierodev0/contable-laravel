      {{-- Barra lateral --}}
      <div class="w-[250px] bg-white p-3">
          <div>
              <p class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-house" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Inicio</span>
              <p class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-regular fa-user" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Contactos</span>
              </p>
              <a href="{{ route('accounts.index') }}" class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-building-columns" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Cuentas</span>
              </a>
              <p class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-arrow-trend-up" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Ingresos</span>
              </p>
              <p class="flex items-center gap-2 rounded-sm px-4 py-2 hover:cursor-pointer hover:bg-gray-100">
                  <i class="fa-solid fa-arrow-trend-down" style="color: #8c8c8c;"></i>
                  <span class="text-sm">Gastos</span>
              </p>
          </div>
      </div>
