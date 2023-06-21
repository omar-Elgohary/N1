<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('product_image');
            $table->string('product_name');
            $table->string('description');
            $table->string('price');
            $table->string('calories');
            $table->enum('status', ['متوفر', 'غير متوفر'])->default('متوفر');

            $table->foreignId('extra_id')->constrained('extras')->cascadeOnDelete();
            $table->foreignId('without_id')->constrained('withouts')->cascadeOnDelete();
            $table->foreignId('branche_id')->constrained('branches')->cascadeOnDelete();

            $table->string('quantity');
            $table->string('sold_quantity')->nullable();
            $table->string('remaining_quantity')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
