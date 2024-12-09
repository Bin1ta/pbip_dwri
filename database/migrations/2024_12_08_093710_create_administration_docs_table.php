<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('administration_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administration_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('doc')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administration_docs');
    }
};
