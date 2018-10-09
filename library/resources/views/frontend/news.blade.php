@extends('frontend.master')
@section('title','News')
@section('main')
<style>
.cat>h2>a{
    text-decoration:none;
    color: #888;
}
</style>
					<div id="wrap-inner">
						<div class="news">
                            <div class="title">
                                <h1 class="text-center">Tin tức</h1>
                            </div>
                            @foreach($list as $lists)
                            <div class="cat">
                                <h2><a href="{{asset('news/content/'.$lists->news_id)}}">{{$lists->news_title}}</a></h2>
                            </div>
                            @endforeach
                        </div>
					</div>
@stop