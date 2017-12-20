<template>
    <div>
        <to-do-input @addEvent="rcvItem"></to-do-input>
        <h3>++++++++++++++++++++++++++++++++++++</h3>
        <button class="btn btn-success"></button>
        <to-do-list :list="myList" @customEvent = "deleteItem"></to-do-list>
    </div>
</template>

<script>
import ToDoList from "@/components/lianxi2/ToDoList";
import ToDoInput from "@/components/lianxi2/ToDoInput"

export default {

  data:function(){
      return {
          myList:[]
      }
  },
  methods:{
    rcvItem:function(item){
        console.log("收到input的值："+item);
        this.myList.push(item);
    },
    deleteItem:function(pid){
        // console.log("box中接收到删除编号："+pid);
        this.myList.splice(pid,1);
    }
  },
  components:{
      ToDoInput:ToDoInput,
      ToDoList:ToDoList
  }
}
</script>

<style scoped>

</style>
