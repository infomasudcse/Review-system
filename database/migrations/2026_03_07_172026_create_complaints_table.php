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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
			// Links the complaint to the specific client in your system
			$table->foreignId('client_id')->constrained()->onDelete('cascade');
			$table->text('message');
			$table->string('tokenId')->nullable();
			$table->boolean('is_resolved')->default(false);
			$table->timestamp('resolved_at')->nullable(); // Good for tracking response time
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
