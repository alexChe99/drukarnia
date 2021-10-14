@extends('layout')

@section('main_content')
<div class="content">
        <h2 style="text-align:center">Актуальні події</h2>
        <div class="content__block">
                
            <div class="content__wrapper">
                
            
                <div class="content__item-x1">
                @foreach($events as $event)
                
                <div class="content__item-x2">
                    <div class="additional" style="display:flex; flex-direction:row; justify-content:space-between; gap:30px"><H4>{{$event->data}}</h4><H4>{{$event->time}}</h4> <H4>{{$event->location}}</h4></div>
                    <div class="hero" ><img src="/storage/{{ $event->Attachment->path}}{{$event->Attachment->name}}.{{$event->Attachment->extension}}" alt="" style="width:100%; border-radius:5px"></div>
                    <div class="title"><H3>{{$event->title}}</h3></div>
                    <div class="title"><p style="text-align:left">{!!$event->body!!}</p></div>
                    <div class="content__footer">
                        
                        <button>
                            Зареєструватися
                        </button>
                    </div>
                </div>
                @endforeach
                
                </div>
            </div>
        </div>


</div>

    @endsection