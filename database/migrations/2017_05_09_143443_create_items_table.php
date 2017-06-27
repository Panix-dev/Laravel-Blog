<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('pricing_body');
            $table->text('body_1');
            $table->text('body_2');
            $table->text('body_3');
            $table->text('body_4');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->integer('type_id')->nullable()->unsigned();
            $table->string('weekdays');
            $table->text('google_map');
            $table->integer('points_to_award');
            $table->string('meta_title');
            $table->text('meta_desscription');
            $table->string('meta_keywords');
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
        Schema::dropIfExists('items');
    }
}
