@extends('public.base')

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
 
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://www.princehotels.com/tokyo/wp-content/uploads/sites/9/2019/06/tokyo-prince-hotel-dining-Shimizu_1-1.jpg" class="d-block w-100" alt="...">
    </div>
    
    <div class="carousel-item">
      <img src="https://media.istockphoto.com/id/492189224/photo/seaview-bedroom.jpg?s=612x612&w=0&k=20&c=tSL5OoSdxW3l7WzdBGU2_NnGNjDH88twjNZTTkll2jY=" class="d-block w-100" alt="...">
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
  <div class="content">
    <h1 style="margin-top:15%;">Welcome in Our comfort world</h1>
    <button class="btn btn-outline-light p-3 pe-5 ps-5 mt-3" type="submit">BookNow</button>
  </div>
</div>  

    <div class="container mt-5 mb-3">
        <div class="row">
              <div class="col-lg-12">
                  <h2 class="text-center mb-4">Our Hotel Rooms</h2>
              </div>
            @foreach ($room_type as $type)
            <div class="col-lg-4 mb-3">
              <a href="{{route('room_type',['id'=>$type->id])}}" class="text-decoration-none text-dark">
                <div class="card bg-dark text-light mb-3">
                  <img src="{{ $type->image }}" class="card-img" alt="..." height="250">
                  <div class="card-img-overlay" style="background: rgba(0, 0, 0, 0.5)">
                    <h5 class="card-title mt-5">{{$type->name}}</h5>
                    
                    <span class="badge rounded-pill bg-info text-dark p-2">Aviable Rooms -{{count($type->rooms)}}</span>
                    
                  <div class="mt-2" style="color: orange"> <strong class="text-white">Rating:</strong> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                        <path d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
                      </svg>
                  </div>
                   <h5 class="card-text"><strong>Rs {{$type->cost_per_day}}</strong></h5>
                  </div>
                </div>
              </a>
          </div>    
            @endforeach
            
            
        </div>
    </div>

    <div class="container p-5">
      <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center mb-4">Gallery</h2>
            </div>
          @foreach ($room_type as $type)
          <div class="col-lg-3 mb-3">
              <div class="card bg-dark text-light mb-3">
                <img src="{{ $type->image }}" class="card-img" alt="..." height="200">
              </div>
              </div>
          @endforeach
        </div>  
          
      </div>
  </div>
  <div class="mb-4 p-5" style="background-color: gainsboro">
    <table>
      <tr>
        <th class="text-dark">Name</th>
      </tr>
    </table>
  </div>
@endsection