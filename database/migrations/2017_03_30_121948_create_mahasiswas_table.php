<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim')->unique();
            $table->string('name')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('kode', 10)->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('golput')->nullable()->default(false);
            $table->integer('calon_id')->nullable()->unsigned();
            $table->foreign('calon_id')->references('id')->on('calons')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
