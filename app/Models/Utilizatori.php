<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utilizatori extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = "utilizatori";
    protected $guarded = false;


    use SoftDeletes;
    public function utilizatoriPermisiuni(){
        return $this->belongsTo(Permisiuni::class, "imputerniciri_id", "id");
    }

    public function utilizatoriSubiecte(){
        return $this->belongsToMany(Subiecte::class, "utilizatorisubiecte",
            "utilizator_id", "subiecte_id");
    }
}
