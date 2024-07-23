<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Almacenar registros de la bd respecto a categorias
        // Se puede ordenar de manera ascendente o descendente
        $categories = Category::latest('id')
        ->paginate();
       return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Uso de validaciones para los campos a registrar en la BD
        $request->validate([
           'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        // Variable flash para mostrar alerta cuando de se crea una categoría
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Correcto',
            'text' => 'Categoría creada correctamente',
        ]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */

    // METODO SHOW NO SERA NECESARIO POR EL MOMENTO
//    public function show(Category $category)
//    {
//        return view('admin.categories.show');
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category->update($request->all());

        // Variable flash para mostrar alerta cuando se actualiza categoria
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Correcto',
            'text' => 'Categoría actualizada correctamente',
        ]);
        return redirect()->route('admin.categories.edit', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // VERIFICAR SI ANTES DE ELIMINAR EXISTEN POST CON LA CATEGORIA A ELIMINAR

        $posts = Post::where('category_id', $category->id)->exists();

        if($posts){
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'La Categoria no se puede eliminar porque tiene posts asociados',
            ]);
            return redirect()->route('admin.categories.edit', $category);
        }

      $category->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Correcto',
            'text' => 'La categoria se ha eliminado correctamente',
        ]);

        return redirect()->route('admin.categories.index');
    }
}
