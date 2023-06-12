<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('forest_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forest_category_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->foreignId('sub_division_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
            $table->string('forest_name')->nullable();
            $table->string('forest_name_en')->nullable();
            $table->string('address')->nullable();
            $table->string('address_en')->nullable();
            $table->string('symbol')->nullable();
            $table->string('house_hold')->nullable();
            $table->string('area')->nullable();
            $table->string('approve_date')->nullable();
            $table->string('end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forest_details');
    }
};
