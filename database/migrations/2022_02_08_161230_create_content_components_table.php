<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_block_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('sequence');
            $table->text('json_data')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamp('published_from', $precision = 0)->nullable();
            $table->timestamp('published_to', $precision = 0)->nullable();
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
        Schema::dropIfExists('content_components');
    }
}
