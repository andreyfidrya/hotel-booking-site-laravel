<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Facility;
use App\Models\Housetype;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facility_housetype', function (Blueprint $table) {
            $table->foreignIdFor(Facility::class)->constrained();
            $table->foreignIdFor(Housetype::class)->constrained();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facility_housetype');
    }
};
