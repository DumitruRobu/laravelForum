<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Models\Subiecte;
use App\Models\Utilizatori;
use App\Models\UtilizatoriSubiecte;

class DisplayItemController extends BaseController
{
    public function __invoke($id){

        $user = Utilizatori::where("id", $id)->first();

        $subiecteUtilizator = UtilizatoriSubiecte::whereIn("utilizator_id", [$user->id])->get(); //aici e tot rindul
        $idulSubiectelor = $subiecteUtilizator->pluck("subiecte_id"); //aici extragem doar idurile

        $subiecteFin = Subiecte::whereIn("id", $idulSubiectelor)->pluck("titlu");

        return view("selectedItem", ["user" => $user, "subiecteFin" => $subiecteFin]);
    }
}
