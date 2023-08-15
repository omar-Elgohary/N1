<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meal_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('restaurent_product_id')->nullable()->constrained('restaurent_products')->cascadeOnDelete();
            $table->double('rate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meal_rates');
    }
};
