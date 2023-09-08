<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilizatori', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->string('gen');
            $table->string('imagine');


            $table->unsignedBigInteger("imputerniciri_id")->nullable();
            $table->index("imputerniciri_id", "utilizatori_imputerniciri_idx");
            $table->foreign("imputerniciri_id", "utilizatori_imputerniciri_fk")->on("permisiuni")->references("id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilizatori');
    }
};
