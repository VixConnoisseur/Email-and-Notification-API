<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('notifications')) {
            Schema::table('notifications', function (Blueprint $table) {
                // Drop existing indexes if they exist
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                $indexes = $sm->listTableIndexes('notifications');

                if (array_key_exists('notifications_notifiable_type_notifiable_id_index', $indexes)) {
                    $table->dropIndex('notifications_notifiable_type_notifiable_id_index');
                }

                // Add new columns if they don't exist
                if (!Schema::hasColumn('notifications', 'status')) {
                    $table->string('status')->default('pending')->after('read_at');
                }

                if (!Schema::hasColumn('notifications', 'channel')) {
                    $table->string('channel')->after('status');
                }

                if (!Schema::hasColumn('notifications', 'provider')) {
                    $table->string('provider')->nullable()->after('channel');
                }

                if (!Schema::hasColumn('notifications', 'response')) {
                    $table->text('response')->nullable()->after('provider');
                }

                if (!Schema::hasColumn('notifications', 'sent_at')) {
                    $table->timestamp('sent_at')->nullable()->after('response');
                }

                // Add new indexes
                $table->index(['notifiable_type', 'notifiable_id']);
                $table->index('status');
                $table->index('channel');
            });
        }
    }

    public function down()
    {
        // This is a one-way migration to fix the table
    }
};
