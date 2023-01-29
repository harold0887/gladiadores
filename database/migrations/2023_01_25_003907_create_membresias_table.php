<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('frecuencia_id')->constrained('frecuencias');
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->decimal('discount', $precision = 8, $scale = 2);
            $table->decimal('price_with_discount', $precision = 8, $scale = 2);
            //$table->mediumText('description');
            $table->boolean('status');
            $table->boolean('main');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membresias');
    }
};
