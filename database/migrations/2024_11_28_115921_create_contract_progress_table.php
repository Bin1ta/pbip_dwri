<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contract_progress', function (Blueprint $table) {
            $table->id();
            $table->string('work_name');
            $table->string('work_name_en')->nullable();
            $table->string('contract_id');
            $table->string('contractor_name');
            $table->string('contractor_name_en')->nullable();
            $table->string('contractor_amount');
            $table->string('agreement_date');
            $table->string('completion_date')->nullable();
            $table->string('completion_date_due')->nullable();
            $table->string('time_extended_reserved')->nullable();
            $table->string('financial_progress_amount')->nullable();
            $table->string('financial_progress_Percent')->nullable();
            $table->string('financial_progress_date')->nullable();
            $table->string('physical_progress_date')->nullable();
            $table->string('physical_progress_percent')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('remarks_en')->nullable();
            $table->boolean('status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contract_progress');
    }
};
