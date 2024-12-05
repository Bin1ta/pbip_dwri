<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('work_plan_progress', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('month');
            $table->text('detail')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('first_quarterly_1')->nullable();
            $table->integer('first_quarterly_2')->nullable();
            $table->integer('first_quarterly_3')->nullable();
            $table->integer('first_quarterly_4')->nullable();
            $table->integer('second_quarterly_1')->nullable();
            $table->integer('second_quarterly_2')->nullable();
            $table->integer('second_quarterly_3')->nullable();
            $table->integer('second_quarterly_4')->nullable();
            $table->integer('third_quarterly_1')->nullable();
            $table->integer('third_quarterly_2')->nullable();
            $table->integer('third_quarterly_3')->nullable();
            $table->integer('third_quarterly_4')->nullable();
            $table->integer('monthly_progress')->nullable();
            $table->integer('upto_month_progress')->nullable();
            $table->text('completed_word')->nullable();
            $table->text('less_progress_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_plan_progress');
    }
};
