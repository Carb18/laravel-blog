<x-admin-layout>

    <form action="{{route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <x-validation-errors class="mb-4"/>

        <div class="mb-4">
            <x-label class="mb-1">
                Titulo
            </x-label>

            <x-input
                value="{{old('title', $post->title)}}"
                name="title"
                class="w-full"
                placeholder="Escriba el titulo del post"/>
        </div>

        <div class="mb-4">
            <x-label class="mb-1">
                Slug
            </x-label>

            <x-input
                value="{{old('slug', $post->slug)}}"
                name="slug"
                class="w-full"
                placeholder="Escriba el slug del post"/>
        </div>

        <!-- DIV PARA SELECCIONAR CATEGORIAS-->
        <div class="mb-4">
            <x-label class="mb-1">
                Categoria
            </x-label>
            <x-select class="w-full" name="category_id">
                @foreach($categories as $category)
                    <option @selected(old('category_id', $post->category_id) == $category->id)
                            value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </x-select>
        </div>

        <div class="mb-4">
            <x-label class="mb-1">
                Resumen
            </x-label>

            <textarea
                name="excerpt"
                class="w-full"
                rows="5">{{old('excerpt' , $post->excerpt)}}</textarea>
        </div>

        <div class="mb-4">
            <x-label class="mb-1">
                Body
            </x-label>

            <textarea
                name="body"
                class="w-full"
                rows="8" >{{old('body' , $post->body)}}</textarea>
        </div>

        <div class="flex justify-end">
            <x-button>
                Actualizar
                </x-button>
        </div>

    </form>


</x-admin-layout>
