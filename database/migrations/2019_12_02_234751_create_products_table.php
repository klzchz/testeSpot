<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('cod_product');
            $table->unsignedBigInteger('cod_category');

            $table->string('name',100);

            $table->longText('description')->nullable();

            $table->string('picture',191)->nullable();

            $table->double('price');

            $table->foreign('cod_category')
                    ->references('cod_category')
                    ->on('categories')
                    ->onDelete('cascade');


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
