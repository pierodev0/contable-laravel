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
    <div class="flex flex-col" id="ruc-container">
        <label for="ruc">Número de RUC </label>
        <div class="flex gap-2" >
            <input type="text" id="ruc" name="ruc" class="rounded-md flex-1"
                value="{{ old('ruc', $client->ruc) }}">
            <button class="bg-teal-500 text-white p-2 rounded-md" id="btnGetData">Obtener datos</button>
        </div>
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
        <input type="text" id="name" name="name" class="rounded-md" value="{{ old('name', $client->name) }}">

    </div>
    <div class="flex flex-col">
      <label for="direction">Direccion</label>
      <input type="text" id="direction" name="direction" class="rounded-md"
          value="{{ old('direction', $client->direction) }}">
  </div>
    <div class="flex flex-col">
        <label for="phone">Telefono</label>
        <input type="tel" id="phone" name="phone" class="rounded-md"
            value="{{ old('phone', $client->phone) }}">
    </div>
    <div class="flex flex-col">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="rounded-md"
            value="{{ old('email', $client->email) }}">
    </div>
   
</div>
<button class="w-full rounded-md bg-green-400 px-6 py-2 text-white">{{ $btnText }}</button>
@push('script')
    <script>
        const btnGetDatos = document.querySelector('#btnGetData');
        const name = document.querySelector('#name');
        const direction = document.querySelector('#direction');
        const rucContainer = document.querySelector('#ruc-container');
        btnGetDatos.addEventListener("click", getDatosApi);

        function getDatosApi(e) {
            e.preventDefault();
            const rucNumber = document.querySelector('#ruc');
            if (validateRuc(rucNumber)) return

            fetch(`/clients/ajax/${rucNumber.value.trim()}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },

                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                      limpiarAlerta(rucContainer);
                      if(data.message) {
                        mostrarAlerta(data.message,rucContainer)
                        return
                      }
                      name.value = data.razonSocial
                      direction.value = data.direccion
                })
            // .catch(error => console.error('Error:', error));


        }

        function validateRuc(ruc) {
            const rucClean = ruc.value.trim();
            if (rucClean.length !== 11) {
                mostrarAlerta(`El ruc debe ser de 11 digitos`, ruc.parentElement.parentElement);
                return true
            }

            limpiarAlerta(ruc.parentElement.parentElement);

        }

        function mostrarAlerta(mensaje, referencia) {
            limpiarAlerta(referencia)
            //CREAR LA ALERTA
            //Metodo para crear un elemento en HTML por el tagName
            const error = document.createElement('p');

            //classList -> Propiedad que devuelve las clases del elemento en una  DOMTokemList
            //add -> Metodo que agrega token a la lista presente
            error.classList.add('bg-red-400', 'p-2', 'text-center', 'text-white');

            //Propiedad que representa el contenido de un nodo
            error.textContent = mensaje;

            //Metodo que agrega un nodo al final de la lista de hijo del padre
            referencia.appendChild(error);
        }

        function limpiarAlerta(referencia) {
            //Comprobar si ya existe la alerta si el elemento tiene la clase 'bg-red-600'
            //Limitamos su busqueda solo al contendenor del elemento (referencia)
            const alerta = referencia.querySelector('.bg-red-400');

            //Sentencia para eliminar la alerta solo si existe
            // Previene el error de que javascript no puede leer propiedades null
            if (alerta) {
                // Metodo que remueve el elemnto del DOM;
                alerta.remove();
            }
        }
    </script>
@endpush
