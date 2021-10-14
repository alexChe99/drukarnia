@extends('layout')
@section('title','Головна сторінка')
@section('main_content')
<div class="content">
@include('messages')
        <div class="home-slider">
            <?php
            $result = array();
            
            for($i = 0; $i < count($events); $i++){
                

                $r = ["/storage/{$events[$i]->Attachment->path}"."{$events[$i]->Attachment->name}"."."."{$events[$i]->Attachment->extension}"];
                array_push($result,$r, $events[$i]->body,$events[$i]->title);
            }
           
     
      
      ?>
       
          <div id="app">
          <div class="content__wrapper">
              <div class="content-slider">
              <v-slider :slider_data="{{ json_encode($events) }}" :interval="4000"></v-slider></div>     
</div>
        </div>
        <div class="content__block">
            <div class="content__wrapper">
            

                <div class="content__item-x1">
                    <p style="font-size:24px">Друкарня – осередок громадянського суспільства у Слов’янську розпочала роботу у вересні 2019. Центр громадянського суспільства "Друкарня" - це простір для обміну та діалогу між активними громадянами</p>
                </div>
            </div>
        </div>


        <div class="content__block">
            <hr class="start"> <h2>Напрямки роботы нашого осередка</h2><hr class="end">
            <div class="content__wrapper">

               @foreach($directions as $direction)
                
                <div class="content__item-directions">
                    <div class="hero"><img src="/storage/{{ $direction->Attachment->path}}{{$direction->Attachment->name}}.{{$direction->Attachment->extension}}" alt="" style="width:211px;"></div>
                    <div class="title"><p style="font-weight: 700;">{{$direction->title}}</p></div>
                    
                </div>
                @endforeach
                

            </div>
            
        </div>

        <div class="content__block">
           <hr class="start" > <h2>Наша команда</h2><hr class="end">
            <div class="content__wrapper">

            @foreach($members as $member)
                
                <div class="content__item-members">
                    <div class="hero" ><img src="/storage/{{ $member->Attachment->path}}{{$member->Attachment->name}}.{{$member->Attachment->extension}}" alt="" style="width:211px; border-radius:50%"></div>
                    <div class="title"><p style="font-weight: 700;">{{$member->title}}</p></div>
                    <div class="title"><p style="">{{$member->description}}</p></div>
                </div>
                @endforeach
                
               

            </div>
            
        </div>

        <div class="content__block">
           <hr class="start"> <h2>Останні публікації</h2><hr class="end">
            <div class="content__wrapper">
            @foreach($posts as $post)
                
                <div class="content__item-x2">
                    <div class="hero" ><img src="/storage/{{ $post->Attachment->path}}{{$post->Attachment->name}}.{{$post->Attachment->extension}}" alt="" style="width:100%; border-radius:5px"></div>
                    <div class="title"><H3>{{$post->title}}</h3></div>
                    <div class="title"><p style=" text-align:left">{{$post->description}}</p></div>
                    <div class="content__footer">
                        
                        <div class="icon-wrapper"> 
                        <i class="far fa-calendar-alt" style="margin-right:5px"></i><p>{{$post->created_at->toDateString()}}</p>
                </div>
                        <div class="icon-wrapper"> 
                        <i class="fas fa-eye" style="margin-right:5px"></i><p>{{$post->views}}</p>
                </div>
                <div class="icon-wrapper"> 
                        <i class="far fa-calendar-alt" style="margin-right:5px"></i><p></p>
                </div>
                      
                        
                        <button>
                           <a href="{{route('getPost',[$post->id])}}">ЧИТАТИ ДАЛІ</a> 
                        </button>
                    </div>
                </div>
                @endforeach
                
                
               
            </div>
        </div>


        <<div class="content__block" style="background-color: #FAFAFC; padding-bottom: 60px;">
            <h2 style="grid-column: 2">Партнеры</h2>
            <div class="content__partners"> 
                

                 @foreach($partners as $partner)  
                    <a href="{{$partner->link}}" target="_blank">
                    <div class="content__item-partners">
                    <div class="hero__item-partners" ><img class="hero__item-partners-img" src="/storage/{{ $partner->Attachment->path}}{{$partner->Attachment->name}}.{{$partner->Attachment->extension}}" alt=""></div>

                
                </div> </a>
                @endforeach   
            </div>
                   
        </div>

           
       

       


       
    </div>
   
    @endsection
   
 