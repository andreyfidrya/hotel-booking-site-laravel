<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('house_id')
                ->constrained()
                ->restrictOnDelete();
             
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete(); 

            $table->date('arrival_date'); 
            $table->date('departure_date');

            $table->unsignedTinyInteger('adults'); 
            $table->unsignedTinyInteger('children'); 

            $table->boolean('pets')->default(false); 

            $table->foreignId('coupon_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->unsignedInteger('amount');           
            
            $table->string('full_name'); 
            $table->string('phone'); 
            $table->string('email');

            $table->enum('status', [ 'неоплаченный', 'оплачен', 'отменен' ])->default('неоплаченный');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
