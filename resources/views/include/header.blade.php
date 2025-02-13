    
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        @if(Auth::check())
        <p style="color:#FFF;">Welcome, {{ Auth::user()->name }}</p>
        @else
            <p><a href="{{ route('login') }}">Login</a></p>
        @endif
    
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            
            <li class="nav-item">
              
            </li>
          </ul>
            <a  href="{{route("logout")}}" class="btn btn-outline-success">Logout</a>&nbsp;&nbsp;
            <a href="{{route('task.add')}}" class="btn btn-outline-success">Add Task</a>
          
        </div>
      </div>
    </nav>
  </header>