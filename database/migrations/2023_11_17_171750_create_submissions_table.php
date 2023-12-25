<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Villager;
use App\Models\Submission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('villager_id')->constrained();
            $table->enum('region_rt', [Villager::RT1, Villager::RT2, Villager::RT3, Villager::RT4, Villager::RT5]);
            $table->enum('type', [Submission::TYPE_BORN, Submission::TYPE_DIE, Submission::TYPE_POOR]);
            $table->string('name');
            $table->bigInteger('nik');
            $table->enum('gender', [Villager::GENDER_MAN, Villager::GENDER_WOMEN]);
            $table->enum('religion', [Villager::RELIGION_ISLAM, Villager::RELIGION_KRISTEN, Villager::RELIGION_KATOLIK, Villager::RELIGION_HINDHU, Villager::RELIGION_BUDHA, Villager::RELIGION_KONGHUCU]);
            $table->string('address');
            $table->string('job');
            $table->string('nationaly');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('attachment')->nullable();
            $table->string('description');
            $table->enum('marital_status', [Submission::MARITAL_STATUS_MARRIED, Submission::MARITAL_STATUS_SINGLE]);
            $table->enum('is_rw_approve', ['1', '0'])->default('0');
            $table->enum('is_rt_approve', ['1', '0'])->default('0');
            $table->enum('status', [Submission::STATUS_APPROVE, Submission::STATUS_NEED_VERIF, Submission::STATUS_NEED_REVISION])->nullable();
            $table->string('letter_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
