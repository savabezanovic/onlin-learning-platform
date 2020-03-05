@extends("layouts.app")

@section("content")

    @include("components.navigation")

        <h1>Recentlly added</h1>

        @foreach($recentCourses as $course)

        <img src="https://via.placeholder.com/150"> </img>
        <p>{{$course->name}}</p>

        @endforeach

        <a href="/courses">All Courses</a>

        @foreach($categories as $category)

            <a href="/courses/category/{{$category->name}}">{{$category->name}}</a>

        @endforeach	

        <br>

        @foreach($courses as $course)
        <a href="/course/{{$course->name}}">
            <img src="https://via.placeholder.com/150">
            <p>{{$course->name}}</p>
        </a>

        @endforeach

    @include("components.footer")
    
@endsection