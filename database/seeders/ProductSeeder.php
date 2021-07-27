<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Sony TV',
                'price' => '500',
                'description' => 'A tv with much more features',
                'category' => 'tv',
                'gallery' => 'https://http2.mlstatic.com/D_NQ_NP_762544-MLA32324276186_092019-O.jpg'
            ],
        ]);
    }
}
