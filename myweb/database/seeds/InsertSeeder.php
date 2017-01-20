<?php

use Illuminate\Database\Seeder;

class InsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data=[];
        for($i=0;$i<100;$i++){
        	$arr['uid']=$i+1;
        	$arr['name']=str_random(5);
        	$arr['addtime']=1484833135;
        	$arr['phone']=13699887744;
        	$arr['email']='943043722@qq.com';
        	$arr['total']=rand(900,2000);
        	$arr['status']=0;
        	$arr['code']=str_random(10);
        	$data[]=$arr;
        }
        \DB::table('orders')->insert($data); 
    }
}
