<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tracking_links', function (Blueprint $table) {
            $table->id();
            $table->string('base_url');
            $table->string('campaign');
            $table->string('source');
            $table->string('medium')->nullable();
            $table->string('content')->nullable();
            $table->string('term')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracking_links');
    }
};
