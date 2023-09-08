<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Models\Permisiuni;

class ShowAllAdminsController extends BaseController
{
    public function __invoke(){

        $admins_id = Permisiuni::find(3);
        return view("/admins", ["allAdmins" => $admins_id->permisiuniUtilizatori]);

//        $allModerators = Utilizatori::where("imputerniciri_id", $moderators_id->id)->get();
//        return view("/moderators", ["allModerators" =>$allModerators]);
    }
}
