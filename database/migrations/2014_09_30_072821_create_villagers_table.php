<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Villager;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('villagers', function (Blueprint $table) {
            $table->id();
            $table->enum('region_rt', [Villager::RT1, Villager::RT2, Villager::RT3, Villager::RT4, Villager::RT5]);
            $table->bigInteger('nik')->unique();
            $table->bigInteger('number_kk')->unique();
            $table->string('name');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->enum('gender', [Villager::GENDER_MAN, Villager::GENDER_WOMEN]);
            $table->enum('religion', [Villager::RELIGION_ISLAM, Villager::RELIGION_KRISTEN, Villager::RELIGION_KATOLIK, Villager::RELIGION_HINDHU, Villager::RELIGION_BUDHA, Villager::RELIGION_KONGHUCU]);
            $table->string('address');
            $table->string('job');
            $table->string('nationaly');
            $table->string('phone_number');
            $table->enum('status_account', ['1', '0'])->default('1');
            $table->enum('is_operator', ['1', '0'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villagers');
    }
};
