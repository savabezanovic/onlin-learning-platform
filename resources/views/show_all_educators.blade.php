@include("partials.header")
@include("partials.navigation")

    <h1>All Educators</h1>

    <h2>Recently Joined</h2>

    @foreach($recentEducators as $educator)

        <img src="https://via.placeholder.com/150">
        <p>{{$educator->first_name}} {{$educator->last_name}}</p>

    @endforeach

    <form action="{{action('PagesController@showAllEducators')}}" method="GET">

        <span for="name">Search for an educator:</span>
	    <input type="text" name="name"></input>

        <input type="submit" value="Search">

    </form>
    <br>
    
    @foreach($allEducators as $educator)

        <img src="https://via.placeholder.com/150">
        <p>{{$educator->first_name}} {{$educator->last_name}}</p>
    
    @endforeach

@include("partials.footer")