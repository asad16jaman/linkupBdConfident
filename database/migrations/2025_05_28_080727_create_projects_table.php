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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug')->nullable();
            $table->text('status');
            $table->text('type');
            $table->string('location');
            $table->text('map');
            $table->text('video');
            $table->text('address');
            $table->string('land_area');
            $table->string('no_of_floor');
            $table->string('appartments');
            $table->string('no_of_parking');
            $table->text('flat_details');
            $table->string('collection');
            $table->string('handover');
            $table->string('main_image')->default('no.png');
            $table->string('details_image')->default('no.png');
            $table->string('feature_image')->default('no.png');
            $table->string('book_image')->default('no.png');

            $table->ipAddress()->nullable();
            $table->unsignedBigInteger('add_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
