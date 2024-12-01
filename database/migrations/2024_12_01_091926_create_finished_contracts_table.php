<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('finished_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place_id');
            $table->string('work');
            $table->string('identification_no');
            $table->string('contractor_detail');
            $table->string('agreement_date');
            $table->string('agreement_amount');
            $table->string('completion_date');
            $table->string('actual_expenditure')->nullable();
            $table->boolean('contractors_liability_status')->default(false);
            $table->boolean('current_status')->default(false);
            $table->string('work_completed')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('finished_contracts');
    }
};
