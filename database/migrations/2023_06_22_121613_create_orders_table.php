<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('restaurent_product_id')->constrained('restaurent_products')->cascadeOnDelete();
            $table->string('products_count');
            $table->string('total_price');
            $table->enum('order_status', ['جديد', 'قيد التجهيز', 'تم الاستلام', 'مكتمل'])->default('جديد');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
