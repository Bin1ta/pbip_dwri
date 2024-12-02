<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('total_progress', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('periodicity');
            $table->string('financial_progress_periodic')->nullable();
            $table->string('financial_progress_cumulative')->nullable();
            $table->string('financial_progress_rs')->nullable();
            $table->string('periodic_percentage')->nullable();
            $table->string('yearly_percentage')->nullable();
            $table->string('periodic_physical_progress')->nullable();
            $table->string('periodic_physical_cumulative')->nullable();
            $table->longText('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('total_progress');
    }
};
