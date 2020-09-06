<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('spell_url');
            $table->string('full_name');
            $table->string('img');
            $table->integer('type_id');
            $table->string('color');
            $table->string('effect');
            $table->text('description');
            $table->text('quote');
            $table->text('history');
            $table->text('effect_full');
            $table->string('additional_title');
            $table->text('additional');
            $table->text('etymology');
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
        Schema::dropIfExists('spells');
    }
}
