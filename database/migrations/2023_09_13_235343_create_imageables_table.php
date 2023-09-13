<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('imageables', function (Blueprint $table) {
            $table->foreignId('image_id')->constrained();
            $table->morphs('imageable');
            $table->boolean('is_favorite')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imageables');
    }
};
