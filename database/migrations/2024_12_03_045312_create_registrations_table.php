<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('date');
            $table->integer('letter_count');
            $table->string('invoice_no')->nullable();
            $table->string('rec_date');
            $table->string('sender_name');
            $table->string('address');
            $table->text('subject');
            $table->string('department');
            $table->string('photo')->nullable();
            $table->longText('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
