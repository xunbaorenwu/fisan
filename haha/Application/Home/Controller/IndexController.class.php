<?php
namespace Home\Controller;
use Think\Controller;
use Think\Db;

class IndexController extends Controller {
    public function index(){
		phpinfo();exit;
        //循环插入数据
		$pages=5*10000;
		$page=I("get.page");
		$page=empty($page)?1:$page;
		if($page>$pages){exit('stop');}
		for($i=1;$i<=1000;$i++){
            M("users")->add(["username"=>"燕尾服","email"=>"quan-147123@163.com","tel"=>'13878347947','pro'=>"======================================
setRule 设置路由规则

如： rules[type][rule]=['rule' => rule, 'route' => route, 'var' => vars, 'option' => option, 'pattern' => pattern];

rules[method][rule]=true;
======================================
check   检测URL路由



======================================
checkRoute  检测路由规则

[plugin/[:_plugin]/[:_controller]/[:_action]],[meishi/:id],[meishi]  对应各个数组 （['rule' => rule, 'route' => route, 'var' => vars, 'option' => option, 'pattern' => pattern]）

调用 checkRule

======================================
checkRule   检测路由规则

调用 self::match


======================================
match 检测URL和规则路由是否匹配

        m2 = explode('/', rule);//meishi/:id
        m1 = explode('|', url);//portal|Article|index|id|1

主要检测 meishi/:id  => var[id]=1
======================================
parseRule  解析规则路由  rule, route, url, option, match

调用 parseUrlParams
======================================
parseUrlParams  解析额外参数

routeInfo : rule, route, url, option, match

===============================================
parseUrlPath    解析URL的pathinfo参数和变量

info=parse_url(url);path=explode('/',info['path']);var=parse_str(info['query'],var);

返回 result=['type'=>'method','method'=>method,'var'=>var];
=================================================
parseUrl   解析模块的URL地址（模块/控制器/操作？）参数1=值&参数2=值2

route = [module, controller, action]



==============================================
数据库对象：
model->where 触发 __call 调用 buildQuery 

再次调用 Db.php connect函数，读取 config.php database 配置信息

调用 mysql.php Connection.php，生成 mysql 对象

调用config['query']=>'\\think\\db\\Query'

where 方法就在 Query.php 内

=================================================
1。从当前模型 如：PortalCategoryModel.php 获取到 PortalCategory 字符串，再从buildQuery 调用 query->name 设置当前数据表名 Portal_Category 

2。直接使用DB：：name(表名）



////////////////////////////加载配置文件////////////
加载点有：1 application 目录下的 config.php
2.根目录下config目录下的文件
3.模块目录下的config目录下的文件（同样通过app下的init（module）方法获取得到）

/////////////////////////////加载view 方式///////////////////////
1. 如果模块目录下配置了 template ，view路径将被指定为 此 template路径
2. 默认为模块目录下 view 目录路径






///////////////////////////////
tp5.1 路由执行流程图


this->routeInit();  //路由初始化，注册路由
this->route->import(rules);//导入 route 配置里面的路由
this->rule(key, val, type);//添加路由
this->group->addRule(rule, route, method, option, pattern); //group 为domain实例，其实是RuleGroup
new RuleItem(this->router, this, name, rule, route, method, option, pattern);//创建路由规则实例

会设置
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

"]);
		}
        //$page++;
		//$this->success("haha","/home/index/index/page/$page");
    }
}