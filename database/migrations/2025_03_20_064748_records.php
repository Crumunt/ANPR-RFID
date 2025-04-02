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
        //
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->string('status_id');
            $table->date('logged_in')->nullable();
            $table->date('logged_out')->nullable();
            $table->string('color');
            $table->boolean('has_gate_pass');
            $table->integer('no_gate_pass_count')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('records');
    }
};
