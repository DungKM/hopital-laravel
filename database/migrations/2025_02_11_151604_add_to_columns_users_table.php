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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('slug')->nullable()->unique()->after('name');
            $table->string('phone')->nullable()->after('slug');
            $table->unsignedBigInteger('specialty_id')->nullable()->after('phone');
            $table->unsignedBigInteger('workroom_id')->nullable()->after('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('set null');
            $table->foreign('workroom_id')->references('id')->on('work_rooms')->onDelete('set null');
            $table->unsignedBigInteger('google_id')->nullable()->after('workroom_id');
            $table->string('education')->nullable()->after('google_id');
            $table->string('degress')->nullable()->after('education');
            $table->string('position')->nullable()->after('degress');
            $table->string('gender')->nullable()->after('position');
            $table->string('language')->nullable()->after('gender');
            $table->string('activities')->nullable()->after('language');
            $table->string('province')->nullable()->after('activities');
            $table->string('city')->nullable()->after('province');
            $table->string('ward')->nullable()->after('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['specialty_id']);
            $table->dropForeign(['workroom_id']);
            $table->dropColumn([
                'slug',
                'phone',
                'specialty_id',
                'workroom_id',
                'google_id',
                'education',
                'degress',
                'position',
                'gender',
                'language',
                'activities',
                'province',
                'city',
                'ward'
            ]);
        });
    }
};
