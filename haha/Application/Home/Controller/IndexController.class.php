<?php
namespace Home\Controller;
use Think\Controller;
use Think\Db;
vendor("Redis.MyRedis");

class IndexController extends Controller {

	private $redis=null;

	public function __construct(){
         $this->redis=\Redis\MyRedis::getInstance();
	}

	public function updateage(){
        $age=mt_rand(1,99);
        
        $id=M("users")->order("id")->where("age=0")->getField("id");
		if(!$id){exit('stop');}

		M("users")->startTrans();//开启事务
        $age=M("users")->lock(true)->where("id=$id")->getField('age');
        if($age==0){
			$flag=M("users")->where(["id"=>$id])->save(["age"=>$age]);
		
        if($flag){
          M("users")->commit();
		}else{
          M("users")->rollback();
		}
		}else{
           M("users")->rollback();
		}
        $this->success("haha:{$id}","/home/index/updateage");
	}

    public function index(){
        //循环插入数据
		/*$pages=5*10000;
		$page=I("get.page");
		$page=empty($page)?1:$page;
		if($page>$pages){exit('stop');}
		for($i=1;$i<=2;$i++){*/
		    $age=mt_rand(1,99);
            M("users")->add(["username"=>"燕尾服","email"=>"quan-147123@163.com","tel"=>'13878347947','pro'=>"///////////////////////////////
tp5.1 路由执行流程图
this->routeInit();  //路由初始化，注册路由
this->route->import(rules);//导入 route 配置里面的路由
this->rule(key, val, type);//添加路由
this->group->addRule(rule, route, method, option, pattern); //group 为domain实例，其实是RuleGroup
new RuleItem(this->router, this, name, rule, route, method, option, pattern);//创建路由规则实例会设置
this->rules[method][] = rule;//规则数组
//进行路由检测
dispatch = this->routeCheck()->init();
// 获取应用调度信息
path = this->request->path();//news-8
dispatch = this->route->check(path, must);//路由检测，返回一个dispatch对象
result = domain->check(this->request, url, completeMatch);
RuleGroup  里面的 check 检测
//循环检测 rules 里面的规则，判断与当前 news-8 是否匹配
item->check
RuleItem -> checkRule
RuleItem -> match  //匹配变量  [catId]=>8
Rule 里面的   parseRule
Rule  ->  dispatch //发起调度
Rule ->  dispatchModule  //路由到控制器
Rule  ->  ModuleDispatch  //路由到模块/控制器
// 新建Module 实例
实例化父对象  Dispatch
Dispatch -> init 
this->request->setRouteVars(this->rule->getVars()); //将变量交给 request 对象
Module ->init  //设置对应的模块，控制器，方法给 request对象
//由中间件触发执行  控制器/方法
        this->middleware->add(function (Request request, next) use (dispatch, data) {
            return is_null(data) ? dispatch->run() : data;
        });
// add   将 匿名函数加入队列
response = this->middleware->dispatch(this->request);
//开始执行,dispatch 触发   module对象里面的 run方法、exec方法
this->request->param();  //获取 [catId]=>8 变量
Container 内的   invokeReflectMethod 方法实例化 对应的控制器类
Dispatch 内的  autoResponse 将数据转化为  Response
//执行 Response 的  send 将数据呈现在屏幕上
//如果是  ?a=1&b=2  这种形式的链接，则用_GET进行获取
//如果是  /a/1/b/2  这种形式的链接，Url 内的  parseUrl 解析额外参数所得

","age"=>$age]);
		//}
        //$page++;
		//$this->success("haha","/home/index/index/page/$page");
    }
}