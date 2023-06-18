<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_type');
            $table->integer('users_count');
            $table->enum('status', ['غير مفعل', 'مفعل'])->default('مفعل');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('coupon_id')->nullable()->constrained('coupons');
            $table->foreignId('package_id')->nullable()->constrained('packages');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
