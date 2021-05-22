<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Document</title>
        <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/American_University_School_of_International_Service_building.jpg/420px-American_University_School_of_International_Service_building.jpg");
  filter: blur(8px);
  -webkit-filter: blur(8px);
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.bg-login{
  position: absolute;
  top: 2%;
  right: 2%;
  font-family: calibri;
  font-size: 20px;

}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
</style>
    </head>
    <body class="antialiased " style="height: 100vh" >
        <div class="bg-image"></div>
        <div class="bg-login">
            @if (Route::has('login'))
            <div class=" p-4">
                @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 text-decoration-none text-light ">Home</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 text-decoration-none text-light ">Log in</a>
                
                {{-- @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif  --}}
                @endauth
            </div>
            @endif
            
        </div>
        <div class="bg-text">
        
                <h1>Welcome to our School</h1><br>
                <a href="/schedule" class="text-decoration-none text-light ">Schedule</a>
            </div>
    </body>
</html>
           
