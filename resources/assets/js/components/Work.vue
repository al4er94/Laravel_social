<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактор</div>

                    <div class="row panel-body">
                        <div class = "module col-md-6">
                            <div class = "header-module">Новости: </div>
                            <NewsList/>
                        </div>
                        <div class = "module col-md-6">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NewsList from './moduls/news/NewsList'
    export default {
        mounted() {
            let admin = localStorage.getItem('admin');
            if(admin != 'true'){
              this.$router.push('/admin');
            }
        },
        components: {NewsList}
    }
</script>
<style>
    .panel-body{
        display: flex;
        justify-content: space-around;
    }
    
</style>