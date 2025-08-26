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
        Schema::table('livres', function (Blueprint $table) {
            $table->string('titre')->after('id')->nullable(false);
            $table->unsignedBigInteger('auteur_id')->after('titre')->nullable(false);
            $table->string('isbn')->after('auteur_id')->nullable(false);
            $table->date('publication_date')->after('isbn')->nullable(false);
            $table->unsignedBigInteger('categorie_id')->after('publication_date')->nullable(false);
            $table->text('resume')->after('categorie_id')->nullable();
            $table->decimal('prix', 8, 2)->after('resume')->nullable(false);
            $table->foreign('auteur_id')->references('id')->on('author')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livres', function (Blueprint $table) {
            $table->dropForeign(['auteur_id']);
            $table->dropForeign(['categorie_id']);
            $table->dropColumn(['titre', 'auteur_id', 'isbn', 'publication_date', 'categorie_id', 'resume', 'prix']);
        });
    }
};
