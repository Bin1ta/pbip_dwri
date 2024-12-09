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
            $table->string('reg_no')->nullable();
            $table->string('date')->nullable();
            $table->integer('letter_count')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('rec_date')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('address')->nullable();
            $table->text('subject')->nullable();
            $table->string('department')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete()->onUpdate('no action');
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
