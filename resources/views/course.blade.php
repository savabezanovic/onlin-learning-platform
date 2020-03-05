@extends("layouts.app")

@section("content")

    @include("components.navigation")

        <h1>{{$course->name}}</h1>

        <iframe width="1000" height="500" src="{{$course->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <p>{{$course->desc}}</p>

        <img src="{{$owner->profile->image_url}}" height="250" width="250" alt="Owner Image">

        <p>{{$owner->first_name}} {{$owner->last_name}}</p>

        <p>{{$owner->profile->bio}}</p>

        <h2>Table of Content:</h2>

        <ol>

            @foreach($course->contents as $content)

            <li>
                {{$content->desc}}
            </li>

            @endforeach

        </ol>

        <h2>Goals:</h2>

        <ol>

            @foreach($goals as $goal)

                <li>{{$goal}}</li>

            @endforeach

        </ol>

    @include("components.footer")
    
@endsection