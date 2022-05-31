 <!-- Content Wrapper. Contains page content -->
 @extends('layouts.admin.master')
 @section('link')
 <link rel="stylesheet" href="{{asset('storage/assets/vendor/datatables/css/jquery.dataTables.min.css')}}">
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
    <div class="content-wrap">
      <div class="main">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1>Profile </h1>
                          </div>
                      </div>
                  </div>
                  <!-- /# column -->
                  <div class="col-lg-4 p-l-0 title-margin-left">
                      <div class="page-header">
                          <div class="page-title">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                  <li class="breadcrumb-item active">Home</li>
                              </ol>
                          </div>
                      </div>
                  </div>
                  <!-- /# column -->
              </div>
              <!-- /# row -->
              <section id="main-content">
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
                              <th>Name</th>
                              <th>Adress</th>
                              <th>Mobile</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    {{-- modal --}}
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <input type="hidden" id="id">
                              <div class="text-center">
                                  <img id="imagex" src="{{asset('storage/admin-lte/dist/img/avatar5.png')}}" class="d-flex image-upload" style="height:100px;width:100px;">
                                  <input class="d-none" type="file" id="file" name="" onchange="readURL(this)">
                                  <label for="file"  class="file">Choose</label>
                                  <div id="photo_msg" class="invalid-feedback">
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-8 mr-auto ml-auto">
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                    <div class="invalid-feedback" id="name_msg">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mr-auto ml-auto">
                                  <div class="form-group">
                                    <label for="recipient-email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                    <div class="invalid-feedback" id="email_msg">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mr-auto ml-auto"> 
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">City:</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City">
                                    <div class="invalid-feedback" id="city_msg">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mr-auto ml-auto"> 
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Post Code:</label>
                                    <input type="text" class="form-control" id="post_code" placeholder="Enter Post Code">
                                    <div class="invalid-feedback" id="post_code_msg">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mr-auto ml-auto"> 
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Adress:</label>
                                    <input type="text" class="form-control" id="adress" placeholder="Enter Adress">
                                    <div class="invalid-feedback" id="adress_msg">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mr-auto ml-auto">
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Phone:</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number">
                                    <div class="invalid-feedback" id="phone_msg">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mr-auto ml-auto">
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">NID:</label>
                                    <input type="number" class="form-control" id="nid" placeholder="Enter NID Number">
                                    <div class="invalid-feedback" id="nid_msg">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mr-auto ml-auto">
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Birth Date:</label>
                                    <input type="text" class="form-control" id="dateofbirth" placeholder="Enter Date Of Birth">
                                    <div class="invalid-feedback" id="dateofbirth_msg">
                                    </div>
                                  </div>
                                </div>
                                {{-- <div class="password"> --}}
                                  <div class="col-md-8 mr-auto ml-auto password">
                                    <div class="form-group">
                                      <label for="message-text" class="col-form-label">Password:</label>
                                      <input type="password" class="form-control" id="password" placeholder="Enter Password">
                                      <div class="invalid-feedback" id="password_msg">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-8 mr-auto ml-auto password">
                                    <div class="form-group">
                                      <label for="message-text" class="col-form-label">Confirm Password:</label>
                                      <input type="password" class="form-control" id="password-confirmation" placeholder="Enter Confirm Password">
                                      <div class="invalid-feedback" id="password-confirmation_msg">
                                      </div>
                                    </div>
                                  </div>
                                {{-- </div> --}}
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
                    {{--  --}}
                </div><!-- /.container-fluid -->
                
              </section>
    <!-- /.content-header -->
          </div>
      </div>
    </div>
   
  @endsection

  @section('script')
  <script src="{{asset('storage/assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('storage/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('backend.customer.internal-assets.js.script')
  
  @endsection