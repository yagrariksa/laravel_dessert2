<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 17, 2);
            $table->boolean('available')->default(true);
            $table->longText('desc')->nullable();
            $table->string('category');
            $table->string('imagelink')->nullable()->default('1yPApSJK5_oe0nTB4W35CWZI8Q1HeuigW');
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
        Schema::dropIfExists('barangs');
    }
}
