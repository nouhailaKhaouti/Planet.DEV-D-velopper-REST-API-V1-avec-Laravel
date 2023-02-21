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
        Schema::create('tags_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('article_id')->unsigned();
            $table->unsignedBiginteger('tag_id')->unsigned();

            $table->foreign('article_id')->references('id')
                 ->on('articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')
                ->on('tags')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_articles');
    }
};
