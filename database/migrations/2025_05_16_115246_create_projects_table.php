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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->text('description');
            $table->string('thumbnail')->nullable(); // Path to thumbnail image
            $table->string('full_image')->nullable(); // Path to full-size image
            $table->string('project_url')->nullable(); // URL of the live project
            $table->boolean('featured')->default(false);
            $table->text('technologies')->nullable()->after('description'); // Flag for featured projects
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::table('projects', function (Blueprint $table) {            
            $table->dropForeign(['user_id']);     
           });
    }
};