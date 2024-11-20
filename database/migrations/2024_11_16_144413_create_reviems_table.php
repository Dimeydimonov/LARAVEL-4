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
        Schema::create('reviems', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamps();

            $table->unsignedBigInteger('reviemable_id');
            $table->string('reviemable_type');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviems');
    }
};
