<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a href="" class="navbar-brand">HBMS</a>
        <form action="" class="d-flex mx-auto">
            <div class="input-group">
                <input type="text" placeholder="Search Here...." class="form-control rounded-0 border-0" size="50">
                <div class="input-group-append">
                    <input type="submit" class="btn btn-light rounded-0" value="Go">
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="" class="nav-link">Home</a>
            </li>
            @if(Auth::check())
            <li class="nav-item">
                <a href="" class="nav-link">{{Auth::User()->name}}</a>
            </li>
            <form action="{{route('logout')}}" method="POST">
                <input type="submit" class="nav-link btn-danger btn text-white" value="Logout">
                @csrf
            </form>
            @endif
        </ul>
        </div>
    </nav>
    
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2">
                <div class="list-group list-group-flush ">
                    <a href="{{route('categorydashboard')}}" class="list-group-item list-group-item-action bg-secondary text-white">Home</a>
                    <a href="{{route('hotels.index')}}" class="list-group-item list-group-item-action">Hotel</a>
                    <a href="{{route('rooms.index')}}" class="list-group-item list-group-item-action">Rooms</a>
                    <a href="{{route('roomcategory.index')}}" class="list-group-item list-group-item-action">RoomType</a>
                    <a href="{{route('booking')}}" class="list-group-item list-group-item-action">Booking</a>
                    <a href="" class="list-group-item list-group-item-action">Review</a>
                </div>
            </div>
            <div class="col-lg-8">
                @yield('content')
            </div>
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>