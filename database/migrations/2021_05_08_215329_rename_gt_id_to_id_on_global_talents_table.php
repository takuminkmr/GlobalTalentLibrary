<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGtIdToIdOnGlobalTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_talents', function (Blueprint $table) {
            $table->renameColumn('gt_id', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_talents', function (Blueprint $table) {
            $table->renameColumn('id', 'gt_id');
        });
    }
}
