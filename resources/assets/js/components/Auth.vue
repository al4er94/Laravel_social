<template>
 <div>
   <form class="login" @submit.prevent="login" id = "loginForm">
     <h1>Sign in</h1>
    <!-- <router-link to="/admin/work">BAck</router-link>-->
     <label>Login</label>
     <input required type="text" v-model="userLogin" placeholder="Snoopy"/>
     <label>Password</label>
     <input required type="password" v-model="userPassword" placeholder="Password"/>
     <input type="hidden" name="_token" value="Global.csrfToken">
     <hr/>
     <button type="submit">Login</button>
   </form>
 </div>
</template>
<script>
    export default {
      //router,
      data(){
          return{
              userLogin: '',
              userPassword: ''
          }
      },
      methods:{
          login(){
              var router = this.$router;
              let loginForm = { 
                  userLogin: this.userLogin,
                  userPassword: this.userPassword
              }
              axios.post(location.origin+'/api/adminLogin/auth', loginForm)
                .then( function(response) {
                    if(response.data == true){
                        localStorage.setItem('admin', 'true');
                        router.push('/admin/work');
                    }
                });
          },
          checkAuth(){
              let admin = localStorage.getItem('admin');
              if(admin == 'true'){
                this.$router.push('/admin/work');
              }
          }
      },
      mounted() {
          this.checkAuth();
      }
    }
</script>
    
