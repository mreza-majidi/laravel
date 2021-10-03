<?php

use App\Constants\OneTimePasswordConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneTimeCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_time_codes', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('value');
            $table->dateTime('expires_at');
            $table->unsignedInteger('send_count')->default(1);
            $table->enum('type', OneTimePasswordConstants::$type);
            $table->dateTime('used_at')->nullable();


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('one_time_codes');
    }
}
