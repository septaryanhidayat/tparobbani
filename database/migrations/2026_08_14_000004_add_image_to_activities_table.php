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
        if (!Schema::hasColumn('activities', 'image')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->string('image')->nullable()->after('color');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('activities', 'image')) {
            Schema::table('activities', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
};
