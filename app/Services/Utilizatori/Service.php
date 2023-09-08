<?php


namespace App\Services\Utilizatori;


use App\Http\Requests\AllControllers\EditamFinalRequest;
use App\Models\Utilizatori;

class Service
{
    public function store($data)
    {
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
    }

    public function update($id,$data){
        $subiecte=$data["subiecte"];
        unset($data["subiecte"]);

        $elementulDeEditat = Utilizatori::findOrFail($id);
        $elementulDeEditat->update($data);
        $elementulDeEditat->utilizatoriSubiecte()->sync($subiecte);

    }
}
