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
        Schema::table("employers", function (Blueprint $table) {
            $table->string("location");
            $table->string("website");
        });

        Schema::table("job_listings", function (Blueprint $table) {
            $table->dropColumn("location");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("employers", function (Blueprint $table) {
            $table->dropColumn("location");
            $table->dropColumn("website");
        });

        Schema::table("job_listings", function (Blueprint $table) {
            $table->string("location");
        });
    }
};
