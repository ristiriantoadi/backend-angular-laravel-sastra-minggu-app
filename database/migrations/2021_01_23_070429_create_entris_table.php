<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entris', function (Blueprint $table) {
            $table->id();
            $table->string("nama_pengarang");
            $table->string("judul_karya");
            $table->string("jenis_karya");
            $table->string("media");
            $table->date('tanggal_muat');
            $table->unsignedBigInteger("user_id_pengarang");
            $table->unsignedBigInteger("user_id_pembuat_entri");
            $table->foreign('user_id_pengarang')->references('id')->on('users');
            $table->foreign('user_id_pembuat_entri')->references('id')->on('users');

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
        Schema::dropIfExists('entris');
    }
}
