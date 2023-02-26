<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        
            <!-- ***** Logo Start ***** -->
            <a href="{{url('/redirect')}}" class="logo">
                <img src="assets/images/logo.png">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                </li>
                <li class="nav-item dropdown connection">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="POST">
                       @csrf
                       <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                 </li>
            </ul>
            
        </div>
    </nav>
</div>