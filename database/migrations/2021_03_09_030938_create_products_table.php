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
            $table->bigInteger("categories_id")->unsigned();
            $table->string('name');
            $table->string('code', 100)->unique();
            $table->string('slug');
            $table->string('info');
            $table->string('describer');
            $table->string('image');
            $table->decimal('price',18);
            $table->tinyInteger('featured');
            $table->tinyInteger('state');
            $table->timestamps();
            $table->foreign("categories_id")->references("id")->on("categories")->onDelete("cascade");
        
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
