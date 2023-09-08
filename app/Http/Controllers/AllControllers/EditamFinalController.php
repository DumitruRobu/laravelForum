<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllControllers\EditamFinalRequest;
use App\Models\Utilizatori;

class EditamFinalController extends BaseController
{
    public function __invoke(EditamFinalRequest $request, $id){

        $data = $request->validated();
        $this->service->update($id,$data);
        return redirect("/items/$id");
    }
}
