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
        Schema::create('job_hunting_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('priority')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('corporation_id')->constrained()->cascadeOnDelete();
            $table->integer('way_id')->default(0);
            $table->text('note');
            $table->integer('status_id')->default(0);
            $table->date('submit')->nullable();
            $table->date('interview1')->nullable();
            $table->date('interview2')->nullable();
            $table->date('interview_last')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_hunting_statuses');
    }
};
