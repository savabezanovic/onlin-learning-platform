@extends('layouts.app')

@section('content')

        <div class="row text-center">
            <div class="col-md-12">
                <img src= "{{asset('storage/homePageHero.png')}}" alt="Hero Image" width = "1000" height = "500">
            </div>
        </div>
        
    @guest

        <div class="row text-center">
            <div class="col-md-12">
                <h2>Zelis da postavis svoj kurs?</h2>

                <a href="/register/educator">

                <img src="https://via.placeholder.com/150">

                <br>

                <p>Prijavi se</p>

                </a>

                <h2>Zelis da pohadjas neki kurs?</h2> 

                <a href="/register/student">

                    <img src="https://via.placeholder.com/150">

                    <br>

                    <p>Prijavi se</p>
                
                </a>
            </div>
        </div>

    @endguest

            <div class="row justify-content-center">

                <h2>Kljucne Vrednosti Platforme</h2>

            </div>

                <div class="row text-center offset-2">

                        <div class="col-md-3">
                    
                            <img src="https://via.placeholder.com/150">
                            <p>Ucite iz konfora svog doma</p>

                        </div>

                        <div class="col-md-3">
                    
                            <img src="https://via.placeholder.com/150">
                            <p>Nadjite najpovoljniji i najkvalitetniji kurs</p>

                        </div>

                        <div class="col-md-3">

                            <img src="https://via.placeholder.com/150">
                            <p>Sami odredite tempo i vreme pohadjanja kursa</p>

                        </div>    

                </div>

        <h2>Popularni kursevi</h2>

    @foreach ($courses as $course)

        <img src='{{$course->image_url}}' width=150 height=100></img> 
        <br>
        <p>{{$course->name}}</p>

    @endforeach

@endsection