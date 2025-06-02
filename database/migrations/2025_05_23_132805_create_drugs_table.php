<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
    {
        if (!Schema::hasTable('drugs')) {
            Schema::create('drugs', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('name');
                $table->integer('count');
                $table->string('disease');
                $table->decimal('price', 8, 2);
                $table->unsignedBigInteger('pharmacy_id');
                $table->foreign('pharmacy_id')->references('pharmacy_id')->on('pharmacies')->onDelete('cascade');
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('created_at')->nullable();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('drugs');
    }
};
