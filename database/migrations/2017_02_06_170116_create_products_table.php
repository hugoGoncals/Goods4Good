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
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('description');
            $table->float('price');
            $table->integer('quantity');
            $table->integer('idprovider')->unsigned();
            $table->integer('idcategory')->unsigned();
            $table->integer('idstatus')->unsigned();
            $table->foreign('idprovider')->references('id')->on('providers');
            $table->foreign('idcategory')->references('id')->on('categories');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
            
    }
}
