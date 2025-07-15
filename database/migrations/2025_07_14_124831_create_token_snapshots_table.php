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
        Schema::create('token_snapshots', function (Blueprint $table) {
            $table->id();
            $table->string('token_id');
            $table->string('symbol')->unique();
            $table->decimal('value_usd');
            $table->timestamp('last_snapshot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('token_snapshots');
    }
};
