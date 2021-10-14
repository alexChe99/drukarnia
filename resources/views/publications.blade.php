@extends('layout')

@section('main_content')
<div class="content">
        <h2 style="text-align:center">Наші публікації</h2>
        <div class="content__block">
                
            <div class="content__wrapper">
                <h3> Інформуємо грамуду Слов’янська </h3>
            
                <div class="content__item-x1">
                    <p style="text-align:left">Друкарня – осередок громадянського суспільства у Слов’янську розпочала роботу у вересні 2019. Центр громадянського суспільства "Друкарня" - це простір для обміну та діалогу між активними громадянами</p>
                </div>
            </div>
        </div>
        <div class="content__wrapper">
            @foreach($posts as $post)
                
                <div class="content__item-x2">
                    <div class="hero" ><img src="/storage/{{ $post->Attachment->path}}{{$post->Attachment->name}}.{{$post->Attachment->extension}}" alt="" style="width:100%; border-radius:5px"></div>
                    <div class="title"><H3>{{$post->title}}</h3></div>
                    <div class="title"><p style=" text-align:left">{{$post->description}}</p></div>
                    <div class="content__footer">
                        <div class="content_like">
                        <img src="/img/heart.svg" style="width:30px"><p>{{$post->likes}}</p>
                        </div>
                        <button>
                            ЧИТАТИ ДАЛІ
                        </button>
                    </div>
                </div>
                @endforeach
                
                
               
            </div>

</div>

    @endsection