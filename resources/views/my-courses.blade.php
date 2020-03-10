@extends("layouts.app")
@section("content")

        <img src="https://via.placeholder.com/150">

        <h2>Moji Kursevi</h2>

        @if(auth()->user()->hasRole("educator"))

            <a href="/course/create">Napravi Novi Kurs</a>

            <br>

            @if(count($createdCourses))

                @foreach($createdCourses as $course)

                    <a href="/courses/course/{{$course->id}}">

                        <img src="{{$course->image_url}}" width=150 height=100>

                        <h2>{{$course->name}}</h2>

                    </a>

                    @if(auth()->user()->id === $course->user_id)

                    <a href="/course/edit/{{$course->id}}">Edit</a>
                    
                    <form action="{{action('EducatorController@delete', $course->id)}}" method="POST">
            
                    {{method_field("DELETE")}}

                    {{csrf_field()}}

                        <input type="submit" value="Delete">

                    </from>

                    <br>

                    @endif

                @endforeach
            @else

            <p>Ne posedujes nijedan kurs</p>    
            
            @endif  

        @else

            @if(count($allCourses))

                @foreach($allCourses as $course)

                    <a href="/course/course/{{$course->id}}" width=150 height=100>

                        <img src="{{$course->image_url}}">

                        <h2>{{$course->name}}</h2>

                    </a>

                    <a href="/course/unfollow/{{$course->id}}">Unfollow</a>

                @endforeach
                
            @else

                <p>Ne pratis nijedan kurs</p>

            @endif  

        @endif

@endsection