@extends("layouts.app")
@section("content")

        <img src="https://via.placeholder.com/150">

        <h2>Moji Kursevi</h2>

        @if(auth()->user()->hasRole("educator"))

            <a href="/course/create">Napravi Novi Kurs</a>

            <br>

            @if(count($createdCourses))

                @foreach($createdCourses as $course)

                    <a href="/course/{{$course->slug}}">

                        <img src="{{$course->image_url}}" width=150 height=100>

                        <h2>{{$course->name}}</h2>

                    </a>

                    @auth

                        @if(auth()->user()->id === $course->user_id)

                            <a href="/course/edit/{{$course->slug}}">Edit</a>
                            
                            <form action="{{action('EducatorController@delete', $course->slug)}}" method="POST">
                    
                                @method("DELETE")

                                {{csrf_field()}}

                                <input type="submit" value="Delete">

                            </from>

                        <br>

                        @endif

                    @endauth

                @endforeach
            @else

            <p>Ne posedujes nijedan kurs</p>    
            
            @endif  

        @else

            @if(count($allCourses))

                @foreach($allCourses as $course)

                    <a href="/course/{{$course->slug}}">

                        <img src="{{$course->image_url}}" width=150 height=100>

                        <h2>{{$course->name}}</h2>

                    </a>

                    @auth

                        @if(auth()->user()->hasRole("student") && $course->followedBy(auth()->user()->id))

                            <form action="{{action('StudentController@unfollow', $course->slug)}}" method="POST">

                                @method("DELETE")

                                @csrf

                                <!-- <input name="course_id_unfollow" type="hidden" value="{{$course->id}}"> -->
                                <input type="submit" value="Unfollow">

                            </form>

                        @endif

                    @endauth

                @endforeach
                
            @else

                <p>Ne pratis nijedan kurs</p>

            @endif  

        @endif

@endsection