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
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('product_image');
            $table->string('product_name');
            $table->string('description');
            $table->string('price');
            $table->string('size_id');
            $table->string('color_id');
            $table->enum('returnable', ['لا', 'نعم'])->default('لا');
            $table->enum('guarantee', ['لا', 'نعم'])->default('لا');
            $table->enum('status', ['متوفر', 'غير متوفر'])->default('متوفر');
            $table->string('branche_id')->nullable();
            $table->string('quantity');
            $table->string('sold_quantity')->nullable()->default(0);
            $table->string('remaining_quantity')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_products');
    }
};
