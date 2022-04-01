<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedBacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//имя, номер телефона, компания, название заявки, сообщение, поле для прикрепления файла
        Schema::create('feed_backs', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('user_id')->unsigned();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('phone');
            $table->string('company');
            $table->string('feedback_title');
            $table->text('feedback_text');
            $table->string('file_name')->nullable();
            $table->binary('file_content')->nullable();
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
        Schema::dropIfExists('feed_backs');
    }
}
