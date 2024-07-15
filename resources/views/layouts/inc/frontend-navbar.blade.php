<div class="global-navbar  ">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
               <div class="border text-center p-2">
                <h5></h5>
               </div>
            </div>
        </div>
    </div>
</div>

<div class="sticky-top">

    <nav class="navbar navbar-expand-lg navbar-light bg-black">
        <div class="container  ">
            <div class="col-md-3  d-none d-sm-none d-md-inline ">
                <img src="{{asset('assets/images/codercolon-logo.png')}}"  style="width:140px" alt="Logo" >
            </div>
            <a href="" class="navbar-brand d-inline d-sm-inline d-md-none"> <img src="{{asset('assets/images/codercolon-logo.png')}}" style="width:130px" alt="Logo" ></a>
          
            <button class="navbar-toggler text-white bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link"   href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"   href="{{url('about-us')}}">About Us</a>
              </li>
             
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> --}}

              @php
                  $categories = App\Models\Category::where('navbar_status', '0')->where('status', '0')->get();
              @endphp
              @foreach ($categories as $cateitem)
              <li class="nav-item">
                <a class="nav-link " href="{{url("project/".$cateitem->slug)}}">{{$cateitem->name}}</a>
              </li>
                  
              @endforeach
              
              <li class="nav-item">
                <a class="nav-link " href="{{url('contact-us')}}">Contact Us</a>
              </li>
            </ul>
             
          </div>
        </div>
      </nav>
</div>