<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsOnAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('service_id')->nullable()->constrained('services')->onUpdate('cascade')->onDelete('restrict');
            $table->string('address')->nullable();
            $table->date('preferred_date')->nullable();
            $table->string('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['service_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('service_id');
            $table->dropColumn('address');
            $table->dropColumn('preferred_date');
            $table->dropColumn('time');
        });
    }
}
