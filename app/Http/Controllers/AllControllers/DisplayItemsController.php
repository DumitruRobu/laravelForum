<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Http\Filters\UtilizatoriFilter;
use App\Http\Requests\AllControllers\FilterRequest;
use App\Models\Utilizatori;


class DisplayItemsController extends BaseController
{
    public function __invoke(FilterRequest $request){

        $data=$request->validated();

//        $filter = app()->make(UtilizatoriFilter::class, ['queryParams' => array_filter($data)]);
//        $utilizatori = Utilizatori::filter($filter);
//        dd($utilizatori);

        $query = Utilizatori::query();

        if ($request->has('name')) {
            $query->where('nume', 'like', '%' . $request->input('name') . '%');
        }

        $utilizatori = $query->paginate($this->itemsPerPage);
        return view("/items", ["allInfo"=>$utilizatori]);


//        $allInfo = Utilizatori::paginate($this->itemsPerPage);
//        return view("/items", ["allInfo"=>$allInfo]);
    }
}






