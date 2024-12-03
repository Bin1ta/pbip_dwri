<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('canals', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            if (config('default.dual_language')) {
                $table->string('title_en')->nullable();
            }
            $table->string('photo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('canals');
    }
};
