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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->text('bio');
            $table->json('social_media_links')->nullable();
            $table->string('profile_image')->nullable();
            $table->boolean('availability_status')->nullable();
            $table->string('resume_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {Schema::dropIfExists('profiles');
        
    }
};
