
<template>
    <div class = "newsList"><p> NewsList</p> 
        <ul id = "newsListUl">
            
        </ul>
        <div class='form-new-news' style='display:none'>
            <form @submit.prevent="onSubmit">
                <input  type="text" name ='news-header' v-model="header">
                <input type="hidden" name="_token" value="Global.csrfToken">
                <input type="hidden" name="news-id" v-model="id">
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
                id: null,
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
                                html += '<li>' + currentValue.news_header + ' '+'<a class="change-news" data-id="'+currentValue.id+'">ред.</a>';
                                html +='<a class="delete-news" data-id="'+currentValue.id+'">уд.</a>';        
                                html +='</li>';
                            })
                            document.querySelector('.newsList #newsListUl').innerHTML=html;
                            exportDef.changeNews();
                            exportDef.deleteNews();
                        });
                    });
            },
            showForm(){
                this.id = null;
                this.header = null;
                this.body = null;
                document.querySelector('.newsList .form-new-news').style.display='block';
                document.querySelector('.newsList .show-button').style.display='none';
                document.querySelector('.newsList .hide-button').style.display='block';
            },
            hideForm(){
                document.querySelector('.newsList .form-new-news').style.display='none';
                document.querySelector('.newsList .show-button').style.display='block';
                document.querySelector('.newsList .hide-button').style.display='none';
            },
            changeNews(){
                let changeLink = document.querySelectorAll('a.change-news');
                var exportDef = this;
                changeLink.forEach(function(el){
                    var currentEl = el;
                    el.onclick = function(elem){
                        let id = currentEl.getAttribute('data-id');
                        fetch(location.origin+'/api/getNewsContentById?id='+id, {method: "GET"})
                        .then( function (resp) {
                           resp.json().then(function(data){
                               exportDef.showForm();
                               exportDef.header = data[0]['news_header'];
                               exportDef.body = data[0]['new_content'];
                               exportDef.id = id;
                           })
                        });
                    }
                })       
            },
            deleteNews(){
                let deleteLink = document.querySelectorAll('a.delete-news');
                var exportDef = this;
                deleteLink.forEach(function(el){
                    var currentEl = el;
                    el.onclick = function(elem){
                        let id = currentEl.getAttribute('data-id');
                        fetch(location.origin+'/api/deleteNews?id='+id, {method: "GET"})
                        .then( function (resp) {
                           resp.json().then(function(data){
                               exportDef.getNews(); 
                           })
                        });
                    }
                });
            },
            onSubmit(){
                var exportDef = this;
                var data = {
                    body : this.body,
                    id : this.id,
                    header: this.header
                }
                axios.post(location.origin+'/api/postNews', data).then( function(response) {
                   exportDef.getNews(); 
                });
            }
        },
        mounted() {
         this.getNews(); 
        }       
         
    }
</script>
