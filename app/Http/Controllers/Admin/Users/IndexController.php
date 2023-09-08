<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\AllControllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AllControllers\FilterRequest;
use App\Models\Utilizatori;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest  $request)
    {
        $data=$request->validated();
        $query = Utilizatori::query();

        if ($request->has('name')) {
            $query->where('nume', 'like', '%' . $request->input('name') . '%');
        }

        $utilizatori = $query->paginate($this->itemsPerPage);


        return view("admin.user.index", [
            "allInfo"=>$utilizatori,
            "totalUsers"=>$utilizatori->total()
            ]);


//        return view("admin.user.index");
    }
}
