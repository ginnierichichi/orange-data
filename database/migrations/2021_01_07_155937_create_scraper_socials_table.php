<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScraperSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scraper_socials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->text('company');
            $table->string('url');
            $table->string('social');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('data')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scraper_socials');
    }
}
