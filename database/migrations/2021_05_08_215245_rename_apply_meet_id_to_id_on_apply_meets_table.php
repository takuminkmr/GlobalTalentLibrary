<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameApplyMeetIdToIdOnApplyMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_meets', function (Blueprint $table) {
            $table->renameColumn('apply_meet_id', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apply_meets', function (Blueprint $table) {
            $table->renameColumn('id', 'apply_meet_id');
        });
    }
}
