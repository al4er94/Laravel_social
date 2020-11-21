<p> Новости: </p>
@if(!empty($data['news']))
@foreach($data['news'] as $news)
<div class="row">
    <p class ="news_header"> {{$news['news_header']}}</p>
    <p> {{$news['new_content']}} </p>
</div>
@endforeach
@endif