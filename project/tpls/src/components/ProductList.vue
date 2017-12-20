<template>
    <!-- page content -->
    <div>
      <div class="row">
        <div class="col-xs-12 x_title">
          <h3>笔记本商品列表</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-3">
          <form class="form-inline">
            <div class="form-group">
              <label for="page-size">每页显示记录数：</label>
              <select
               v-model="pageSize"
               class="form-control" id="page-size">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="60">60</option>
                <option value="80">80</option>
                <option value="100">100</option>
              </select>
            </div>
          </form>
        </div>
        <div class="col-xs-4 col-xs-offset-5">
          <div class="form-group has-feedback">
            <label for="product-kw" class="sr-only">搜索关键字：</label>
            <input class="form-control" type="text" id="product-kw" placeholder="请输入搜索关键字">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="table-laptop">
              <thead>
              <tr>
                <th>
                  <div class="checkbox" style="margin: 0;">
                    <label>
                      <input type="checkbox">全选
                    </label>
                  </div>
                </th>
                <th>编号</th>
                <th>图片</th>
                <th>型号</th>
                <th>主标题</th>
                <th>规格</th>
                <th>单价</th>
                <th>操作</th>
              </tr>
              </thead>
              <tbody>
              <tr v-if="dataList.length == 0">
                <td colspan="8">
                  <div class="loading">
                    <img src="../assets/img/loading.gif" alt="">
                  </div>

                </td>
              </tr>
              <tr v-for="(tmp,index) in dataList" :key="index">
                <td>
                  <div class="checkbox" style="margin: 0;">
                    <label>
                      <input type="checkbox">选择
                    </label>
                  </div>
                </td>
                <td>{{tmp.lid}}</td>
                <td>
                  <img class="pic" :src="require('../assets/'+tmp.pic)">
                  <!--<img :src="require('../assets/img/'+tmp.pic)" alt="" />-->
                  <!--<img src="../assets/img/product/sm/57b12a31N8f4f75a3.jpg" alt="">-->
                </td>
                <td>{{tmp.fname}}</td>
                <td>{{tmp.title}}</td>
                <td>{{tmp.spec}}</td>
                <td>{{tmp.price}}</td>
                <td>
                  <a href="#">详情</a>
                  <a href="#">修改</a>
                  <a href="#">删除</a>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <ul class="pagination pull-right" id="pagination">
                <li><a @click="modifyPage(true)">上一页</a></li>
                <li 
                 @click="choosePage(page)"
                 v-for="(page,index) in pageList" :key="index" :class="{active:(index+1==pno)}"><a>{{page}}</a></li>
                <!--<li><a href="#">2</a></li>
                <li class="active"><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>-->
                <li><a @click="modifyPage(false)">下一页</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
    <!-- /page content -->

</template>

<script>
export default {
  methods:{
    //当去点击上一页和下一页时要调用的方法
    modifyPage:function(isPrev){
      if(isPrev){
        if(this.pno <=1) return;
        this.pno--;
      }else{
        if(this.pno >=this.pageCount) return;
        this.pno++;
      }
      this.loadProductByPage(this.pno,this.pageSize);
    },
    loadProductByPage:function(pno,pageSize){
      this.$http
      .get("http://127.0.0.1:8080/step04/admin/data/product_list.php?pno="+pno+"&pageSize="+pageSize)
      .then(function(response){
         var result = response.data;
         this.dataList = result.data;
        //  console.log(result);
         this.pageCount = result.pageCount;
         this.pno = result.pno;
         this.recordCount = result.recordCount;
         this.pageList=[];
         for(var i=0;i<this.pageCount;i++){
            var index = i+1;
            this.pageList.push(index);
         }
      });
    },
    choosePage:function(index){
      //设置pno
      this.pno = index;
      this.loadProductByPage(this.pno,this.pageSize)
    }
  },
  data:function(){
    return {
      dataList:[],//数据
      pageSize:10,//每页个数
      pageCount:0,//总页数
      pno:1,//当前第几页
      recordCount:0,//总记录数
      pageList:[]
    }
  },
  created:function(){
    this.loadProductByPage(1,10);
  }
}
</script>

<style scoped>
    #table-laptop p {
      margin: 0;
    }
    #table-laptop td .title,
    #table-laptop td .fname,
    #table-laptop td .spec {
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    #table-laptop td .title {
      width: 120px;
    }
    #table-laptop td .fname {
      width: 80px;
    }
    #table-laptop td .spec {
      width: 60px;
    }
    #table-laptop td .pic{
      width: 40px;
      vertical-align: middle;
      position: absolute;
      margin-top: -8px;
    }
</style>