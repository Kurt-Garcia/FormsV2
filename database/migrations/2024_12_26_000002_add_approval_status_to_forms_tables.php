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
        // Add approval status and admin fields to all form tables
        Schema::table('attendances', function (Blueprint $table) {
            $table->enum('status_approval', ['pending', 'approved', 'declined'])->default('pending')->after('status');
            $table->text('admin_remarks')->nullable()->after('status_approval');
            $table->unsignedBigInteger('approved_by')->nullable()->after('admin_remarks');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            
            $table->foreign('approved_by')->references('id')->on('users');
        });

        Schema::table('itineraries', function (Blueprint $table) {
            $table->enum('status_approval', ['pending', 'approved', 'declined'])->default('pending')->after('purpose');
            $table->text('admin_remarks')->nullable()->after('status_approval');
            $table->unsignedBigInteger('approved_by')->nullable()->after('admin_remarks');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            
            $table->foreign('approved_by')->references('id')->on('users');
        });

        Schema::table('reimbursements', function (Blueprint $table) {
            $table->enum('status_approval', ['pending', 'approved', 'declined'])->default('pending')->after('description');
            $table->text('admin_remarks')->nullable()->after('status_approval');
            $table->unsignedBigInteger('approved_by')->nullable()->after('admin_remarks');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            
            $table->foreign('approved_by')->references('id')->on('users');
        });

        Schema::table('gate_passes', function (Blueprint $table) {
            $table->enum('status_approval', ['pending', 'approved', 'declined'])->default('pending')->after('reason');
            $table->text('admin_remarks')->nullable()->after('status_approval');
            $table->unsignedBigInteger('approved_by')->nullable()->after('admin_remarks');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            
            $table->foreign('approved_by')->references('id')->on('users');
        });

        Schema::table('excuses', function (Blueprint $table) {
            $table->enum('status_approval', ['pending', 'approved', 'declined'])->default('pending')->after('reason');
            $table->text('admin_remarks')->nullable()->after('status_approval');
            $table->unsignedBigInteger('approved_by')->nullable()->after('admin_remarks');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropColumn(['status_approval', 'admin_remarks', 'approved_by', 'approved_at']);
        });

        Schema::table('itineraries', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropColumn(['status_approval', 'admin_remarks', 'approved_by', 'approved_at']);
        });

        Schema::table('reimbursements', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropColumn(['status_approval', 'admin_remarks', 'approved_by', 'approved_at']);
        });

        Schema::table('gate_passes', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropColumn(['status_approval', 'admin_remarks', 'approved_by', 'approved_at']);
        });

        Schema::table('excuses', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropColumn(['status_approval', 'admin_remarks', 'approved_by', 'approved_at']);
        });
    }
};
