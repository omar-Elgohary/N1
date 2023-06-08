<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('confirmed_password');
            $table->enum('type', ['admin', 'seller', 'user'])->default('user');

            $table->string('company_name')->nullable();
            $table->string('activity_type')->nullable();
            $table->string('commercial_registration_number', 20)->nullable();
            $table->string('commercial_registration_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
