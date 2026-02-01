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
        Schema::table('stores', function (Blueprint $table) {
            // Make optional fields nullable so store can be created with minimal info
            $table->string('logo')->nullable()->change();
            $table->text('about')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->string('postal_code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string('logo')->nullable(false)->change();
            $table->text('about')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->text('address')->nullable(false)->change();
            $table->string('postal_code')->nullable(false)->change();
        });
    }
};
