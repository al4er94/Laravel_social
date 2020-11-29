<template>
  <div id="app">
      <h2>Todods1</h2>
      <hr>
      <Auth/>
  </div>
</template>
<script>
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
