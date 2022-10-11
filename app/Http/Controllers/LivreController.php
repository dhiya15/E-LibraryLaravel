<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivreRequest;
use App\Models\Livre;

class LivreController extends Controller
{

    protected $count = 0;

    public function trouverLivre(LivreRequest $request)
    {
        try {
            $data = $request->validated();
            $livres = Livre::query();
            if(isset($data["titres"])){
                $livres = $livres->where("titres", "like", "%". $data["titres"] ."%");
                $this->count += 1;
            }
            $livres = $this->checkIfIsSet($data, $livres, "cotation");
            $livres = $this->checkIfIsSet($data, $livres, "auteur");
            $livres = $this->checkIfIsSet($data, $livres, "inventaire");
            $livres = $this->checkIfIsSet($data, $livres, "spécialiste");
            $livres = $this->checkIfIsSet($data, $livres, "date_edition");
            $livres = $this->checkIfIsSet($data, $livres, "editeur");
            $livres = $this->checkIfIsSet($data, $livres, "isbn");
            $livres = $livres->get();
            if (is_null($livres) || $this->count == 0) {
                return response()->json([], 404);
            }
            return response()->json($livres);
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    public function checkIfIsSet($all, $objectQuery, $paramName) {
        if(isset($all[$paramName])) {
            $objectQuery = $objectQuery->orWhere("$paramName", "like", "%" . $all["$paramName"] . "%");
            $this->count += 1;
        }
        return $objectQuery;
    }
}
