@extends('master')
@section('content')

  <!-- Shipping Address Start -->
  <div class="checkout">
        <div class="container">
            <div class="section-header text-center">
                    <h2>Update Profile</h2>
            </div>

            <hr>
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
            @endif
            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail')}}
            </div>
            @endif
            

            <centre><div>
               
               <img src= "images/User1.jpg" alt="MyImage" class="avatarprofile">
                
               </centre></div>

            <div class="card">
            <div class="card-body">

            
            
            <form action="{{route('update')}}" method="post">
            @csrf
            
            <input type="hidden" name="cid" value= "{{$Info ->id}}">

              <div class="form-group">
                 <label for="">Name</label>
                 <input type="text" class="form-control" name="name"
                  placeholder="Enter your name" value= "{{$Info -> name}}" >
                  <span style="color:red"> @error ('name') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">Email</label>
                 <input type="text" class="form-control" name="email"  readonly
                 placeholder="Enter your email" value= "{{$Info -> email}}">
                 <span style="color:red"> @error ('email') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">Phone Number</label>
                 <input type="text" class="form-control" name="phone"
                 placeholder="Enter your phone number" value= "{{$Info -> phone}}">
                 <span style="color:red"> @error ('phone') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">Street</label>
                 <input type="text" class="form-control" name="street"
                 placeholder="Enter your address" value= "{{$Info -> street_1}}">
                 <span style="color:red"> @error ('street') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">Postcode</label>
                 <input type="text" class="form-control" name="postcode"
                 placeholder="Enter your postcode" value= "{{$Info -> postcode}}">
                 <span style="color:red"> @error ('postcode') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">City</label>
                 <input type="text" class="form-control" name="city"
                 placeholder="Enter your city" value= "{{$Info -> city}}">
                 <span style="color:red"> @error ('city') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">State</label>
                 <input type="text" class="form-control" name="state"
                 placeholder="Enter your state" value= "{{$Info -> state}}">
                 <span style="color:red"> @error ('state') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">Birthdate</label>
                 <input type="date" class="form-control" name="birthdate"  type="date" 
                 value= "{{$Info -> birthdate}}">
                 <span style="color:red"> @error ('birthdate') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                 <label for="">Gender</label>
                 <select class="form-control" name="gender" value= "{{$Info -> gender}}">
                 <option>Male</option>
                 <option>Female</option>
                 </select>
                 <span style="color:red"> @error ('gender') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                  <label for="">Occupation</label>
                 <input type="text" class="form-control" name="occupation"
                 placeholder="Enter your occupation" value= "{{$Info -> occupation}}">
                 <span style="color:red"> @error ('occupation') {{ $message}} @enderror </span>
              </div>
              <div class="form-group">
                  <label for="">Race</label>
                  <select class="form-control" name="race" value= "{{$Info -> race}}">
                  <option>Malay</option>
                  <option>Chinese</option>
                  <option>Indian</option>
                  <option>Other</option>
                  </select>
                  <span style="color:red"> @error ('race') {{ $message}} @enderror </span>
               </div>
               <div class="form-group">
                  <label for="">Marital</label>
                  <select class="form-control" name="marital" value= "{{$Info -> marital}}">
                  <option>Single</option>
                  <option>Married</option>
                  <option>Widowed</option>
                  <option>Divorced</option>
                  </select>
                  <span style="color:red"> @error ('race') {{ $message}} @enderror </span>
               </div>
              <div class="form-group" style="text-align: right;">
              <button type="submit" class="btn btn-primary ">Save Changes</button>
              </div>
            </form>


            </div>
            </div>

            
        </div>
    </div>
        <!-- Shipping Address End -->


@endsection