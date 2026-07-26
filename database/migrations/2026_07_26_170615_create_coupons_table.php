<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            // Код купона
            $table->string('code')->unique();

            // Тип скидки
            $table->enum('type', ['fixed', 'percent']);

            // Размер скидки
            $table->decimal('value', 10, 2);

            // Максимальное количество использований
            $table->unsignedInteger('usage_limit')->nullable();

            // Сколько раз уже использован
            $table->unsignedInteger('used_count')->default(0);

            // Дата окончания действия
            $table->dateTime('expires_at')->nullable();

            // Активен ли купон
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
