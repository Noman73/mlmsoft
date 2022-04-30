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
                      <h4>Package</h4>
                  </div>
              </div>
              <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active"><a href="javascript:void(0)">Package</a></li>
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
              @if(auth()->user()->pin_no==null)
                <p class="text-danger">*After Submitting PIN code your account will activate</p>
                @if($errors->has('pin'))
                    <div class="alert alert-danger">{{ $errors->first('pin') }}</div>
                @endif
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <form action="{{route('pin_verify')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="">Pin Verification</label>
                    <input type="text" id="pin" name="pin" class="form-control" placeholder="Enter PIN Code">
                  </div>
                  <button class="btn btn-primary">Submit</button>
                </form>
              @else
              <div class="text-success bg-muted font-weight-bold">Welcome ! Your Account is Activated</div>
              @endif
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
  @include('frontend.pin_verify.internal-assets.js.script')
  @endsection