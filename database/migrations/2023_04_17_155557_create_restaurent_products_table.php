<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('restaurent_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branche_id')->constrained('branches')->cascadeOnDelete();
            $table->string('images');
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->double('calories');
            $table->string('extra');
            $table->string('without');
            $table->enum('status', ['منشور', 'غير منشور'])->default('منشور');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurent_products');
    }
};
