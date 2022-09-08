<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjanjians', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->text('uraian');
            $table->string('no_pks');
            $table->date('mulai');
            $table->date('berakhir');
            $table->string('wilayah');
            $table->text('kegiatan');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('perjanjians');
    }
};
