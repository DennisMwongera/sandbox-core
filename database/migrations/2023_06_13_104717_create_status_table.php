<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->morphs('state');
            
            $table->integer('creation')->nullable();
            $table->integer('development')->nullable();
            $table->integer('staging')->nullable();
            $table->integer('production')->nullable();

            $table->timestamp('created')->nullable();
            $table->timestamp('developed_at')->nullable();
            $table->timestamp('staged_at')->nullable();
            $table->timestamp('produced_at')->nullable();

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
        Schema::dropIfExists('status');
    }
}
