<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_meets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('apply_member_id');
            $table->unsignedInteger('apply_gt_id');
            $table->text('meet_option_day');
            $table->unsignedTinyInteger('meet_way');
            $table->unsignedTinyInteger('meet_purpose');
            $table->text('purpose_detail');
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
        Schema::dropIfExists('apply_meets');
    }
}
