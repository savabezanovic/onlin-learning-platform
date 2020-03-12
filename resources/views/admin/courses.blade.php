@extends("layouts.app")
@section("content")

    <h1>All Courses</h1>

    @foreach($courses as $course)

        <img src="{{$course->image_url}}" width=150 height=100>
        <p> Course ID: {{ $course->id }} </p>
        <p> Course Name: {{ $course->name }} </p>
        <p> Description: {{ $course->description }} </p>
        <p> Video URL: {{ $course->vide_url }} </p>
        <p> Goals: {{ $course->goals }} </p>
        <p> Category: {{ $course->category->name }} </p>
        <p> Owner ID: {{ $course->user_id }} </p>
        <p>Content:</p>
        @foreach($course->contents as $content)
            <p>{{ $content->description }}</p>
        @endforeach


        <a href='/admin/edit/course/{{$course->slug}}'>Edit</a>

        @if(!$course->trashed())

            <form action="{{action('AdminController@restrictCourse', $course->slug)}}" method="POST">

                @method("DELETE")

                @csrf

                <input type="submit" value="Restrict">

            </form>

        @elseif($course->trashed())

            <form action="{{action('AdminController@restoreCourse', $course->slug)}}" method="GET">

                @csrf

                <input type="submit" value="Restore">

            </form>

        @endif

        @if($course->active == true)

            <form action="{{action('AdminController@deactivateCourse', $course->slug)}}" method="POST">

                @csrf

                <input type="submit" value="Deactivate">

            </form>

        @elseif($course->active == false)

            <form action="{{action('AdminController@activateCourse', $course->slug)}}" method="POST">

                @csrf

                <input type="submit" value="Activate">

            </form>

        @endif

        <form action="{{action('AdminController@deleteCourse', $course->slug)}}" method="POST">

            @method("DELETE")

            @csrf

            <input type="submit" value="Delete">

        </form>

    @endforeach

@endsection
