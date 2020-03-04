@extends("layouts.app")

@section("content")

    @include("components.navigation")

        <h1>Recentlly added</h1>

        @foreach($recentCourses as $course)

        <img src="https://via.placeholder.com/150"> </img>
        <p>{{$course->name}}</p>

        @endforeach

        <ul>
        @foreach($categories as $category)
        
        <li>
            <a href="/courseCategory{{$category->id}}">{{$category->name}}</a>
        </li>

        @endforeach
        </ul>

        @foreach($courses as $course)

        <img src="https://via.placeholder.com/150">
        <p>{{$course->name}}</p>

        @endforeach

    @include("components.footer")
    
@endsection