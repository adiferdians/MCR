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
            $table->bigIncrements('client_id');
            $table->unsignedBigInteger('service_id');
            $table->string('company_name');
            $table->text('address');
            $table->string('company_contact');
            $table->string('pic');
            $table->string('pic_contact');
            $table->string('service');
            $table->text('service_detail');
            $table->timestamps();
        });

        Schema::create('service_certifications', function (Blueprint $table) {
            $table->bigIncrements('certification_id');
            $table->unsignedBigInteger('surveillance_id');
            $table->string('name');
            $table->string('agency');
            $table->date('start_date');
            $table->string('status');
            $table->string('notes');
            $table->timestamps();

        });

        Schema::create('surveillance_certifications', function (Blueprint $table) {
            $table->bigIncrements('surveillance_id');
            $table->date('surveillance_1');
            $table->date('surveillance_2');
            $table->string('count');
            $table->string('notification');
            $table->timestamps();

        });

        Schema::create('service_consultations', function (Blueprint $table) {
            $table->bigIncrements('consultation_id');
            $table->string('name');
            $table->date('start_date');
            $table->string('status');
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('service_certifications');
        Schema::dropIfExists('surveillance_certifications');
        Schema::dropIfExists('detil_certifications');
        Schema::dropIfExists('service_consultations');
    }
};
