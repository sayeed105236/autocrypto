<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_money', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('receiver_id')->nullable();
            $table->integer('received_from')->nullable();
            $table->string('type')->nullable();
            $table->float('amount');
            $table->string('method')->nullable();
            $table->string('txn_id')->nullable();
            $table->enum('status',['pending','approve','rejected'])->default('pending');
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
        Schema::dropIfExists('add_money');
    }
}
