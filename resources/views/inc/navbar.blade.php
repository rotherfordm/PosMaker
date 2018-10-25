      



      
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <img  class="navbar-left" src="/storage/web_images/logo_transparent2.png" width="180" height="80" alt="">
                            </a>
                        </div>    
                    <!-- {{ config('app.name', 'Laravel') }} -->
                </a>

        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                      </li>
          
                      <li class="nav-item">
                          <a class="nav-link" href="/about">About</a>
                      </li>
          
                      <li class="nav-item">
                          <a class="nav-link" href="/services">Services</a>
                      </li>

                      <li class="nav-item">
                            <a class="nav-link" href="/pos/create">Create POS</a>
                        </li>

                        
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                                    
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/pos/create">Make a Custom POS</a>

                                <!--
                                <a class="dropdown-item" href="/dashboard">Dashboard</a> -->

                                
                                <a class="dropdown-item" href="/pos">Your Points Of Sale</a>
                                
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
                            
                    @endguest
                </ul>
            </div>
        </div>
    </nav>