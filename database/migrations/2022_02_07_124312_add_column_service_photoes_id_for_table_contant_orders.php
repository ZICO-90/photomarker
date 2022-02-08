<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnServicePhotoesIdForTableContantOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_orders', function (Blueprint $table) {
            $table->foreignId('type_service_photos_id')->nullable()->constrained('type_service_photos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_orders', function (Blueprint $table) {
            $table->dropForeign(['type_service_photos_id']);
            $table->dropColumn('type_service_photos_id');
        });
    }
}
