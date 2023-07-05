<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('event_order_id')->constrained('event_orders')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_purchases');
    }
};
