<template>
  <div>
      <h1>待做事项列表</h1>
      <input type="text" v-model="myInput">
      <button @click="sendToFather">添加</button>
  </div>
</template>

<script>
export default {
  data:function(){
      return {
          myInput:""
      }
  },
  methods:{
      sendToFather:function(){
        //将this.myInput发送给父组件
        this.$emit("addEvent",this.myInput);
        this.myInput = '';
      }
  }
}
</script>

<style>

</style>
