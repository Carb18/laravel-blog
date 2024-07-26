<x-admin-layout>

    <div  class="flex justify-end mb-4">
        <a class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" href="{{route('admin.posts.create')}}">Nuevo</a>
    </div>

    <ul class="space-y-8">
        @foreach($posts as $post)
            <li class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                   <a href="{{route('admin.posts.edit', $post)}}">
                       <img class="aspect-[16/9] object-cover object-center w-full" src="{{$post->image_path}}" alt="">
                   </a>
                </div>

                <div>
                    <h1 class="text-xl font-semibold">
                        <a href="{{route('admin.posts.edit', $post)}}">
                            {{$post->title}}
                        </a>
                    </h1>
                    <hr class="mt-1 mb-2">

                    <span @class([
                        'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300' => $post->published,
                        'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300' => ! $post->published
                    ])>
                        {{ $post->published ? 'Publicado' : 'Borrador' }}
                    </span>

                    <p class="text-gray-500">
                        {{ Str::limit($post->excerpt, 100)}}
                    </p>

                    <div class="flex justify-end mt-4">
                        <a href="{{route('admin.posts.edit', $post)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Editar
                        </a>

                    </div>
                </div>
            </li>
        @endforeach


    </ul>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>

</x-admin-layout>
