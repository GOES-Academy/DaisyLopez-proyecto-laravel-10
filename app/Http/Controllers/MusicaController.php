<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    //Lista de Artistas
    public function index()
    {
        $cantantes = [
            ['id' => 1,  'artista' => 'Laura Pausini'],
            ['id' => 2,  'artista' => 'LOVG'],
            ['id' => 3,  'artista' => 'Nek'],
            ['id' => 4,  'artista' => 'Shakira'],
            ['id' => 5,  'artista' => 'Negramaro'],
            ['id' => 6,  'artista' => 'Annalisa'],
            ['id' => 7,  'artista' => 'Alex Ubago'],
            ['id' => 8,  'artista' => 'Kany García'],
            ['id' => 9,  'artista' => 'Pablo López'],
            ['id' => 10, 'artista' => 'Christina Aguilera'],
            ['id' => 11, 'artista' => 'Beto Cuevas'],
            ['id' => 12, 'artista' => 'Kabah'],
            ['id' => 13, 'artista' => 'Fey'],
            ['id' => 14, 'artista' => 'Jesse y Joy'],
            ['id' => 15, 'artista' => 'Pol 3.14'],
        ];
    return response()->json($cantantes);
    }

    //Mostrar por id determinado
    public function show($id)
{
    $validator = Validator::make(['id' => $id], [
        'id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }
    $cantantes = [
        ['id' => 1,  'artista' => 'Laura Pausini'],
        ['id' => 2,  'artista' => 'LOVG'],
        ['id' => 3,  'artista' => 'Nek'],
        ['id' => 4,  'artista' => 'Shakira'],
        ['id' => 5,  'artista' => 'Negramaro'],
        ['id' => 6,  'artista' => 'Annalisa'],
        ['id' => 7,  'artista' => 'Alex Ubago'],
        ['id' => 8,  'artista' => 'Kany García'],
        ['id' => 9,  'artista' => 'Pablo López'],
        ['id' => 10, 'artista' => 'Christina Aguilera'],
        ['id' => 11, 'artista' => 'Beto Cuevas'],
        ['id' => 12, 'artista' => 'Kabah'],
        ['id' => 13, 'artista' => 'Fey'],
        ['id' => 14, 'artista' => 'Jesse y Joy'],
        ['id' => 15, 'artista' => 'Pol 3.14'],
    ];

    $artistaSeleccionado = null;

    foreach ($cantantes as $cantante) {
        if ($cantante['id'] == $id) {
            $artistaSeleccionado = $cantante;
            break;
        }
    }

    if ($artistaSeleccionado) {
        return response()->json($artistaSeleccionado);
    } else {
        return response()->json(['message' => 'No se encuentra el artista'], 404);
    }
}

//Muestra mensaje
public function mensaje(Request $request){
    $artista = $request->input('artista');

    $validator = Validator::make(['artista' => $artista], [
        'artista' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    if ($artista) {
        return "¡Seleccionaste a $artista!";
    } else {
        return "Proporciona el nombre de tu artista.";
    }
   }

}