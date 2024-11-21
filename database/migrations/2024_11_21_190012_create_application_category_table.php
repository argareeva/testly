<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('application_category', function (Blueprint $table) {
            $table->foreignId('application_id');
            $table->foreignId('category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_category');
    }
};
