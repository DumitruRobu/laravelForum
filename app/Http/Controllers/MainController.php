<?php

namespace App\Http\Controllers;

use App\Models\Permisiuni;
use App\Models\Subiecte;
use App\Models\Utilizatori;
use App\Models\UtilizatoriSubiecte;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){

        return view("/main");
    }

    public function displayItems(){
        $allInfo = Utilizatori::all();

        return view("/items", ["allInfo"=>$allInfo]);
    }

    public function displayItem($id){
        $user = Utilizatori::where("id", $id)->first();

        $subiecteUtilizator = UtilizatoriSubiecte::whereIn("utilizator_id", [$user->id])->get(); //aici e tot rindul
        $idulSubiectelor = $subiecteUtilizator->pluck("subiecte_id"); //aici extragem doar idurile

        $subiecteFin = Subiecte::whereIn("id", $idulSubiectelor)->pluck("titlu");

        return view("selectedItem", ["user" => $user, "subiecteFin" => $subiecteFin]);
    }


    public function editItem($id){
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

    public function editamFinal($id){
        $elementulDeEditat = Utilizatori::findOrFail($id);
        $data = request() ->validate([
            "nume"=>"required|string",
            "imagine"=>"required|string",
            "gen"=>"required|string",
            "imputerniciri_id"=>"required|",
            "subiecte"=>"required|"
            ]
        );

        $subiecte=$data["subiecte"];
        unset($data["subiecte"]);

        $elementulDeEditat->update($data);
        $elementulDeEditat->utilizatoriSubiecte()->sync($subiecte);
        return redirect("/items/$id");
    }


    public function create(){
        $toateImputernicirile = Permisiuni::all();
        $toateSubiectele = Subiecte::all();
        return view("/create", ["toateImputernicirile" => $toateImputernicirile, "toateSubiectele" =>$toateSubiectele]);
    }

    public function store(Request $request){
        $data = request()->validate([
            "nume"=>"required|string",
            "imagine"=>"required|string",
            "gen"=>"required|string",
            "imputerniciri_id"=>"required",
            "subiecte"=>"required"
        ]);

        $subiecte = $data["subiecte"];
        unset($data["subiecte"]);


        $noulUtilizator = Utilizatori::firstOrcreate($data);
        //V1:
        $noulUtilizator->utilizatoriSubiecte()->attach($subiecte);

        //V2:
//        foreach($subiecte as $s){
//            UtilizatoriSubiecte::firstOrCreate([
//                "subiecte_id"=>$s,
//                "utilizator_id"=>$noulUtilizator->id
//            ]);
//        }
        $allInfo = Utilizatori::all();
        return view("/items", ["allInfo"=>$allInfo]);
    }

    public function destroy($id)
    {
        try {
            $elDeSters = Utilizatori::findOrFail($id);
            $elDeSters->delete();

            $allInfo = Utilizatori::all();
            return redirect("/items")->with(["allInfo" => $allInfo])->with("success", "Item deleted successfully");
        } catch (ModelNotFoundException $e) {
            return redirect("/")->with("error", "User not found.");
        }
    }

    public function showAllModerators()
    {
        $moderators_id = Permisiuni::find(2);
        return view("/moderators", ["allModerators" => $moderators_id->permisiuniUtilizatori]);

//        $allModerators = Utilizatori::where("imputerniciri_id", $moderators_id->id)->get();
//        return view("/moderators", ["allModerators" =>$allModerators]);
    }

}
