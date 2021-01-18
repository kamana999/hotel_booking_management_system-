<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image', 100)->nullable();
            $table->integer('cost_per_day');
            $table->integer('discount_percentage')->default(0);
            $table->integer('max_adult')->nullable()->default(0);
            $table->integer('max_child')->nullable()->default(0);
            $table->boolean('room_service')->default(true);
            $table->boolean('status')->default(true);
            $table->integer('no_of_bed')->nullable();
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
        Schema::dropIfExists('room_categories');
    }
}
