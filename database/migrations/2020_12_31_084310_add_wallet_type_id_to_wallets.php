<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWalletTypeIdToWallets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallets', function (Blueprint $table) {
            $table->unsignedBigInteger('wallet_type_id');
            $table->foreign('wallet_type_id')
                  ->references('id')
                  ->on('wallet_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallets', function (Blueprint $table) {
            $table->dropForeign('wallets_wallet_type_id_foreign');
            $table->dropColumn('wallet_type_id');
        });
    }
}
