<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_type_id')->constrained()->onDelete('cascade');
            $table->string('title', 200);
            $table->unsignedInteger('vacancy');
            $table->string('salary')->nullable();
            $table->string('location', 50);
            $table->text('description');
            $table->text('benefits')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('keywords')->nullable();
            $table->string('experience', 50);
            $table->string('company_name', 75);
            $table->string('company_location')->nullable();
            $table->string('company_website')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('isFeatured')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
