<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Models\Permisiuni;
use App\Models\Subiecte;

class CreateController extends BaseController
{
    public function __invoke(){

        $toateImputernicirile = Permisiuni::all();
        $toateSubiectele = Subiecte::all();
        return view("/create", ["toateImputernicirile" => $toateImputernicirile, "toateSubiectele" =>$toateSubiectele]);
    }
}
