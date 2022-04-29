 <!-- Content Wrapper. Contains page content -->
 @extends('layouts.admin.master')
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
                      <h4>Pin Generate</h4>
                  </div>
              </div>
              <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active"><a href="javascript:void(0)">Pin Generate</a></li>
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
                <div class="row">
                  <button id='modalBtn' class="btn btn-primary" data-toggle="modal" data-target="#modal" data-whatever="@mdo">Add New</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-sm text-center table-bordered text-dark" id="datatable">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Pin</th>
                    <th>Customer Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
      </div><!-- /.container-fluid -->
      {{-- modal --}}
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Generate New Pin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <input type="hidden" id="id">
                <div class="row">
                  <div class="col-md-8 mr-auto ml-auto"> 
                    <div class="form-group ">
                      <label for="message-text" class="col-form-label">Customer:</label>
                      <select name="customer" id="customer" class="form-control border"></select>
                      <div class="invalid-feedback" id="customer_msg">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 mr-auto ml-auto"> 
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Pin Qantity:</label>
                      <input type="text" class="form-control" id="qantity" placeholder="Enter Pin Quantity">
                      <div class="invalid-feedback" id="qantity_msg">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="formRequest()">Save</button>
            </div>
          </div>
        </div>
      </div>
      {{-- endmodal --}}
    </section>
   
  @endsection

  @section('script')
  <script src="{{asset('storage/assets2/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('backend.pin_generate.internal-assets.js.script')
  
  @endsection