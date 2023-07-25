<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('withouts', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('withouts');
    }
};
