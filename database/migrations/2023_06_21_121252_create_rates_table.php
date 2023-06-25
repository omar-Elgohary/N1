<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('restaurent_product_id')->constrained('restaurent_products')->cascadeOnDelete();
            $table->string('rate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rates');
    }
};
