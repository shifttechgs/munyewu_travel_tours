<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('service');          // service key from config/business.php
            $table->string('name');
            $table->string('contact');          // phone or email, operator calls back
            $table->date('trip_date')->nullable();
            $table->unsignedSmallInteger('group_size')->nullable();
            $table->string('pickup')->nullable();       // transfers
            $table->string('destination')->nullable();  // transfers
            $table->text('notes')->nullable();
            $table->string('source')->default('landing');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
