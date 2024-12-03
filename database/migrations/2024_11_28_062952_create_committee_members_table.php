<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('committee_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('address')->nullable();
            $table->string('address_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('post')->nullable();
            $table->string('post_en')->nullable();
            $table->string('remarks')->nullable();
            $table->foreignId('committee_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('committee_members');
    }
};
