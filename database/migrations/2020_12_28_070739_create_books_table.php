<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code')->unique();
            $table->string('name');
            $table->longText('description');
            $table->string('thumbnail');
            $table->foreignId('category_id'); //kategori
            $table->foreignId('author_id'); //pengarang
            $table->foreignId('publisher_id'); //penerbit
            $table->year('publication_year'); //tahun terbit
            $table->string('isbn', 50);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
