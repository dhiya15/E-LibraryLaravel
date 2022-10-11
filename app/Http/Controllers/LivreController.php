<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivreRequest;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{

    public function trouverLivre(Request $request)
    {
        try {
            $data = $request->all();
            $livres = Livre::query()
                ->where("titres", "like", "%". $data["keyword"] ."%")
                ->orWhere("cotation", "like", "%". $data["keyword"] ."%")
                ->orWhere("auteur", "like", "%". $data["keyword"] ."%")
                ->orWhere("inventaire", "like", "%". $data["keyword"] ."%")
                ->orWhere("spécialiste", "like", "%". $data["keyword"] ."%")
                ->orWhere("date_edition", "like", "%". $data["keyword"] ."%")
                ->orWhere("editeur", "like", "%". $data["keyword"] ."%")
                ->orWhere("isbn", "like", "%". $data["keyword"] ."%")
                ->get();
            if (is_null($livres)) {
                return response()->json([], 404);
            }
            return response()->json($livres);
        }catch (\Exception $e){
            return response()->json([], 404);
        }
    }
}
