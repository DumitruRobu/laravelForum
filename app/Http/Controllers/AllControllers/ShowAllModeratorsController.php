<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Models\Permisiuni;

class ShowAllModeratorsController extends BaseController
{
    public function __invoke(){

        $moderators_id = Permisiuni::find(2);
        return view("/moderators", ["allModerators" => $moderators_id->permisiuniUtilizatori]);

//        $allModerators = Utilizatori::where("imputerniciri_id", $moderators_id->id)->get();
//        return view("/moderators", ["allModerators" =>$allModerators]);
    }
}
