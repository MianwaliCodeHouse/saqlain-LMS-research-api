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
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id')->primary();
            $table->string('form_no')->nullable();
            $table->string('vu_registration_no')->nullable();
            $table->string('study_program')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('virtual_campus_code')->nullable();
            $table->string('current_semester_no')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('cnic')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('mailing_address')->nullable();
            $table->string('student_email')->nullable();
            $table->string('phone_res')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('marks_in_matric')->nullable();
            $table->string('marks_in_intermediate');
            $table->string('bachelor_degree')->nullable();
            $table->string('marks_in_bachelor')->nullable();
            $table->string('master_degree')->nullable();
            $table->string('marks_in_master')->nullable();
            $table->string('name')->nullable();
            $table->string('vu_email')->nullable();
            $table->text('base64_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
