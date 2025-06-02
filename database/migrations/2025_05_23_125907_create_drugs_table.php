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
        if (!Schema::hasTable('drugs')) {
            Schema::create('drugs', function (Blueprint $table) {
                $table->increments('drug_id'); // int, auto_increment, primary key
                $table->string('name', 45)->unique(); // varchar(45), unique, not null
                $table->integer('count'); // int, not null
                $table->string('disease', 45); // varchar(45), not null
                $table->integer('price'); // int, not null
                $table->integer('pharmacy_id'); // int, not null
            });
            }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
};
