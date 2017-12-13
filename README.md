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