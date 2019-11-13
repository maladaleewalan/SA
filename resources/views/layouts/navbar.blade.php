<nav class="navbar navbar-expand-lg navbar-light colornav">
  <span class="marketname">abc market</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="textnav" href="{{route('home')}}"><i class="fas fa-home blue"></i>&nbsp;Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    

      <li class="nav-item dropdown">
        <a class="dropdown-toggle textnav" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item thaifont" href="{{route('markets.create')}}">วางผังตลาด</a>
        </div>
      </li>
     
    </ul>

  </div>
</nav>