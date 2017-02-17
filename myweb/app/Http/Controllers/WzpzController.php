<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WzpzController extends Controller
{
    public function getAdd(){
    	return view('wzpz.add');
    }

    public function postAdd1(Request $request){
    	// dd($_FILES)
    	$data=$request->except(['_token','ico','pic']);

    	if($request->hasFile('ico')){
    		$path = \Config::get('app.wzpzt_dir');
    		$iconame=md5(time()+rand(0,999));
    		$suffix=$request->file('ico')->getClientOriginalExtension();
    		$request->file('ico')->move($path,$iconame.'.'.$suffix);
    		$data['ico']=trim($path.$iconame.'.'.$suffix,'.');
    	}

    	if($request->hasFile('pic')){
    		$path1 = \Config::get('app.wzpzt_dir');
    		$iconame1=md5(time()+rand(0,999));
    		$suffix1=$request->file('pic')->getClientOriginalExtension();
    		$request->file('pic')->move($path1,$iconame1.'.'.$suffix1);
    		$data['pic']=trim($path1.$iconame1.'.'.$suffix1,'.');
    	}
    	$res=DB::table('wzpz')->insert($data);
    	// dd($data);
    	if($res){
    		return redirect('/wzpz/index')->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');
    	}

	}

	public function getIndex(){
		return view('wzpz.index');
	}

	public function getShow(Request $request){
        $key = $request->input('key');
    	$num = $request->input('num');   //每页 显示的最大条数
    	$page = ($request->input('page')-1)*$num; //显示的起始位置
    	$data = DB::table('wzpz')->skip($page)->take($num)->where('phone','like','%'.$key.'%')->get();
        $count=count($data);
        $maxpage= ceil($count/$num);
        $data[count($data)]=$maxpage;

        // dd($data);
    	echo json_encode($data);
	}

	public function getEdit($id){
		$data=DB::table('wzpz')->where('id',$id)->first();
		return view('wzpz.edit',['list'=>$data]);
	}

	public function postUpdate(Request $request){
		$id=$request->input('id');
    	$data=$request->except(['_token','ico','pic','id']);
    	$arr=DB::table('wzpz')->where('id',$id)->first();
    	$ico='.'.$arr['ico'];
    	$pic='.'.$arr['pic'];
    	
    	if($request->hasFile('ico')){
    		if(file_exists($ico)){
    			unlink($ico);
    		}
    		$path = \Config::get('app.wzpzt_dir');
    		$iconame=md5(time()+rand(0,999));
    		$suffix=$request->file('ico')->getClientOriginalExtension();
    		$request->file('ico')->move($path,$iconame.'.'.$suffix);
    		$data['ico']=trim($path.$iconame.'.'.$suffix,'.');
    	}

    	if($request->hasFile('pic')){
    		if(file_exists($pic)){
    			unlink($pic);
    		}
    		$path1 = \Config::get('app.wzpzt_dir');
    		$iconame1=md5(time()+rand(0,999));
    		$suffix1=$request->file('pic')->getClientOriginalExtension();
    		$request->file('pic')->move($path1,$iconame1.'.'.$suffix1);
    		$data['pic']=trim($path1.$iconame1.'.'.$suffix1,'.');
    	}
    	$res=DB::table('wzpz')->where('id',$id)->update($data);
    	// dd($data);
    	if($res){
    		return redirect('/wzpz/index')->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');
    	}		
	}

	public function getDelete($id){
		$data=DB::table('wzpz')->where('id',$id)->first();
    	$ico='.'.$data['ico'];
    	$pic='.'.$data['pic'];	
    	$res=DB::table('wzpz')->where('id',$id)->delete();
    	if($res){
    		if(file_exists($ico)){
    			unlink($ico);	
    		}
    		if(file_exists($pic)){
    			unlink($pic);	
    		}
    		return redirect('/wzpz/index')->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');
    	}	
	}

	public function getXz(Request $request){
		$id=$request->input('id');
		// $data=DB::table('wzpz')->where('id',$id)->first();
		if(DB::table('wzpz')->update(['auto'=>0])){
			if(DB::table('wzpz')->where('id',$id)->update(['auto'=>1])){
				echo 'yes';
				return ;
			}else{
				echo 'no';
				return ;
			}
		}else{
			echo 'no';
			return ;
		}
	}
	public static function config(){
		return DB::table('wzpz')->where('auto','1')->first();
	}
	
	public function getQd(Request $request){
		$sta=$request->input('status');
		$res=DB::table('wzpz')->update(['status'=>$sta]);
		if($res){
			echo 'yes';
		}else{
			echo 'no';
		}
	}
}