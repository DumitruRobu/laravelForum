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
        Schema::table('utilizatori', function (Blueprint $table) {
            $table->unsignedBigInteger("os_id")->nullable();
            $table->index("os_id", "utilizatori_os_idx");
            $table->foreign("os_id", "utilizatori_os_fk")->on("os")->references("id");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilizatori', function (Blueprint $table) {
            $table->dropColumn("os_id");
        });

    }
};
