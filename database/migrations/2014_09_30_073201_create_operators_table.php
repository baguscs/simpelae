<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Villager;
use App\Models\Operator;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->enum('region_rt', [Villager::RT1, Villager::RT2, Villager::RT3, Villager::RT4, Villager::RT5])->nullable();
            $table->enum('position', [Operator::POSITION_KETUA_RW, Operator::POSITION_KETUA_RT, Operator::POSITION_WARGA])->nullable();
            $table->string('signature')->nullable();
            $table->foreignId('villager_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
