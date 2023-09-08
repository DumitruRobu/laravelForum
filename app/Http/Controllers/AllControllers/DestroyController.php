<?php

namespace App\Http\Controllers\AllControllers;

use App\Http\Controllers\Controller;
use App\Models\Subiecte;
use App\Models\Utilizatori;
use App\Models\UtilizatoriSubiecte;

class DestroyController extends BaseController
{
    public function __invoke($id){

        try {
            $elDeSters = Utilizatori::findOrFail($id);
            $elDeSters->delete();

            $allInfo = Utilizatori::all();
            return redirect("/items")->with(["allInfo" => $allInfo])->with("success", "Item deleted successfully");
        } catch (ModelNotFoundException $e) {
            return redirect("/")->with("error", "User not found.");
        }
    }
}
