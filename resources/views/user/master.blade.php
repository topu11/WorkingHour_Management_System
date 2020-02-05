<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
	<title>
   @yield('title','attendace management')
    </title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
	<div class="container">
		 <nav class="navbar navbar-default">
        <div class="container-fluid">
           <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand " href="#">Attendace Management Sytem</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li class="active"><a href="{{route('user.inTime')}}"><strong>Submit inTime</strong></a></li>
            <li class="active"><a href="{{route('user.outTime')}}"><strong>Submit outTime</strong></a></li>
            <li class="dropdown active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Show Attendance</strong> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li class="color2"><a href="{{route('monthTime','1')}}">January</a></li>
                  <li class="color2"><a href="{{route('monthTime','2')}}">February</a></li>
                  <li class="color2"><a href="{{route('monthTime','3')}}">March</a></li>
                  <li class="color2"><a href="{{route('monthTime','4')}}">April</a></li>
                  <li class="color2"><a href="{{route('monthTime','5')}}">May</a></li>
                  <li class="color2"><a href="{{route('monthTime','6')}}">Jun</a></li>
                  <li class="color2"><a href="{{route('monthTime','7')}}">July</a></li>
                  <li class="color2"><a href="{{route('monthTime','8')}}">Augest</a></li>
                  <li class="color2"><a href="{{route('monthTime','9')}}">September</a></li>
                  <li class="color2"><a href="{{route('monthTime','10')}}">Octobor</a></li>
                  <li class="color2"><a href="{{route('monthTime','11')}}">November</a></li>
                  <li class="color2"><a href="{{route('monthTime','12')}}">December</a></li>
                </ul>
              </li>
            </ul>
             <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
             </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div>

    <div class="container">
    @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>

</body>
</html>
