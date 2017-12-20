<template>
          <li>
              <span>{{content}}</span>
              <button @click="del(myIndex)">删除</button>
          </li>
</template>

<script>
export default {
  props:["content","myIndex"],
  methods:{
      del:function(index){
        console.log("要删除："+index);
        this.$emit("delFunc",index);
        
      }
  },
  data:function(){
      return {
          
      }
  }
}
</script>

<style>

</style>

