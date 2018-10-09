<?php

use Illuminate\Database\Seeder;

class dmLaptopTableSeeder extends Seeder
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
                'lap_name'=>'asus',
                'lap_slug'=>str_slug('asus')
            ],
            [
                'lap_name'=>'acer',
                'lap_slug'=>str_slug('acer')
            ],
        ];
        DB::table('vp_dmlaptop')->insert($data);
    }
}
