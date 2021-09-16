<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listorders', function (Blueprint $table) {
            $table->id();
            $table->date('date_order');
            $table->string('name_product');
            $table->integer('quantity');
            $table->integer('total');
            $table->bigInteger('resource_id')->unsigned();
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
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
        Schema::dropIfExists('listorders');
    }
}
