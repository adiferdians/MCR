<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('service_id')->on('service_certifications')->onDelete('CASCADE');
            $table->string('company_name');
            $table->text('address');
            $table->string('company_contact');
            $table->string('pic');
            $table->string('pic_contact');
            $table->string('service');
            $table->text('service_detil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
