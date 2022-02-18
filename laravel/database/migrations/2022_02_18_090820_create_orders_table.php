<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedInteger("student_id");
            $table->foreign("student_id")->references("id")->on("student")->onDelete('cascade');
            $table->double("amount");
            $table->date("date");
            $table->boolean("is_completed");
            $table->string("payment_info");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
