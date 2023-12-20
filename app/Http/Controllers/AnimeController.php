<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function getAllAnimes() {
        $animes = Anime::get()->toJson(JSON_PRETTY_PRINT);
        return response($animes, 200);
    }

    public function createAnime(Request $request) {
        $anime = new Anime;
        $anime->titulo = $request->titulo;
        $anime->genero = $request->genero;
        $anime->ano_lancamento = $request->ano_lancamento;
        $anime->temporadas = $request->temporadas;
        $anime->save();

        return response()->json([
            "message" => "Anime criado com sucesso"
        ], 201);
    }

    public function getAnime($id) {
        if (Anime::where('id', $id)->exists()) {
            $anime = Anime::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($anime, 200);
        } else {
            response()->json([
                "message" => "Anime não econtrado"
            ], 404);
        }
    }

    public function updateAnime(Request $request, $id) {
        if (Anime::where('id', $id)->exists()) {
            $anime = Anime::find($id);
            $anime->titulo = is_null($request->titulo) ? $anime->titulo : $request->titulo;
            $anime->genero = is_null($request->genero) ? $anime->genero : $request->genero;
            $anime->ano_lancamento = is_null($request->ano_lancamento) ? $anime->ano_lancamento : $request->ano_lancamento;
            $anime->temporadas = is_null($request->temporadas) ? $anime->temporadas : $request->temporadas;
            $anime->save();

            return response()->json([
                "message" => "Anime atualizado com sucesso"
            ], 200);
        } else {
            return response()->json([
                "message" => "Anime não encontrado"
            ], 404);
        }
    }

    public function deleteAnime($id) {
        if (Anime::where('id', $id)->exists()) {
            $anime = Anime::find($id);
            $anime->delete();

            return response()->json([
                "message" => "Anime deletado"
            ], 202);
        } else {
            return response()->json([
                "message" => "Anime não econtrado"
            ], 404);
        }
    }
}
