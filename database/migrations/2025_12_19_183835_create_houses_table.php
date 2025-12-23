<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('housetype_id')->constrained('housetypes');
            $table->text('description');
            $table->string('featured_image');
            $table->text('galery_images');            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
