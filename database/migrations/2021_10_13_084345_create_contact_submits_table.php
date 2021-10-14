<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_submits', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('name');
            $table->string('status')->default('Новий контакт');
            $table->text('comment')->default('Передзвоніть мені');
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
        Schema::dropIfExists('contact_submits');
    }
}
