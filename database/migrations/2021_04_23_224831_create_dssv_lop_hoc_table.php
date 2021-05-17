<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDssvLopHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dssv_lop_hoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masv')->constrained('users');
            $table->foreignId('malop')->constrained('lop_hoc');
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
        Schema::dropIfExists('dssv_lop_hoc');
    }
}
