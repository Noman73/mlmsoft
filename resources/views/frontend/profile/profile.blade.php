 <!-- Content Wrapper. Contains page content -->
 @extends('layouts.frontend.master')
 @section('link')
 <link rel="stylesheet" href="{{asset('storage/assets2/vendor/datatables/css/jquery.dataTables.min.css')}}">
 {{-- <link rel="stylesheet" href="{{asset('storage/assets2/vendor/datatables-bs4/dataTables.bootstrap4.min.css')}}"> --}}
  
  <style>
    .file {
      border: 1px solid #ccc;
      display: inline-block;
      width: 100px;
      cursor: pointer;
      background-color:green;
      color:white;
    }
    .file:hover{
        background-color:#fff000;
    }
    .image-upload{
        margin:0 auto;
    }
  </style>
 @endsection
 @section('content')
    <!-- Content Header (Page header) -->
          <div class="row page-titles mx-0">
              <div class="col-sm-6 p-md-0">
                  <div class="welcome-text">
                      <h4>Profile</h4>
                  </div>
              </div>
              <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                  </ol>
              </div>
          </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card ">
            <div class="card-header">
              <div class="container-fluid">
              </div>
            </div>
            <div class="card-body">
                @if($errors->has('pin'))
                    <div class="alert alert-danger">{{ $errors->first('pin') }}</div>
                @endif
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <form action="{{route('frontend.profile')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="text-center">
                    <img id="imagex" src="{{asset('storage/admin-lte/dist/img/avatar5.png')}}" class="d-flex image-upload" style="height:100px;width:100px;">
                    <input class="d-none" type="file" id="file" name="image" onchange="readURL(this)">
                    <label for="file"  class="file">Choose</label>
                    <div id="photo_msg" class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="Enter City Name" value="{{auth()->user()->city}}">
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Post Code</label>
                            <input type="number" id="post_code" name="post_code" class="form-control" placeholder="Enter Post Code" value="{{auth()->user()->post_code}}">
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Adress</label>
                            <input type="text" id="adress" name="adress" class="form-control" placeholder="Enter Adress" value="{{auth()->user()->adress}}">
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">NID</label>
                            <input type="number" id="nid" name="nid" class="form-control" placeholder="Enter NID Number" value="{{auth()->user()->nid}}">
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Birth Date</label>
                            <input type="text" id="dateofbirth" name="dateofbirth" class="form-control" placeholder="Enter Birth Date" value="{{auth()->user()->dateofbirth}}">
                        </div>
                      </div>
                  </div>
                 
                  <button class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
      </div><!-- /.container-fluid -->
 
    </section>
  @endsection

  @section('script')
  <script src="{{asset('storage/assets2/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('frontend.profile.internal-assets.js.script')
  @endsection