@extends('master')
@section ("content")



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach ($list as $item)
                <div class="card-header">Write a review for <span style="color: #00224e;">{{$item->P_Name}}</span></div>
                <input type="hidden" name="pid" value= "{{$item ->P_Id}}">
                
            @endforeach
                <div class="card-body">
                <div class="card-body">

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
                
                    <form  action="/submitReview" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pid" value= "{{$item ->P_Id}}" >
                    

               

                    <div class="form-group row" id= "R_Rating">

                            <div class="col-md-8 offset-md-2">

                            <div class="rating">
                                <input type="radio" id="star1" name= "R_Rating" value= "5"><label for="star1"></label>
                                <input type="radio" id="star2" name= "R_Rating" value= "4"><label for="star2"></label>
                                <input type="radio" id="star3" name= "R_Rating" value= "3"><label for="star3"></label>
                                <input type="radio" id="star4" name= "R_Rating" value= "2"><label for="star4"></label>
                                <input type="radio" id="star5" name= "R_Rating" value= "1"><label for="star5"></label>
                            </div>

                            
                        </div>
                    </div>


                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ ('Comment') }}</label>

                            <div class="col-md-6">
                                <textarea id="comment" type="text" class="form-control " name="comment"  > </textarea>
                                <span style="color:red"> @error('comment') {{$message}} @enderror </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ ('Upload a photo') }}</label>

                            <div class="col-md-6">
                                <input id="R_Image" type="file" class="form-control " name="R_Image"  > </input>
                            </div>
                        </div>
                        

                       
                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ ('Send Review') }}
                                </button>

                            </div>
                        </div>

                       

                                <!-- <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Register here') }}
                                    </a> -->
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection