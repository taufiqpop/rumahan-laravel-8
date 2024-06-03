<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->truncate();

        DB::table('blogs')->insert([
            'title' => 'Ini Berita Satu',
            'body' => 'lorem100',
            'created_at' => Carbon::now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Ini Berita Dua',
            'body' => 'lorem500',
            'created_at' => Carbon::now(),
        ]);
    }
}
