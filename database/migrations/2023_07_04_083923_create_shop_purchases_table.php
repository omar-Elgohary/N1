<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shop_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('shop_order_id')->constrained('shop_orders')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_purchases');
    }
};
