 @include('include.header')

 <body>

     <!-- preloader area start -->
     <!-- preloader area end -->

     <!-- page container area start -->
     <div class="page-container">

         <!-- sidebar menu area start -->
         @include('include.sidebar')
         <!-- sidebar menu area end -->

         <!-- main content area start -->
         <div class="main-content">

             <!-- header area start -->
             @include('include.header_area')
             <!-- header area end -->

             <!-- page title area start -->
             <div class="page-title-area">
                 <div class="row align-items-center">
                     <div class="col-sm-6">
                         <div class="breadcrumbs-area clearfix">
                             <h4 class="page-title pull-left">Catalogue</h4>
                             <ul class="breadcrumbs pull-left">
                                 <li><a href="dashboard.html">Home</a></li>
                                 <li><span>Catalogue</span></li>
                             </ul>
                         </div>
                     </div>
                     @include('include.managerBar')
                 </div>
             </div>
             <!-- page title area end -->

             <div class="main-content-inner">
                 <div class="row">
                     <div class="col-12 mt-5">
                         <div class="row">
                             <!-- Textual inputs start -->
                             <div class="col-12 mt-5">
                                 <div class="card">
                                     <div class="card-body">
                                         <form action="{{ route('businesshour.update', $businesshour->Day_Id) }}"
                                             method="POST">
                                             @csrf
                                             @method('PUT')
                                             <h4 class="header-title">Edit Business Hours</h4>
                                             <label>Day:</label>
                                             <h5><strong>{{ $businesshour->Day_Of_Week }}</strong></h5><br>
                                             <div class="form-row">
                                                 <div class="col-md-4 mb-3">
                                                     <label>Start Time:</label>
                                                     <input type="time" class="form-control"
                                                         value="{{ $businesshour->Start_Time }}" name="Start_Time"
                                                         Required>
                                                 </div>
                                             </div>
                                             <div class="form-row">
                                                 <div class="col-md-4 mb-3">
                                                     <label>End Time:</label>
                                                     <input type="time" class="form-control"
                                                         value="{{ $businesshour->End_Time }}" name="End_Time"
                                                         Required>
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                 <label for="example-text-input" class="col-form-label">is Day
                                                     of?:</label><br>
                                                 <label class="switch">
                                                     <input type="hidden" value="0" name="Status">
                                                     <input value="1" type="checkbox" name="Status"
                                                         {{ $businesshour->Status == 1 ? ' checked' : '' }}>
                                                     <span class="slider round"></span>
                                                 </label>
                                             </div>
                                             <button type="submit" style="float: right; margin-right: 10px"
                                                 class="btn btn-success mb-3" name="upload">Edit</button>
                                             <a class="btn btn-danger" style="float: right; margin-right: 10px"
                                                 href="{{ route('businesshour.index') }}">Back</a>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                             <!-- Textual inputs end -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- main content area end -->
         <!-- *************************************************************************************************************************-->


         <!-- footer area start-->
         @include('include.footer')

         <!-- footer area end-->
     </div>
     <!-- page container area end -->

     <!-- offset area start -->
     @include('include.offset')

     <!-- offset area end -->


 </body>
