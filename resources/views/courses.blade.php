@extends("layouts.app")

@section("content")

        <h1>Recentlly added</h1>

        @foreach($recentCourses as $course)

        <a href="/courses/course/{{$course->id}}">
            <img src="{{$course->image_url}}" width=150 height=100></img>
            <p>{{$course->name}}</p>
        </a>    

        @endforeach

        <a href="/courses">All Courses</a>

        @foreach($categories as $category)

            <a href="/courses/category/{{$category->name}}">{{$category->name}}</a>

        @endforeach	

        @foreach($courses as $course)

            <br>

            <a href="/courses/course/{{$course->id}}">
                <img src="{{$course->image_url}}" width=150 height=100>
                <p>{{$course->name}}</p>
            </a>

            <br>
        
            @if(auth()->user()->hasRole("student") && $course->followedBy(auth()->user()->id))

                <form action="{{action('PageController@unfollow', $course->id)}}" method="POST">
                
                    {{method_field("DELETE")}}

                    @csrf

                    <input type="submit" value="Unfollow">

                </from>

            @elseif(auth()->user()->hasRole("student") && !$course->followedBy(auth()->user()->id))

                <form action="{{action('PageController@follow', $course->id)}}" method="POST">

                    @csrf

                    <input type="submit" value="Follow">

                </from>
            @endif
        @endforeach
    
@endsection