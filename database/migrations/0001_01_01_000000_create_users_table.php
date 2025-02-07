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
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->enum("profile_type", ['personal','corporate']);
            $table->string("business_name")->default("None");
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("middle_name")->nullable();
            $table->string("tag", 20)->unique()->nullable();
            $table->string("email", 100)->unique()->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("gender")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("nin")->nullable();
            $table->string("bvn")->nullable();
            $table->string("marital_status")->nullable();
            $table->string("employment_status")->nullable();
            $table->string("annual_income")->nullable();
            $table->string("profile_url")->nullable();
            $table->string("other_url")->nullable();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create("password_reset_tokens", function (Blueprint $table) {
            $table->string("email", 60)->index();
            $table->string("token");
            $table->timestamp("created_at")->nullable();
        });

        Schema::create("sessions", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->foreignId("user_id")->nullable()->index();
            $table->string("ip_address", 45)->nullable();
            $table->text("user_agent")->nullable();
            $table->longText("payload");
            $table->integer("last_activity")->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("users");
        Schema::dropIfExists("password_reset_tokens");
        Schema::dropIfExists("sessions");
    }
};
