<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class CategoryController extends Controller
{
    #Funcion Hola Mundo
    public function hello()
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }

    #Creamos la primeraCategoria
    public function firstCategory()
    {
        $categoria = Category::all()->toArray();
        
        return response()->json(
            [
                'code' => 200,
                'status' => 'true',
                'data' => $categoria
            ]
        );
        
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $categoria = new Category();

        // $categoria->name = $request->name;
        // $categoria->description = $request->description;

        // $categoria->save();
        $categorias = [
            [

                'nombre_categoria'        => 'Comida de mar',
                'descripcion' => 'Mucha potencia'
            ],
            [

                'nombre_categoria'        => 'Bebidas',
                'descripcion' => 'para calmar tu sed'
            ]
        ];

        // foreach ($categorias as $categoria) {
        //     # code...
        //     Category::create($categoria);
        // }

        Category::create($request->all());

    }

    public function update(Request $request, $id)
    {
        $categoria = Category::find($id);
        
        $categoria->description = 'Pizzas y pastas';
        
        $categoria->save();
    }

    public function destroy($id)
    {
        $categoria = Category::find($id);
        $categoria->delete();
    }
}