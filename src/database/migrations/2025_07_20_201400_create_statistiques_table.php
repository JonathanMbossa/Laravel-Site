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
        Schema::create('statistiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('joueur_id')->constrained('joueurs')->onDelete('cascade');
            $table->foreignId('basket_match_id')->constrained('basket_matches')->onDelete('cascade');
            $table->integer('points')->default(0);
            $table->integer('rebonds')->default(0);
            $table->integer('passes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiques');
    }
};
