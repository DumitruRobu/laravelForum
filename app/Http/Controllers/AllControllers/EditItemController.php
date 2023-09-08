<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Models\Permisiuni;
use App\Models\Subiecte;
use App\Models\Utilizatori;
use App\Models\UtilizatoriSubiecte;

class EditItemController extends BaseController
{
    public function __invoke($id){

        $elementulDeEditat = Utilizatori::where("id", $id)->first();
        $toateGenurile = Utilizatori::select("gen")->distinct()->get();
        $toateImputernicirile = Permisiuni::all();

        $toateSubiectele = Subiecte::all();
        $idulSubiectelorUtilizatorului = UtilizatoriSubiecte::where("utilizator_id", $id)->pluck('subiecte_id');
        $subiecteleUtilizatorului = Subiecte::whereIn("id", $idulSubiectelorUtilizatorului)->get();

        return view("/edit", ["elementulDeEditat" =>$elementulDeEditat,
            "toateGenurile"=>$toateGenurile,
            "toateImputernicirile"=>$toateImputernicirile,
            "subiecteleUtilizatorului"=>$subiecteleUtilizatorului,
            "toateSubiectele"=>$toateSubiectele
        ]);
    }
}
