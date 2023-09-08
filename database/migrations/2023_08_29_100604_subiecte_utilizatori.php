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
        Schema::create("utilizatoriSubiecte", function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("utilizator_id");
            $table->index("utilizator_id", "utilizator_subiect_idx");
            $table->foreign("utilizator_id", "utilizator_subiect_utilizator_fk")->references("id")->on("utilizatori");

            $table->unsignedBigInteger("subiecte_id");
            $table->index("subiecte_id", "subiecte_utilizator_idx");
            $table->foreign("subiecte_id", "utilizator_subiect_subiect_fk")->references("id")->on("subiecte");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("utilizatoriSubiecte");
    }

};
