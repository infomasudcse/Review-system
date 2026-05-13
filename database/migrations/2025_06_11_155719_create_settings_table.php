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
         Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('business_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
			$table->string('country_name')->nullable();
			$table->string('country_code')->nullable();
            $table->string('google_review_link')->nullable();
            $table->string('google_business_name')->nullable();
			$table->text('default_whatsapp_template')->nullable();
			$table->text('default_email_template')->nullable();
			$table->string('slug')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
