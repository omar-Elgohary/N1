<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_orders', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->string('branche_id')->constrained('branches')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->string('reservations_type_id')->constrained('reservation_types')->cascadeOnDelete();
            $table->foreignId('offer_id')->nullable()->constrained('offers')->cascadeOnDelete();
            $table->string('tickets_count');
            $table->string('total_price');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->enum('order_status', ['حجز مؤكد', 'لم يتم تأكيد الحضور', 'تم تأكيد الحضور' ])->default('لم يتم تأكيد الحضور' );
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_orders');
    }
};
