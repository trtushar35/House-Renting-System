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
        Schema::create('house__owners', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 50)->unique();
            $table->string('email', 30)->unique();
            $table->integer('phone_number',15)->unique();
            $table->string('address', 100);
            $table->integer('nid', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house__owners');
    }
};
