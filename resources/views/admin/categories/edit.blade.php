<x-admin-layout>
    <!-- APARTADO PARA EL CRUD, EDITAR  CATEGORIA -->
    <form action="{{route('admin.categories.update', $category)}}" method="POST"
          class="bg-white rounde-l p-6 shadow-lg">
        @csrf
        @method('PUT')

        <!-- USO DE COMPONENTE PARA VALIDAR ERRORES -->
        <x-validation-errors class="mb-4"/>

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input
                name="name"
                class="w-full "
                placeholder="Escriba nombre de categoría"
                value="{{ $category->name }}"/>
        </div>

        <div class="flex justify-end">
            <x-button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Actualizar categoría
            </x-button>
        </div>

    </form>

</x-admin-layout>
