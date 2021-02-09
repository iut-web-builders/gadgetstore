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
            $table->timestamps();
            $table->string('name');

            $table->string('image');
            $table->unsignedInteger('price');
            $table->text('description');
            $table->unsignedInteger('point');
            $table->string('brand');
            $table->string('category');
            $table->unsignedBigInteger('stock')->default(0);

            $table->unsignedInteger('user_id');

            $table->index('user_id');
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
