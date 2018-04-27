<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('license')) {
            Schema::create('license', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('state_id');
                $table->string('number',191)->unique();
                $table->string('name')->nullable();
                $table->date('subscription_date');
                $table->date('expiry_date');
                $table->integer('status')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license');
    }
}
