# vueJs
## 1.安装node.js ##
	(http://www.runoob.com/nodejs/nodejs-install-setup.html)

## 2.基于node.js,利用淘宝npm镜像安装相关依赖 ##

 在cmd里直接输入：npm install -g cnpm --registry=https://registry.npm.taobao.org，回车，等待安装...

## 3.安装全局vue-cli脚手架,用于帮助搭建所需的模板框架 ##

在cmd里 1)输入：cnpm install -g vue-cli，回车，等待安装...

            2).输入：vue，回车，若出现vue信息说明表示成功
  
## 4.创建项目 ##

在cmd里输入：vue init webpack vue_test(项目文件夹名)，回车，等待一小会儿，

## 5.安装依赖 ##

在cmd里  1).输入：cd vue_test（项目名），回车，进入到具体项目文件夹

             2).输入：cnpm install，回车，等待一小会儿

回到项目文件夹，会发现项目结构里，多了一个node_modules文件夹（该文件里的内容就是之前安装的依赖）

## 6.测试环境是否搭建成功 ##

方法1：在cmd里输入：cnpm run dev

方法2：在浏览里输入：localhost:8080(默认端口为8080)

## 7.语法 ##
### 1.双花括号 ###
	<any>{{expression}}</any>
	执行表达式，将结果输出到当前标签内
### 2.选择功能 ###
	v-if="expression"
	v-else-if=""
	v-else
### 3.循环功能 ###
	any v-for="tmp in list"
	any v-for="(val,index) in list"
### 4.v-on:click 或 @click ###
>事件修饰符

	.stop - 调用 event.stopPropagation()。
	.prevent - 调用 event.preventDefault()。

### 5.属性绑定 ###
>v-bind:src或:src

	示例：
	<h1 v-bind:class="{red:!isUserLogin}">{{msg}}</h1>
    <p v-bind:style="{background:myColor}">lsdjflsajf;lj</p>
### 6.其他指令 ###
>v-show

	注意：没有v-hide
>v-html="拼接好的代码片段"

	model:模型，模特
	module:模块
>v-model

	双向数据绑定:input/select/textarea
	1.修饰符
		.lazy：v-model.lazy='userName',用户输入完点回车后执行
		.trim:去除开头和结尾的空格
		.number:把字符串转化为数字

## 8.自定义指令 ##

### 1.内置指令 ###
	
	v-if/v-else-if/v-else
    v-for
    v-on/v-bind/v-model
    v-show
    v-html

### 2.自定义指令 ###
	
	内置指令在很多时候，比较偏向于一些工具性的指令，比较通用，但如果需要和具体的业务相关，有可能就无法满足需求，就得学会自定义指令
	
### 3.用法 ###

#### 1.创建 ####

	new Vue({
        directives:{
             change:{
                  bind:function (el) {},
                  update:function (el,bindings) {console.log(bindings.value);},
                  unbind:function () {
                      console.log("in unbind");
                  }
              }
         }
    });

#### 2.使用 ####

	<div id="example">
        <h2 v-change>hello custom directive</h2>
    </div>

### 4.自定义指令的进阶知识 ###
>1.自定义指令的方法
>
		bind:首次绑定
        update:当通过指令传递过来的参数有变化时候
        unbind:解除绑定

>2.方法有参数

        el:调用指令的元素
        bindings:是一个对象，rawName/value/oldValue
        规范：创建时驼峰，使用时烤串

## 9.过滤器 ##

>过滤器：实现数据的筛选、过滤、格式化  
在vuejs的1.*有内置过滤器，但是2.0之后，只保留了一个自定义接口

### 1.用法 ###

>1.创建

    new Vue({
       filters:{
           currency:function (value,arg1,arg2) {
              //过滤器的本质就是一个有参数，有返回值的方法
               return "￥"+value;
            }
        }
    });

>2.使用

    <h1>{{nowPrice | currency(arg1,arg2)}}</h1>

>3.过滤器中如何实现参数的传递和接收

>扩展：

     1.过滤器支持多重过滤
        <h1>{{nowPrice | currency(arg1,arg2) | myFilter(arg1,arg2)}}</h1>
     2.一个优秀的开源项目
          https://github.com/wy-ei/vue-filter

## 10.组件 ##

### 1.如果项目中需要反复用到的部分 ###

    组件：可被反复使用，带有特定功能的视图
        分类：全局组件，局部组件

### 2.创建和使用 ###

>1.创建

     1.全局组件
       Vue.component('myComponent',{
             template:"<h1>hello world</h1>"
       });

     2.局部组件

        new Vue({
           components:{
                "my-component":{
                    template:"<h1></h1>"
                 }
            }
        });

>2.使用

     <my-component></my-component>

>3.注意事项

     1.组件不能直接返回多个元素，要在一个根元素下
     2.组件可以嵌套,在父组件的template中

>4.扩展

        Vue.directive("changeBgColor",{
            bind:function (el,bindings) {
               el.style.backgroundColor = bindings.value;
            }
        });
        Vue.filter("myCurrency",function (value) {
            return "$"+value;
        });

>创建组件的其他方式：

        1.指定一个script标签，并指定type="text/x-template",并指定一个id="myTemplate". Vue.component("my-component",{template:"#myTemplate"});

## 11.Vue中常用属性 ##

### 1、计算属性  ###

>①创建一个计算属性

	new Vue({
		computed:{
			getNowCount:function(){
				return **
			}
		}
	})

>②调用计算属性

	<any>{{getNowCount}}</any>

>③计算属性与普通的方法的区别

	计算属性是有依赖缓存的，如果依赖的数据没有发生变化,即使调用了计算属性，也不会执行方法
	而普通的方法就不同了，只要是调用，肯定会执行

### 2、监听属性 ###

如果希望在用户进行表单操作时候，可以设置一个监听属性
>①在表单元素中指定v-model

	<input type='text' v-model="myValue"/>

>②在input所属的组件中 指定一个watch属性

	Vue.component('',{
		watch:{
			myValue:function(){
				//当数据中的myValue发生变化时，将会自动的执行该方法
			}
		}
	})

## 12.Vue中组件间通信 ##

### 1、props down:通过属性传值 ###

>①配置子组件的props

	Vue.component('son',{
		props:['userName']
	})

>②父组件中调用子组件的时候，通过属性把值传递过去

	Vue.component('father',{
		data:function(){
			return {
				uName:'zhangsan'
			}
		}
		template:'<son :userName='uName'></son>'
	})


## 13.VueRouter ##
1.路由模块用来简建立器url地址和模板页面的映射关系  
2.SPA：有容器，有组件，配置路由词典  
3.步骤：
	
		1.引入对应的js文件
            script src=js/vue-router.js
        2.指定容器
            <router-view></router-view>
        3.创建各个业务要用到的组件
        4.配置路由词典
            new Vue({
                router:new VueRouter({
                    routes:const myRoutes = [
                         {
                              path:'/myLogin',
                              component:LoginComponent
                         },
                         {
                              path:'/myRegister',
                              component:RegisterComponent
                         }
                    ];
                }),
            });
		5.测试路由地址是否能够正确访问
            修改地址栏中的路由地址，测试是否能够按照配置正确的加载对应的组件

4.vuerouter实现路由导航的常见方式  
	
		1.直接修改地址栏
        2.通过js

## 14.Vue中如何来实现一个SPA应用程序 ##

### 1.SPA ###

>1.概念

	在整个应用程序有一个完整的页面
	这个完整的页面可以根据地址栏中url的不同
	加载代码片段进来，从而显示给用户

>2.工作原理

	①解析地址栏中的页面地址和路由地址
	②加载基础页面地址
	③根据路由地址，从路由词典中找要加载的模板页面地址
	④发起ajax请求，将加载来的模板页面 插入到 指定的容器中

## 15.导航 ##

### 1.直接修改地址栏 ###
	
### 2.js ###
	
	this.$router.push("路由地址");
	this.$router.go(-1);

### 4.自定义标签 ###

	router-link to="路由地址"

## 16.传参 ##

### ①明确发送和接收方 ###

### ②配置接收方的路由地址 ###

	{path:"/detail/:pid",component:DetailComponent}

### ③接收参数 ###

	this.$route.params.pid

### ⑤发送参数 ###

	this.$router.push("路由地址/"+this.pid);
	router-link :to="pid"

## 16.嵌套 ##

### ①在准备嵌套其他页面的页面中，指定一个router-view ###

### ②children ###

	{path:"/mail",component:MailComponent,
		children:[
			{path:"/",component:InboxComponent}
			{path:"/inbox",component:InboxComponent}
		]
	}

## 17.vue中处理与远程服务器端的方式 ##

>提示：获取假的json数据 http://jsonplaceholder.typicode.com/users

### 步骤： ###

#### ①引入对应的vue-resourse.js ####

#### ②直接发起网络请求 ####

	this.$http
        .get(url)
        .then(function(response){
            //response.data
        });