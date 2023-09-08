<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permisiuni;
use App\Models\Subiecte;
use App\Models\Utilizatori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permisiuni::factory(4)->create();
        $subiecte = Subiecte::factory(11)->create();
        $utilizatori = Utilizatori::factory(43)->create();

        //atasam utilizatorii de subiectele interesate, completind tabelul utilizatorisubiecte
        //Fiecarui utilizator i se atribuie random cite 3 subiecte diferite
        foreach($utilizatori as $u){
            $subiecteIds= $subiecte->random(3)->pluck("id");
            $u->utilizatoriSubiecte()->attach($subiecteIds);
        }

    }
}
