<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->string('branche_id')->constrained('branches')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('product_image');
            $table->json('name');
            $table->json('description');
            $table->double('price');
            $table->string('size_id');
            $table->string('color_id');
            $table->enum('returnable', ['لا', 'نعم'])->default('لا');
            $table->enum('guarantee', ['لا', 'نعم'])->default('لا');
            $table->enum('status', ['متوفر', 'غير متوفر'])->default('متوفر');

            $table->integer('quantity');
            $table->integer('sold_quantity')->default(0);
            $table->integer('remaining_quantity')->default(0);
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_products');
    }
};
