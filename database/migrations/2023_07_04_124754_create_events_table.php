<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('event_image');
            $table->json('name');
            $table->json('description');
            $table->string('ticket_price');
            $table->string('reservations_type_id')->constrained('reservation_types')->cascadeOnDelete();
            $table->enum('status', ['لم يبدأ', 'متاح', 'متوقف', 'منتهي'])->default('لم يبدأ');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->date('start_reservation_date');

            $table->string('tickets_quantity');
            $table->string('tickets_sold_quantity')->nullable()->default(0);
            $table->string('tickets_remaining_quantity')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
