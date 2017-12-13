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

        1.指定一个script标签，并指定type="text/x-template",并指定一个id="myTemplate"...