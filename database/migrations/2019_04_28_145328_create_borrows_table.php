<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->date('returned_on')->nullable();
            $table->enum('status',['book','uncomplete','borrowed','denied','returned'])->default('uncomplete');
            $table->enum('status_denda',['aktif','non-aktif'])->default('non-aktif');
            $table->integer('employee_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->boolean('approve')->default(0);
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
        Schema::dropIfExists('borrows');
    }
}
