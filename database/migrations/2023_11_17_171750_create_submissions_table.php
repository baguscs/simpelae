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
            $table->enum('type', [Submission::TYPE_BORN, Submission::TYPE_DIE, Submission::TYPE_POOR])->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('nik')->nullable()->unique();
            $table->enum('gender', [Villager::GENDER_MAN, Villager::GENDER_WOMEN])->nullable();
            $table->string('attachment');
            $table->string('description');
            $table->date('date');
            $table->enum('is_rw_approve', ['1', '0'])->nullable();
            $table->enum('is_rt_approve', ['1', '0'])->nullable();
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
