<x-admin-layout>
<!-- APARTADO PARA EL CRUD, CREAR NUEVA CATEGORIA -->
    <form action="{{route('admin.categories.store')}}" method="POST"
          class="bg-white rounde-l p-6 shadow-lg">
        @csrf

        <!-- USO DE COMPONENTE PARA VALIDAR ERRORES -->
        <x-validation-errors class="mb-4"/>

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input
                name="name"
                class="w-full "
                placeholder="Escriba nombre de categoría"/>
        </div>

        <div class="flex justify-end">
            <x-button>
                Crear categoría
            </x-button>
        </div>

    </form>

</x-admin-layout>
