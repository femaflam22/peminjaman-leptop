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
        Schema::create('laptop_lendings', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('name');
            $table->string('region');
            $table->string('purposes');
            $table->string('ket');
            $table->date('date');
            $table->date('return_date')->nullable();
            $table->string('teacher');
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
        Schema::dropIfExists('laptop_lendings');
    }
};
