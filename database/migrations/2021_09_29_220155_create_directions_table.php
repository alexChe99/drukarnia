<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->bigInteger('author');
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
        Schema::dropIfExists('directions');
       
    }
}

class AddHeroColumnForDirectionTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
      */
  public function up()
  {
    Schema::table('directions', function (Blueprint $table) {
       $table->string('hero')->nullable();
      });
      
   }
   /**
    
     * Reverse the migrations.
     *
     * @return void
     */
  public function down()
   {
   Schema::table('directions', function (Blueprint $table) {
       $table->dropColumn('hero');
     });
    } 
}