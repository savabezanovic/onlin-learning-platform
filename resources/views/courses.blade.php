@extends("layouts.app")

@section("content")

    <div class='row justify-content-center text-center'>

        <h1>Recentlly added</h1>

    </div>

    <!-- <div class='row justify-content-center text-center'> -->

    <div class='row justify-content-center text-center'>

        @foreach($recentCourses as $course)

            <div class="col-md-4">

                <a href="/courses/course/{{$course->id}}">

                    <img src="{{$course->image_url}}" width=150 height=100>

                    <p>{{$course->name}}</p>

                </a>

                @auth

                    @if(auth()->user()->hasRole("student") && $course->followedBy(auth()->user()->id))

                        <form action="{{action('StudentController@unfollow', $course->id)}}" method="POST">

                        @method("DELETE")

                        @csrf

                        <!-- <input name="course_id_unfollow" type="hidden" value="{{$course->id}}"> -->

                            <input type="submit" value="Unfollow">

                        </form>

                    @elseif(auth()->user()->hasRole("student") && !$course->followedBy(auth()->user()->id))

                        <form action="{{action('StudentController@follow', $course->id)}}" method="POST">

                        @csrf

                        <!-- <input name="course_id_follow" type="hidden" value="{{$course->id}}"> -->
                            <input type="submit" value="Follow">

                        </form>

                    @endif

                @endauth

            </div>

        @endforeach

    </div>

    <div class="row justify-content-center text-center">

        <div class='row'>

            <div class="col-md-3">
                <a href="/courses">All Courses</a>
                @foreach($categories as $category)

                    <a href="/courses/category/{{$category->name}}">{{$category->name}}</a>

                @endforeach
            </div>
        </div>

        <div class='col-md-9'>
            <div class="row">
                @foreach($courses as $course)

                    <div class="col-md-4">
                        <a href="/courses/course/{{$course->id}}">

                            <img src="{{$course->image_url}}" width=150 height=100>

                            <p>{{$course->name}}</p>

                        </a>


                        @auth

                            @if(auth()->user()->hasRole("student") && $course->followedBy(auth()->user()->id))

                                <form action="{{action('StudentController@unfollow', $course->id)}}" method="POST">

                                @method("DELETE")

                                @csrf

                                <!-- <input name="course_id_unfollow" type="hidden" value="{{$course->id}}"> -->
                                    <input type="submit" value="Unfollow">

                                </form>

                            @elseif(auth()->user()->hasRole("student") && !$course->followedBy(auth()->user()->id))

                                <form action="{{action('StudentController@follow', $course->id)}}" method="POST">

                                @csrf

                                <!-- <input name="course_id_follow" type="hidden" value="{{$course->id}}"> -->
                                    <input type="submit" value="Follow">

                                </form>
                            @endif

                        @endauth

                    </div>

                @endforeach

            </div>

        </div>
        {{$courses->links()}}
    </div>

@endsection
