<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_block_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('label');
            $table->string('input_id');
            $table->enum('type',['text','number','file','image','password','radio','checkbox','date','datetime-local','time','url','textarea','dropdown']);
            $table->string('placeholder')->nullable();
            $table->string('default')->nullable();
            $table->boolean('mandatory');
            $table->integer('sequence');
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
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
        Schema::dropIfExists('content_inputs');
    }
}
