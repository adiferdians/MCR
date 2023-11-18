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
        Schema::create('service_certifications', function (Blueprint $table) {
            $table->id("service_id");
            $table->string('name');
            $table->string('agency');
            $table->date('start_date');
            $table->string('status');
            $table->string('notes');
            $table->timestamps();

            // Mendeklarasikan foreign key
            $table->unsignedBigInteger('survelliance_id');
            $table->foreign('survelliance_id')->references('survelliance_id')->on('surveillance_certifications')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_certifications');
    }
};
