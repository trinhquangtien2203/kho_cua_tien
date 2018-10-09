<?php

use Illuminate\Database\Seeder;

class CategoryesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
            [
                'cate_name'=>'iphone',
                'cate_slug'=>str_slug('iphone')
            ],
            [
                'cate_name'=>'samsung',
                'cate_slug'=>str_slug('samsung')
            ],
            [
                'cate_name'=>'nokia',
                'cate_slug'=>str_slug('nokia')
            ],
        ];
        DB::table('vp_categoryes')->insert($data);
    }
}
