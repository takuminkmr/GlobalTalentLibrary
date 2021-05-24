<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_talents', function (Blueprint $table) {
            $table->increments('gt_id');
            $table->string('gt_name');
            $table->string('school');
            $table->string('faculty');
            $table->text('introduction');
            $table->text('photo');
            $table->text('video');
            $table->string('gt_email')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_talents');
    }
}
