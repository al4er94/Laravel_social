
<template>
    <div class = "newsList"><p> NewsList</p> 
        <ul id = "newsListUl">
            
        </ul>
        <div class='for-new-news' style='display:none'>
            <form @submit.prevent="onSubmit">
                <input type="text" name ='news-header' v-model="header">
                <input type="hidden" name="_token" value="Global.csrfToken">
                <textarea type='text' name='news-body' v-model="body"> </textarea>
                <input type="submit" name ='submint'>
            </form>
        </div>
        <button v-on:click="showForm">Добавить</button>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                header: null,
                body: null
            }
        },
        methods:{
            getNews(){
                fetch(location.origin+'/api/getNews', {method: "GET"})
                    .then( function (resp) {
                        resp.json().then(function(data){
                            var html = '';
                            data.forEach(function(currentValue){
                                html += '<li>' + currentValue.news_header + '</li>';
                            })
                            document.querySelector('.newsList #newsListUl').innerHTML=html;
                        });
                    });
            },
            showForm(){
                console.log('showForm');
                document.querySelector('.newsList .for-new-news').style.display='block';
            },
            onSubmit(){
                console.log('onSubmit');
                console.log(this.body, this.body);
                var data = {
                    body : this.body,
                    header: this.header
                }
                axios.post(location.origin+'/api/postNews', data).then( function(response) {
                   console.log(response.data);
                });
            }
        },
        mounted() {
         this.getNews();   
        }       
         
    }
</script>
