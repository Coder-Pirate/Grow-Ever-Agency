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
        Schema::create('siteinfos', function (Blueprint $table) {
            $table->id();
            $table->string('fabicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('site_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('working_days')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('branch_address')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('tw_url')->nullable();
            $table->string('wh_url')->nullable();
            $table->string('in_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siteinfos');
    }
};
