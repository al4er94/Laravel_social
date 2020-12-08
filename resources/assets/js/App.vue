<template>
  <div id="app">
      <h2>Todods</h2>
      <button @click ="goBack">test</button>
      <hr>
      <router-view/>
  </div>
</template>
<script>
    import Auth from './components/Auth'
    export default {
        components: {
            Auth
        },
        methods: {
            goBack() {
                console.log(this.$router);
        }}
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
