<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('custom_logging', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_logging');
    }
};
