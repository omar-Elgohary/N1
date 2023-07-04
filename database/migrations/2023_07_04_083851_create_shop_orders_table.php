<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('shop_product_id')->constrained('shop_products')->cascadeOnDelete();
            $table->string('products_count');
            $table->string('total_price');
            $table->enum('order_status', ['قيد التجهيز', 'جاهز للاستلام', 'تم الشحن', 'مكتمل'])->default('قيد التجهيز');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_orders');
    }
};
