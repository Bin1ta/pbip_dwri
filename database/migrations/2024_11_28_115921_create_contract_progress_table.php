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
            $table->string('contract_id');
            $table->string('contractor_name');
            $table->string('contractor_amount');
            $table->string('agreement_date');
            $table->string('completion_date')->nullable();
            $table->string('completion_date_due')->nullable();
            $table->string('times_extended')->nullable();
            $table->string('times_extended_reversed')->nullable();
            $table->string('financial_progress_amount')->nullable();
            $table->string('financial_progress_percent')->nullable();
            $table->string('financial_progress_date')->nullable();
            $table->string('physical_progress_percent')->nullable();
            $table->string('physical_progress_date')->nullable();
            $table->longText('remarks')->nullable();
            $table->boolean('progress_status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contract_progress');
    }
};
