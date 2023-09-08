<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisiuni extends Model
{
    use HasFactory;
    protected $table="permisiuni";

    public function permisiuniUtilizatori(){
        return $this->hasMany(Utilizatori::class, "imputerniciri_id", "id");
    }
}
