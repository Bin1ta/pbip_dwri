<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->string('photo');
            $table->longText('remarks')->nullable();
            $table->string('type')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrations');
    }
};
