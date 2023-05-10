<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price_buy',10,2)->nullable();
            $table->float('price_sell',10,2)->nullable();
            $table->date('start_date')->format('Y.m.d')->nullable();
            $table->date('end_date')->format('Y.m.d')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_company_id_foreign');
            $table->dropColumn('company_id');
        });
        Schema::dropIfExists('projects');
    }
};
