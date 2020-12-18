<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/cover/cover.css" rel="stylesheet">


  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Web Service</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="{{route('home')}}">Home</a>
            <a class="nav-link active" href="{{route('create')}}">Create</a>                      
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        @yield('content')
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>2020 Iván C.</p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/bootstrap.js')}}"></script>
  </body>
</html>
