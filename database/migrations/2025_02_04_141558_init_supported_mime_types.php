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
        DB::table('book_types')->insert([
            [
                'name' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PDF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EPUB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MOBI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AZW3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DOCX',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'TXT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HTML',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RTF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FB2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CBZ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CBR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MP3',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('book_types')->whereIn('name', [
            'online',
            'PDF',
            'EPUB',
            'MOBI',
            'AZW3',
            'DOCX',
            'TXT',
            'HTML',
            'RTF',
            'FB2',
            'CBZ',
            'CBR',
            'MP3',
        ])->delete();
    }
};
