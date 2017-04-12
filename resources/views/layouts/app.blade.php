<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reitervereinigung ') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                    <!--        {{ config('app.name', 'Reitervereinigung ') }} -->
                        Reitervereinigung
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <!--<ul class="nav navbar-nav" >
                        &nbsp;<li ><a href="#" @click="getContendView">Home </a> </li>
                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->


                          <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Grundlegendes <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a href="#" @click="getContendView(2)">
                                          Organisation
                                      </a>
                                      <a href="#" @click="getContendView(3)">
                                          Aufgaben der Hindernisrichter
                                      </a>
                                      <a href="#" @click="getContendView(4)">
                                        Ausfüllen HR-Karte
                                      </a>
                                      <a href="#" @click="getContendView(5)">
                                          Organisation des Teams am Sprung
                                      </a>
                                      <a href="#" @click="getContendView(6)">
                                          Funkverkehr
                                      </a>

                                  </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Bewertung <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" @click="getContendView(7)">
                                        Grundlagen
                                    </a>
                                    <a href="#" @click="getContendView(8)">
                                        Hindernisfehler
                                    </a>
                                    <a href="#" @click="getContendView(9)">
                                      Schmale Sprünge
                                    </a>
                                    <a href="#" @click="getContendView(10)">
                                      Kombinationen
                                    </a>
                                    <a href="#" @click="getContendView(11)">
                                      Alternativen
                                    </a>
                                    <a href="#" @click="getContendView(12)">
                                      MIM / Sicherheitsteile
                                    </a>
                                    <a href="#" @click="getfrageView(1)">
                                      Bewertungsaufgabe
                                    </a>
                                </li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Sicherheit <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" @click="getContendView(13)">
                                        Verhalten beim Sturz
                                    </a>
                                    <a href="#" @click="getContendView(14)">
                                        Stoppen von Teilnehmern
                                    </a>
                                    <a href="#" @click="getContendView(15)">
                                        Hindernispflege
                                    </a>
                                    <a href="#" @click="getContendView(16)">
                                        Freihalten der Strecke
                                    </a>
                                </li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Vorkommnisse <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" @click="getContendView(17)">
                                        Überholen
                                    </a>
                                    <a href="#" @click="getContendView(18)">
                                        Fremde Hilfe
                                    </a>
                                </li>
                              </ul>
                            </li>
                            <li>
                              <a href="#" href="#" @click="getContendView(19)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Auffrischung
                              </a>
                            </li>
                          <!--    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Kurse <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" @click="currentView='kurseuebersicht'">
                                        Übersicht
                                    </a>
                                </li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Kapitel <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" @click="currentView='chat-composer'">
                                        Übersicht
                                    </a>
                                </li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Fragen <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#"  @click="currentView='fragenuebersicht'">
                                        Übersicht
                                    </a>
                                </li>
                              </ul>
                            </li>
                          -->
                          @if (Auth::guest())
                              <li><a href="{{ route('login') }}">Login</a></li>
                                      <!--  <li><a href="{{ route('register') }}">Register</a></li>-->
                            @else
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-text">
                                   Bearbeiten
                                 </button>
                               <li class="dropdown">
                                <a id="usernameID" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="#" @click="currentView='user-control'">
                                            Settings
                                        </a>
                                    </li>
                                </ul>
                            </li>
                          @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')



    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
<footer class="panel-footer navbar-fixed-bottom">
    <div class="container">
        <div class="pull-left">
            Reitervereinigung
        </div>
        <div    class="pull-right" >
            <a href="{{url('home')}}"> Home  </a> |
              <a href="{{url('impressum')}}">Impressum</a>
        </div>
    </div>
</footer>
</html>
