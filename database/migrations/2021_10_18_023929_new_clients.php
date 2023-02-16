<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newclients', function (Blueprint $table) {
            $table->id();
            $table->text('company');
            $table->text('telephone')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('zip')->nullable();
            $table->text('contact')->nullable();
            $table->text('serial');
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
        Schema::dropIfExists('newclients');
    }
}
