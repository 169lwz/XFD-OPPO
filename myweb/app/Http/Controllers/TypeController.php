<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
  
    //添加分类
    public function getAdd($id=''){
    	$data =self::getData();//获取分类表中的数据,分配到模板
    	return view('type.add',['list'=>$data,'id'=>$id]);// 将获取到的id分配到add模板中
    }


    //获取格式化类别数据 (自定义静态方法,可以多处调用)
    public static function getData(){
    	//select *,concat(path,id) as paths from type order by paths;
    	$data = DB::table('type')
	    	->select('*',DB::raw('concat(path,id) as paths'))// DB::raw();
	    	->orderBy('paths')->get();
	    	
	    // 修改表中的名称字段 (database.php中的 'fetch' => PDO::FETCH_CLASS,要改成 'fetch' => PDO::FETCH_ASSOC,)
	    foreach($data as $k=>$v){
	    	//分配类的级别 explode(',',$v['path']);//拆分表中的path	    	
	    	$num = count(explode(',',$v['path']))-2;// 此时的$num就代表每个分类的级别
	    	$data[$k]['tname']=str_repeat('★',$num).$v['tname'];// 按级别重复符号并且与tname连接
	    }
    	return $data;
    }


    //执行数据的插入
    public function postInsert(Request $request){
    	//区分添加的类别是否为顶级类
    	$this->validate($request,[
    		'name'=>'required'
    	],[
    		'name.required'=>'类名不能为空!'
    	]);

    	if($request->input('id')==0){
    		//添加顶级类
    		$data['tname']=$request->input('name');
    		$data['pid']=0;
    		$data['path']='0,';
    	}else{
    		//添加非顶级类
    		$data['tname']=$request->input('name');//类名
    		$data['pid']=$request->input('id');// $request中传递的id就是添加类的pid
    		$path= DB::table('type')->where('id',$request->input('id'))->first()['path'];
    		$data['path']=$path.$request->input('id').',';// 子类path 等于 父类的path连接父类的id
    	}

    	//执行添加动作
    	$res = DB::table('type')->insert($data);
    	if($res){
    		return redirect('/admin/type/index')->with('success','添加成功');
    	}else{
    		return back()->with('errors','添加失败');
    	}
    }



    //浏览分类
	public function getIndex(){
		// 获取所有分类的数据,并分配到index模板中
		return view('type.tindex',['list'=>self::getData()]);
	}

	//自定义静态方法 (显示每一个分类的父类名称,替换掉显示的pid)
	public static function funame($pid){
		$funame = DB::table('type')->where('id',$pid)->first()['tname'];
		echo empty($funame)?'顶级分类':$funame;
	}


	// 删除分类
	public function getDel($id){
		// 如果该分类下面有子类, name该分类不能删除
		$res = DB::table('type')->where('pid',$id)->get();
		if(count($res)>0){
			//包含子类
			return back()->with('error','该类中包含子类,不能删除');
		}else{
			//不包含子类
			$res = DB::table('type')->where('id',$id)->delete();
			if($res){
				return redirect('/admin/type/index')->with('success','删除成功');
			}else{
				return back()->with('error','删除失败');
			}
		}
	}


	//加载修改表单
	public function getEdit($id){
		// 根据子类的id获取父类的名称
		// select c1.*,c2.tname as funame from type as t1,type as t2 where c1.pid=c2.id and c1.id=$id;

		$funame = DB::table('type as t1')
					->join('type as t2','t1.pid','=','t2.id')
					->select('t2.tname as funame')
					->where('t1.id',$id)
					->first()['funame'];
		$funame = empty($funame)?'顶级分类':$funame;// 让顶级分类在pid栏中显示

		return view('type.edit',[
			'vo' => DB::table('type')->where('id',$id)->first(),
			'funame' => $funame
		]);
	}

	// 执行修改操作
	public function postUpdate(Request $request){
		$res = DB::table('type')->where('id',$request->input('id'))
								->update($request->only('tname'));
		if($res){
			return redirect('/admin/type/index')-> with('success','修改成功');
		}else{
			return back()->with('error','修改失败');
		}
	}


	// 拼装一个类别的数组
	public function getTypearr(){
		$types = self::getAlltypes();
		$types = self::getTypesInfo($types,0);		
	}

	//获取分类中的所有数据
	public static function getAlltypes(){
		return DB::table('type')->get();
	}

	// 嵌套数组样式模式
	public static function getTypesInfo($types,$pid){
		$data=[];
		foreach($types as $k=>$v){
			if($v['pid']==$pid){
				$v['sub']=self::getTypesInfo($types,$v['id']);// 递归
				$data[]=$v;
			}
		}
		return $data;
	}	
}


