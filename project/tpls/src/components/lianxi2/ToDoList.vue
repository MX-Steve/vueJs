<template>
  <ul>
      <to-do-item 
      v-for="(tmp,index) in list" 
      :key="index" 
      :myIndex="index"
      @deleteEvent = "deleteItem" 
      :content="tmp"></to-do-item>
  </ul>
</template>

<script>
import ToDoItem from "@/components/lianxi2/ToDoItem"
export default {
  props:["list"],
  methods:{
      deleteItem:function(msg){
        //   console.log("list中删除的编号为："+msg);
        this.$emit("customEvent",msg);
      }
  },
  data:function(){
      return {
        

      }
  },
  components:{
      toDoItem:ToDoItem
  }
}
</script>

<style>

</style>
