<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllControllers\StoreRequest;
use App\Models\Utilizatori;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){

        $data = $request->validated();

        $this->service->store($data);

        $allInfo = Utilizatori::paginate($this->itemsPerPage);
        return view("/items", ["allInfo"=>$allInfo]);
    }
}
