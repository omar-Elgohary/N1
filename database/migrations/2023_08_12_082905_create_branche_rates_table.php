<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('branche_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branche_id')->constrained('branches')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->double('rate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('branche_rates');
    }
};
