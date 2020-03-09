@extends("layouts.app")
@section("content")

        <img src="https://via.placeholder.com/150">

        <h2>Moji Kursevi</h2>

        @if(auth()->user()->hasRole("educator"))

            <a href="#">Napravi Novi Kurs</a>

            @if(count($createdCourses))

                @foreach($createdCourses as $course)

                    <a href="/course/{{$course->name}}">

                        <img src="{{$course->image_url}}">

                        <h2>{{$course->name}}</h2>

                    </a>

                    <a href="/course/{{$course->name}}/edit">Edit</a>

                    <a href="/course/{{$course->name}}/delete">Delete</a>

                @endforeach

            @else

                <p>Nemas nijedan kurs</p>

            @endif  

        @else

            @if(count($allCourses))

                @foreach($allCourses as $course)

                    <a href="/course/{{$course->name}}">

                        <img src="{{$course->image_url}}">

                        <h2>{{$course->name}}</h2>

                    </a>

                    <a href="/course/{{$course->name}}/unfollow">Unfollow</a>

                @endforeach
                
            @else

                <p>Ne pratis nijedan kurs</p>

            @endif  

        @endif
        
@endsection