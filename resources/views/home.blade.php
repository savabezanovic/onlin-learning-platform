@include("partials.header")

@include("partials.navigation")

<h1>Edukacija za nove generacije!</h1>
<img src= "{{asset('storage/homePageHero.png')}}" alt="Hero Image" width = "500" lenght = "auto">

<h2>Zelis da postavis svoj kurs?</h2>
<a href="#"><img src="https://via.placeholder.com/150"></a>
<a href="#">Prijavi se</a>

<h2>Zelis da pohadjas neki kurs?</h2>
<a href="#"><img src="https://via.placeholder.com/150"></a>
<a href="#">Prijavi se</a>

<h2>Kljucne Vrednosti Platforme</h2>

<img src="https://via.placeholder.com/150">
<p>Ucite iz konfora svog doma</p>

<img src="https://via.placeholder.com/150">
<p>Nadjite najpovoljniji i najkvalitetniji kurs</p>

<img src="https://via.placeholder.com/150">
<p>Sami odredite tempo i vreme pohadjanja kursa</p>

<h2>Popularni kursevi</h2> 

@foreach ($courses as $course)
    <img src='https://via.placeholder.com/150'></img> 
    <br>
    <p>{{$course->name}}</p>
@endforeach

@include("partials.footer")