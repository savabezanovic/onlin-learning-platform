@extends("layouts.app")
@section("content")
    @include("components.navigation")

        <h1>All Educators</h1>

        <h2>Recently Joined</h2>

        @foreach($recentEducators as $educator)

            <img src="https://via.placeholder.com/150">
            <p>{{$educator->first_name}} {{$educator->last_name}}</p>

        @endforeach

        <form action="{{action('PagesController@showEducators')}}" method="GET">
        @csrf
            <span for="name">Search for an educator:</span>
            <input type="text" name="name"></input>

            <input type="submit" value="Search">

        </form>
        <br>
        
        @foreach($allEducators as $educator)

            <img src="https://via.placeholder.com/150">
            <p>{{$educator->first_name}} {{$educator->last_name}}</p>
        
        @endforeach

    @include("components.footer")
@endsection