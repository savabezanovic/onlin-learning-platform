@extends("layouts.app")

@section("content")
      
       <img src="{{$educator->image_url}}" width=150 height=100>

       <h2>{{$educator->first_name}}{{$educator->last_name}}</h2>

       <h3>{{$educator->profile->education}}</h3>

       @if ($educator->id === auth()->user()->id)

            <a class="edit-btn edit-btn-educator btns-educator-profil" href="/profile/edit/{{$educator->slug}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Izmeni">
                    
                <i class="material-icons">edit</i>

            </a>
           
       @endif

       <h3>O Predavacu</h3>

       <p>{{$educator->profile->bio}}</p>

       <h3>Kursevi</h3>

       @foreach($courses as $course)

            <a href="/course/{$course->name}">

                <img src="{{$course->image_url}}" width=150 height=100>

                <p>{{$course->name}}</p>

            </a>

        @endforeach
    
@endsection