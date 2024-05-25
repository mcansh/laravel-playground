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
        Schema::table("users", function (Blueprint $table) {
            $table->ulid("id")->change();
        });

        Schema::table("employers", function (Blueprint $table) {
            $table->ulid("id")->change();
        });

        Schema::table("job_listings", function (Blueprint $table) {
            $table->ulid("id")->change();
        });

        Schema::table("tags", function (Blueprint $table) {
            $table->ulid("id")->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("users", function (Blueprint $table) {
            $table->id()->change();
        });

        Schema::table("employers", function (Blueprint $table) {
            $table->id()->change();
        });

        Schema::table("job_listings", function (Blueprint $table) {
            $table->id()->change();
        });

        Schema::table("tags", function (Blueprint $table) {
            $table->id()->change();
        });
    }
};
