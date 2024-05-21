<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" target="_blanck" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ url('profile') }}">{{ Auth::user()->name }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('project.index') }}">Progetti</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
