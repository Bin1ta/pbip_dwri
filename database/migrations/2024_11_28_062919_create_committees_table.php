<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('committee_category_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('committees');
    }
};
