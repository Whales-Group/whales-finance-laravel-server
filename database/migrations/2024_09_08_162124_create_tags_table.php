<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tags", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("tag");
            $table->timestamps();
        });

        Schema::create("tag_history", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tag_id");
            $table->unsignedBigInteger("user_id");
            $table->string("old_tag");
            $table->string("new_tag");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tag_history");
        Schema::dropIfExists("tags");
    }
};