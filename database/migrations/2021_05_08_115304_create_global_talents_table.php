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
            $table->increments('id');
            $table->string('gt_name', 100);
            $table->string('school', 100);
            $table->string('faculty', 100);
            $table->text('introduction');
            $table->text('photo');
            $table->text('photo_path');
            $table->text('video');
            $table->string('gt_email')->unique();
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
        Schema::dropIfExists('global_talents');
    }
}
