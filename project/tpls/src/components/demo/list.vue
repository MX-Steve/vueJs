<template>
  <div>
      <my-header></my-header>
      <h1>这里是list页面</h1>
      <p>{{msg}}</p>
      <ul>
          <li v-for="(tmp,index) in list" :key="index">{{tmp.name}} <button @click="toDetail(index)">查看</button></li>

      </ul>
      <button @click="loadMore">加载更多</button>
  </div>
</template>


<script>
import MyHeader from "@/components/demo/header";
export default {
  methods:{
      toDetail:function(index){
        this.$router.push("/myDetail/"+index);
      },
      loadMore:function(){
          console.log("btn is clicked");
          this.$http
            .get("http://jsonplaceholder.typicode.com/users")
            .then(function(response){
                console.log(response.data);
                this.list = response.data;
            });
      }
  },
  data:function(){
      return {
          msg:"hello everyone!",
          list:[]
      }
  },
  components:{
      "my-header":MyHeader
  }
}
</script>

<style scoped>

</style>
