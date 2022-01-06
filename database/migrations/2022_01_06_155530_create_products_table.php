<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('sku', 255)->unique();
            $table->string('slug', 255)->nullable();
            $table->string('name', 255);
            $table->longText('description')->nullable();
            $table->bigInteger('price')->unsigned();
            $table->bigInteger('disc_price')->unsigned()->nullable()->comment('Price after discount');
            $table->integer('stock')->unsigned()->default(0);
            $table->integer('weight')->unsigned()->nullable()->comment('Grams');
            $table->integer('sold_count')->nullable()->default(0);
            $table->dateTime('published_at')->nullable();
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
        Schema::dropIfExists('products');
    }
}
