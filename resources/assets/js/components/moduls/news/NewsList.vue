
<template>
    <div class = "newsList"><p> NewsList</p> 
        <ul id = "newsListUl">
            
        </ul>
        <div class='form-new-news' style='display:none'>
            <form @submit.prevent="onSubmit">
                <input type="text" name ='news-header' v-model="header">
                <input type="hidden" name="_token" value="Global.csrfToken">
                <textarea type='text' name='news-body' v-model="body"> </textarea>
                <input type="submit" name ='submint'>
            </form>
        </div>
        <button v-on:click="showForm" class="show-button">Добавить</button>
        <button v-on:click="hideForm" class = "hide-button">Закрыть</button>
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
                var exportDef = this;
                fetch(location.origin+'/api/getNews', {method: "GET"})
                    .then( function (resp) {
                        resp.json().then(function(data){
                            var html = '';
                            data.forEach(function(currentValue){
                                html += '<li>' + currentValue.news_header + ' '+'<a class="change" data-id="'+currentValue.id+'">ред.</a></li>';
                            })
                            document.querySelector('.newsList #newsListUl').innerHTML=html;
                            exportDef.changeNews();
                        });
                    });
            },
            showForm(){
                console.log('showForm');
                document.querySelector('.newsList .form-new-news').style.display='block';
                document.querySelector('.newsList .show-button').style.display='none';
                document.querySelector('.newsList .hide-button').style.display='block';
            },
            hideForm(){
                document.querySelector('.newsList .form-new-news').style.display='none';
                document.querySelector('.newsList .show-button').style.display='block';
                document.querySelector('.newsList .hide-button').style.display='none';
                //document.querySelectorAll('.form-new-news input[name="news-header"]').value='';
            },
            changeNews(){
                document.addEventListener('click', function(e){
                    if(e.target.classList.contains('change')) {
                        console.log(e);
                        console.log(e.getAttribute('data'));
                    } 
                });             
            },
            onSubmit(){
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
