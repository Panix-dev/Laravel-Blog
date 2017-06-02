<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaToItags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itags', function (Blueprint $table) {
            $table->string('meta_title')->after('slug');
            $table->text('meta_desscription')->after('slug');
            $table->string('meta_keywords')->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itags', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_desscription');
            $table->dropColumn('meta_keywords');
        });
    }
}
