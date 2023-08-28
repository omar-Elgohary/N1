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
            $table->string('branche_id')->constrained('branches')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('product_image');
            $table->json('name');
            $table->json('description');
            $table->double('ticket_price');
            $table->string('reservations_type_id')->constrained('reservation_types')->cascadeOnDelete();
            $table->enum('status', ['لم يبدأ', 'متاح', 'متوقف', 'منتهي'])->default('لم يبدأ');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->date('start_reservation_date');

            $table->integer('quantity');
            $table->integer('sold_quantity')->default(0);
            $table->integer('remaining_quantity')->default(0);
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
