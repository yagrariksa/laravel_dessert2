<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMorephotoToBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->string('imagelink2')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink3')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink4')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink5')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink6')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink7')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink8')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink9')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
            $table->string('imagelink10')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            //
        });
    }
}
