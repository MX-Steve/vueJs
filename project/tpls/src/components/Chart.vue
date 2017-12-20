<template>
  <div>
      <img src="../../static/img.jpg" alt="">
      <img :src="myUrl" alt="">
        <!-- top tiles -->
        <div class="row tile_count">
          <div class="col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-laptop"></i> 上架商品总数</span>
            <div class="count">24,380</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>128% </i> 较上月</span>
          </div>
          <div class="col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> 注册用户总数</span>
            <div class="count green">1,965</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>50% </i> 较上周</span>
          </div>
          <div class="col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-shopping-cart"></i> 已完成订单总数</span>
            <div class="count red">391</div>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>15% </i> 较上周</span>
          </div>
          <div class="col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-pagelines"></i> 当日PC端PV量</span>
            <div class="count red">14,281</div>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> 较昨日</span>
          </div>
          <div class="col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-mobile"></i> 移动端PV量</span>
            <div class="count green">29,315</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> 较昨日</span>
          </div>
          <div class="col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-apple"></i> App总下载量</span>
            <div class="count green">7,422</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>18% </i> 较上周</span>
          </div>
        </div>
        <!-- /top tiles -->
        <div class="row">
          <div class="col-xs-12">
            <div class="dashboard_graph">
              <div class="row">
                <div class="col-xs-12 x_title">
                  <h3>实时访问量监控
                    <small>x100</small>
                  </h3>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div id="placeholder" class="demo-placeholder"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
  </div>
</template>

<script>
import "../assets/js/jquery.flot.js"

export default {
  data:function(){
    return {
      myUrl:"../../static/img.jpg",
      myData:[],
      totalPoints:300,
      myInterval:null
    }
  },
  methods:{
    getRandomData() {


        if (this.myData.length > 0)
          this.myData = this.myData.slice(1);
        while (this.myData.length < this.totalPoints) {
          var prev = this.myData.length > 0 ? this.myData[this.myData.length - 1] : 50,
            y = prev + Math.random() * 10 - 5;
          if (y < 0) {
            y = 0;
          } else if (y > 100) {
            y = 100;
          }
          this.myData.push(y);
        }
        var res = [];
        for (var i = 0; i < this.myData.length; ++i) {
          res.push([i, this.myData[i]])
        }
        console.log(res);
        return res;
      }
  

  
  },
  mounted:function(){
      //得到设置折线图区域
      var plot = $.plot("#placeholder", [this.getRandomData()], {
          series: {
            shadowSize: 0	// Drawing is faster without shadows
          },
          yaxis: {
            min: 0,
            max: 100
          },
          xaxis: {
            show: false
          }
      });
      // 启动定时器，更新折线图
      this.myInterval = setInterval(()=>{
        plot.setData([this.getRandomData()]);
        plot.draw();

      }, 500);
  },
  destroyed:function(){
    clearInterval(this.myInterval);
    this.myInterval = null;
  }
}
</script>

<style scoped>

</style>