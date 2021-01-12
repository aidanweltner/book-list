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
            $table->string('slug', 50);
            $table->string('title');
            $table->string('author');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->longText('review');
            $table->tinyInteger('rating')->nullable();
            $table->string('purchase')->nullable();
            $table->string('amazon')->nullable();
            $table->timestamp('completed')->nullable();
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
