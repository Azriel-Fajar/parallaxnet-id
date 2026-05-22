<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        // Delete all stored video files before dropping columns
        $rows = DB::table('home_videos')->get(['filename', 'filename_webm', 'poster']);
        foreach ($rows as $row) {
            foreach (['filename', 'filename_webm', 'poster'] as $col) {
                if (!empty($row->$col)) {
                    Storage::disk('public')->delete($row->$col);
                }
            }
        }

        DB::table('home_videos')->truncate();

        Schema::table('home_videos', function (Blueprint $table) {
            $table->dropColumn(['filename', 'filename_webm', 'poster']);
        });

        Schema::table('home_videos', function (Blueprint $table) {
            $table->string('video_url');
            $table->enum('embed_type', ['youtube', 'drive']);
        });
    }

    public function down(): void
    {
        Schema::table('home_videos', function (Blueprint $table) {
            $table->dropColumn(['video_url', 'embed_type']);
        });

        Schema::table('home_videos', function (Blueprint $table) {
            $table->string('filename')->default('');
            $table->string('filename_webm')->nullable();
            $table->string('poster')->nullable();
        });
    }
};
