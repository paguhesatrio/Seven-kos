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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_id');
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('province_id')->nullable();
            $table->string('regency_id')->nullable();
            $table->string('village_id')->nullable();
            $table->string('district_id')->nullable();
            $table->text('alamat');
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->text('maps');
            $table->text('no_hp');
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
            $table->text('rekening');
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
        Schema::dropIfExists('kosts');
    }
};
