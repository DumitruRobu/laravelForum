<?php


namespace App\Http\Controllers\AllControllers;


use App\Http\Requests\AllControllers\FilterRequest;
use App\Models\Utilizatori;

class IndexController
{
    public function __invoke(FilterRequest $request){
        return view("main");
    }
}
