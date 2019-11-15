<nav class="navbar navbar-expand-lg navbar-light colornav">
  <span class="marketname">{{env('APP_NAME')}}</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active" >
        <a class="textnav" href="{{route('home')}}" style="margin-left:50px"><i class="fas fa-home blue"></i>&nbsp;Home </a>
      </li>
      <li class="nav-item active">
        <a class="textnav" href="{{route('markets.index')}}"><i class="fas fa-mouse-pointer green"></i>&nbsp;Booking</a>
      </li>
     
    </ul>


    <ul class="navbar-nav ml-auto">
    @guest
    <li class="nav-item active" >
        <a class="textnav" href="{{route('login')}}" style="margin-left:50px"><i class="fas fa-sign-in-alt yellow"></i>&nbsp;login </a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item active">
        <a class="textnav" href="{{route('register')}}"><i class="fas fa-user-plus orange"></i>&nbsp;register</a>
      </li>
      @endif
      @else

      <li class="nav-item active">
        <a class="textnav" href="{{route('users.show',['user'=>Auth::id()])}}"><i class="fas fa-user-circle pinkdark"></i>&nbsp;{{Auth::user()->username}}</a>
      </li>


      <li class="nav-item dropdown">
        <a class="dropdown-toggle textnav" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown" aria-labelledby="navbarDropdownMenuLink">
          @if(Auth::user()->role == "admin")
            <a class="dropdown-item thaifont" href="{{route('markets.create')}}">วางผังตลาด</a>
            <a class="dropdown-item thaifont" href="">ดูรายงานการแจ้งชำระเงิน</a>
          @endif

          <a class="dropdown-item thaifont" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} &nbsp;<i class="fas fa-sign-out-alt"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </div>
      </li>
      @endguest
    </ul>

  </div>
</nav>