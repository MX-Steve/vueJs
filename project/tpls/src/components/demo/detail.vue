<template>
  <div>
      <h1>detail页面</h1>
      <h3>{{"这里是"+pid+"号商品"}}</h3>
  </div>
</template>

<script>
export default {
  data:function(){
    return {
        pid:0
    }
  },
  created:function(){
        this.pid = this.$route.params.index;
  }
}
</script>

<style scoped>

</style>

