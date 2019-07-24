<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 100);
            $table->integer('user_id');
            $table->date('date');
            $table->tinyInteger('is_delete')->default(0);
            $table->integer('type');
            $table->integer('transportation_id');
            $table->tinyInteger('is_oneway')->default(0);
            $table->char('from', 40);
            $table->char('to', 40);
            $table->integer('cost');
            $table->text('overview');
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
        Schema::dropIfExists('requests');
    }
}
