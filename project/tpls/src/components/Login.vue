<template>
  <div class="login">
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form>
            <h1>管理员登录</h1>
            <div>
              <input v-model='uname' type="text" class="form-control" placeholder="管理员登录名" required />
            </div>
            <div>
              <input v-model='upwd' type="password" class="form-control" placeholder="管理员登录密码" required />
            </div>
            <div>
              <button type="button" class="btn btn-default" @click="userLogin">&nbsp;登&nbsp;录&nbsp;</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <div class="clearfix"></div>
              <br />

              <div>
                <h1><img src="../assets/img/favicon.ico"></i> 学子商城后台管理系统</h1>
                <p>©2017 版权所有，CODEBOY.COM</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data:function(){
    return {
      uname:'',
      upwd:''
    }
  },
  methods:{
      userLogin:function(){
          this.$http
            .get("http://127.0.0.1:8080/step04/admin/data/user/login.php?uname="+this.uname+"&upwd="+this.upwd)
            .then(function(response){
               var obj = response.data;
               if(obj.code == 200){
                 alert("登录成功，跳转到主页");
                 this.$router.push("/main");
               }else{
                 alert("用户名或密码错误");
               }
            });
      }
  }
}
</script>

<style scoped>

</style>

