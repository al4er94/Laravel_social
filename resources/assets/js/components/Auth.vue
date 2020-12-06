<template>
 <div>
   <form class="login" @submit.prevent="login" id = "loginForm">
     <h1>Sign in</h1>
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
    //import router from '../router'
    //console.log(router);
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
              let loginForm = {
                  userLogin: this.userLogin,
                  userPassword: this.userPassword
              }
              //loginForm = JSON.stringify(loginForm);
              axios.post(location.origin+'/api/adminLogin/auth', loginForm)
                .then( function(response) {
                    console.log(response.data)
                    if(response.data == true){
                        router.go('/admin/work')
                    }
                });
              //console.log(loginForm);
          }
      }
    }
</script>
    
