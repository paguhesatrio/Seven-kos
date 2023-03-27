<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id');
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->text('alamat');//alamat
            $table->text('excerpt');
            $table->text('body');
            $table->text('price');
            $table->text('kamar');
            $table->text('no_hp');
            $table->text('maps');
            //========================================== spesifikasi tipe kamar
            $table->text('tipekamar');
            $table->text('listrik');
            $table->text('air');
            //========================================== Fasilitas kamar
            $table->text('kamarmandi');
            $table->text('ac');
            $table->text('kasur');
            $table->text('lemari');
            $table->text('meja');
            //========================================== Fasilitas Umum
            $table->text('wifi');
            $table->text('jemur');
            $table->text('tamu');
            $table->text('dapur');
            //========================================== Fasilitas Umum
            $table->text('akses');
            $table->text('maks');
            $table->text('teman');
            $table->text('hewan');
            //=========================================== pembayaran
            $table->text('bayar');
            $table->text('rekening');
            $table->string('province_id')->nullable();
            $table->string('regency_id')->nullable();
            $table->string('village_id')->nullable();
            $table->string('district_id')->nullable();
            $table->timestamp('published_at')->Nullable();
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
        Schema::dropIfExists('posts');
    }
};
