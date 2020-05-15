<template>
  <div id="app">
    <Header></Header>
    <router-view></router-view>
    <footer class="footer">
      <div class="footerInfo">
        <p> © Copyright - Ewa Haaglanden</p>
      </div>
    </footer>
  </div>
</template>

<script>
  import Header from "./components/modules/Header";

  export default {
    name: 'App',
    components: {
      Header
    }
  }
</script>

<style>
  html body {
    background-color: rgba(128, 128, 128, 0.1);
  }
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 8vh;
  }

  .footer {
    background-color: #343A40;
    width: 100%;
    height: 6vh;
  }

  .footerInfo {
    width: 75%;
    margin: auto;
  }

  .footerInfo p {
    float: left;
  }
</style>
