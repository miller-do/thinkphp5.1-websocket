<?php
namespace app\index\controller;
use think\Controller;
// use app\index\model\Server as ServerModel;
Class Serve extends Base{
	public function index(){
		//方式1：在创建了与数据库表名对应的模型后即可调用模型的方法进行CURD
		// $list=ServerModel::paginate(3);
		// $this->assign('list',$list);
		/* echo '<pre>';
		print_r($list); */
		
		//方式2:
		$list= \think\Db::name('article')->alias('a')->paginate(5);
		// var_dump($lis);
		// die;
		$this->assign('list',$list);
		return $this->fetch();
	}
	public function detail(){
		$arid=input('serid');
		$service=db('server')->find($arid);
		
		$artLis= \think\Db::name('news_article')->alias('a')->paginate(5);
		$this->assign('server',$service);
		$this->assign('artLis',$artLis);
		return $this->fetch();
	}
}
?>