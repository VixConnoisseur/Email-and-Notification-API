<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable'); // This already creates the index
            $table->json('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->string('status')->default('pending');
            $table->string('channel');
            $table->string('provider')->nullable();
            $table->text('response')->nullable();
            $table->timestamps();

            // Remove this line as it's a duplicate of what morphs() already does
            // $table->index(['notifiable_type', 'notifiable_id']);

            $table->index('status');
            $table->index('channel');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
