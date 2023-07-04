<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('restaurent_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('restaurent_order_id')->constrained('restaurent_orders')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurent_purchases');
    }
};
