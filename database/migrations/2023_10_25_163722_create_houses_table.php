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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('house_name',20);
            $table->string('house_owner_name',50);
            $table->string('house_address');
            $table->string('division');
            $table->string('district');
            $table->string('thana');
            $table->integer('floor_number');
            $table->string('flat_number');
            $table->integer('total_bedroom');
            $table->integer('total_bathroom');
            $table->string('summary')->nullable();
            $table->integer('rent_amount');
            $table->string('category');
            $table->date('available_date');
            $table->string('image');
            $table->string('status')->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
