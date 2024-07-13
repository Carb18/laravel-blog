<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
    public function show(Category $category)
    {
        return view('admin.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
