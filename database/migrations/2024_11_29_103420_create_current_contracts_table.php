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
            $table->string('place_id');
            $table->string('work');
            $table->string('identification_no');
            $table->string('contractor_detail');
            $table->string('agreement_date');
            $table->string('agreement_amount');
            $table->string('completion_date');
            $table->string('extension_time')->nullable();
            $table->string('extension_duration')->nullable();
            $table->string('completion_date_revised')->nullable();
            $table->boolean('current_status')->default(false);
            $table->string('updated_progress')->nullable();
            $table->string('authorised_person')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('current_contracts');
    }
};
