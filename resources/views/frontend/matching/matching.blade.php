 <!-- Content Wrapper. Contains page content -->
 @extends('layouts.frontend.master')
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
 <div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-8 p-r-0 title-margin-right">
                  <div class="page-header">
                      <div class="page-title">
                          <h1>Matching Commision </h1>
                      </div>
                  </div>
              </div>
              <!-- /# column -->
              <div class="col-lg-4 p-l-0 title-margin-left">
                  <div class="page-header">
                      <div class="page-title">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Matching Commision</li>
                          </ol>
                      </div>
                  </div>
              </div>
              <!-- /# column -->
          </div>

          <section id="main-content">
            <div class="container-fluid">

              <div class="card ">
                  <div class="card-header">
                    <div class="container-fluid">
                      <div class="row">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-sm text-center table-bordered text-dark" id="datatable">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Total Match</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div><!-- /.container-fluid -->
            {{-- endmodal --}}
          </section>
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
  @include('frontend.matching.internal-assets.js.script')
  
  @endsection