<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('current_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place');
            $table->string('work')->nullable();
            $table->string('identification_no')->nullable();;
            $table->string('contractor_detail')->nullable();
            $table->string('agreement_date')->nullable();
            $table->string('agreement_amount')->nullable();
            $table->string('completion_date')->nullable();
            $table->string('extension_time')->nullable();
            $table->string('extension_duration')->nullable();
            $table->string('completion_date_revised')->nullable();
            $table->string('updated_progress')->nullable();
            $table->string('authrized_person')->nullable();
            $table->boolean('status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('current_contracts');
    }
};
