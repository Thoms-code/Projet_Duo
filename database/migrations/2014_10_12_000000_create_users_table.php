<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('nom')->nullable();
            $table->integer('age')->nullable();
            $table->char('email')->nullable();
            $table->string('id_avatars', 45)->nullable();
            $table->unique(["email"], 'email_UNIQUE');
            $table->foreign('id_avatars')
                ->references('id')->on('Avatars')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('users');
    }
}
