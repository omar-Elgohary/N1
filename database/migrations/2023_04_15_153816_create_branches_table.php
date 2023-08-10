<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('random_id');
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->json('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('confirmed_password');
            $table->string('branche_location')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            // edit
            $table->string('image', 50)->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->enum('delivery', [1, 0])->nullable();   // 1-delivery   // 2-pickup
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
