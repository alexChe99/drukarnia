@if($errors->any())
    <div class="message_er" > 
        <ul>
        @foreach($errors->all() as $error)
             <li style="color:white"> {{$error}}</li>
        @endforeach

        </ul>
    </div>
    @endif
@if(session('success'))
    <div class="message_sc" > 
           {{session('success')}}
    </div>

@endif