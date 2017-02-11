<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        for($i=0;$i<=6;$i++){
        	$arr['username']='admin';
        	$arr['num']=rand(3,6);
        	$arr['goods']='gougoufdsa';
        	$arr['typename']='动物';
        	$arr['sf']=rand(3,7).'.jpg';
        	$arr['price']=rand(100,500);
        	$arr['company']='乔伊啊从小';
        	$arr['status']=1;
        	$data[]=$arr;
        }
        \DB::table('shop')->insert($data);
    }
}
