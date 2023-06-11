<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lawsuits', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('type_en');
            $table->string('bigo');
            $table->string('bigo_en');
            $table->string('fine');
            $table->string('jailed')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('reg_body')->nullable();
            $table->string('accused')->nullable();
            $table->string('remarks')->nullable();
            $table->string('remarks_en')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lawsuits');
    }
};
