<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('restaurent_products', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('product_image');
            $table->json('name');
            $table->json('description');
            $table->double('price');
            $table->string('calories')->nullable();
            $table->enum('status', ['متوفر', 'غير متوفر'])->default('متوفر');

            $table->string('extra_id')->constrained('extras')->nullable();
            $table->string('without_id')->constrained('withouts')->nullable();
            $table->string('branche_id')->constrained('branches')->nullable();

            $table->integer('quantity');
            $table->integer('sold_quantity')->default(0);
            $table->integer('remaining_quantity')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurent_products');
    }
};
