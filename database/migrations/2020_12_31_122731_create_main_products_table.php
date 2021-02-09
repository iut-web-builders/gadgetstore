<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('image');
            $table->unsignedInteger('price');
            $table->text('description');
            $table->unsignedInteger('point');
            $table->string('brand');
            $table->string('category');
            $table->unsignedInteger('mod_id');
            $table->unsignedBigInteger('stock')->default(0);
            $table->index('mod_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_products');
    }
}
