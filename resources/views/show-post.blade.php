@extends('layout')
@section('title', $post->title)
@section('main_content')
<div class="content">
        
    <div class="content__wrapper">
            
                    
                    <div class="content__item-x1">
                        <article> 
                        <div class="title"><H2>{{$post->title}}</h2></div>
                        
                    
                        <div class="title"><p style=" text-align:left">{!!$post->body!!}</p></div>
                        <div class="content__footer">
                            <div class="content_like">
                            <img src="/img/heart.svg" style="width:30px"><p>{{$post->likes}}</p>
                            </div>
                        
                        </div>


    </article>
 <hr class="start"> <h2>Інші публікації</h2>
    <div class="content__block">
           
                <div class="content__wrapper">
                @foreach($blogposts as $blogpost)
                    
                    <div class="content__item-x2">
                        <div class="hero" ><img src="/storage/{{ $blogpost->Attachment->path}}{{$blogpost->Attachment->name}}.{{$blogpost->Attachment->extension}}" alt="" style="width:100%; border-radius:5px"></div>
                        <div class="title"><H3>{{$blogpost->title}}</h3></div>
                        <div class="title"><p style=" text-align:left">{{$blogpost->description}}</p></div>
                        <div class="content__footer">
                            
                            <div class="icon-wrapper"> 
                            <i class="far fa-calendar-alt" style="margin-right:5px"></i><p>{{$blogpost->created_at->toDateString()}}</p>
                    </div>
                            <div class="icon-wrapper"> 
                            <i class="fas fa-eye" style="margin-right:5px"></i><p>{{$blogpost->views}}</p>
                    </div>
                    <div class="icon-wrapper"> 
                            <i class="far fa-calendar-alt" style="margin-right:5px"></i><p></p>
                    </div>
                        
                            
                            <button>
                            <a href="{{route('getPost',[$blogpost->id])}}">ЧИТАТИ ДАЛІ</a> 
                            </button>
                        </div>
                    </div>
                    @endforeach
                    
                    
                
                </div>
            </div>
                    </div>
                    
                    
                    
                
                </div>

</div>

    @endsection