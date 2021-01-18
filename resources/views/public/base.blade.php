<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script><style>
         
        .carousel-caption{
            top: 35%;
            left: 10%;
            width: 80%;
            right: 10%;
        }
        nav{
            background-color:whitesmoke;
        }
        .carousel-item{
            height: 90vh;
        }
        .content {
            position: absolute; 
            bottom: 0; 
            background: rgb(0, 0, 0); 
            background: rgba(0, 0, 0, 0.5); 
            color: #f1f1f1; 
            width: 100%;
            padding: 20px; 
            text-align: center;
            top: 0%;
            @media( max-width: 575.98px) {
                width:500
            }
        }
        .caption{
            font-family:"Cambria, Cochin, Georgia, Times, 'Times New Roman', serif";
            margin-top: 100
        }
        @media screen and (max-width: 600px) {
          .form-btn {
            width: 100%;
            margin-top: 5%;
          }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#"><strong>HBMS</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <form class="d-flex">
                <input class="form-control mx-0" type="search" placeholder="Search" aria-label="Search" size="50">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              @auth
              
              <li class="nav-item">
                <a href="" class="nav-link">{{Auth::User()->name}}</a>
              </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                        <input type="submit" class="nav-link btn-danger btn text-white" value="Logout">
                        @csrf
                    </form>
                </li>
            @endauth

            @guest
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link">login</a></li>
                <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Registor</a></li>
            @endguest
            </ul>
            
          </div>
        </div>
      </nav>
    @yield('content')
      
    <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="btn btn-outline-danger pe-5 ps-5" type="submit">BookNow</button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bottomNav" aria-controls="#bottomNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="bottomNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="" class="nav-link text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>--- <strong>12369990987</strong></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a href="" class="nav-link text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                      </svg></a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                      </svg></a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                      </svg></a>
                </li>
            </ul>
            
          </div>
        </div>
      </nav>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
      </body>
</html>