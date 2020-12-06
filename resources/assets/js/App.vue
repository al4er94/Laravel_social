<template>
  <div id="app">
      <h2>Todods</h2>
      <hr>
      <router-view/>
  </div>
</template>
<script>
    //import router from './router'
    import Auth from './components/Auth'
    export default {
        components: {
            Auth
        },
    }
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
