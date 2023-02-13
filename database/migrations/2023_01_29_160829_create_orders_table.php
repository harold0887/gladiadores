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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
                $table->foreignId('membresia_id')->constrained('membresias');
                $table->decimal('amount', $precision = 8, $scale = 2);
                $table->mediumText('description');
                $table->timestamp('date_payment')->nullable();
                $table->string('confirmed_by')->nullable();
                $table->string('created_by');
                $table->foreignId('user_id')->constrained();
                $table->foreignId('status_id')->constrained('status');
                $table->date('inicio');
                $table->date('fin');
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
        Schema::dropIfExists('orders');
    }
};
