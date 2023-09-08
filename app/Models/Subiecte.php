<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subiecte extends Model
{
    use HasFactory;
    protected $table="subiecte";

    public function subiecteUtilizatori(){
        return $this->belongsToMany(Utilizatori::class, "utilizatorisubiecte", "subiecte_id", "utilizator_id");
    }
}
