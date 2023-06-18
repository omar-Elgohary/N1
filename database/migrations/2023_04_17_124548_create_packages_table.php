<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->string('image');

            $table->string('first_meal')->constrained('meals');
            $table->string('second_meal')->constrained('meals');

            $table->date('start_date');
            $table->date('end_date');
            $table->double('price');
            $table->string('users_count');
            $table->integer('how_many_times_user_use_this_coupon');
            $table->enum('status', ['مفعل', 'غير مفعل'])->default('مفعل');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
