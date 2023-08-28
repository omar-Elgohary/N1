<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('table_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('branche_id')->constrained('branches')->cascadeOnDelete();
            $table->integer('clients_count');
            $table->string('reservations_type_id')->constrained('reservation_types')->cascadeOnDelete();
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->enum('reservation_status', ['جديد', 'قيد التجهيز', 'تم الاستلام', 'مكتمل'])->default('جديد');
            $table->double('total_price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('table_reservations');
    }
};
