<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>MLMSOFT</title>

    <!-- Icons font CSS-->

    <link href="{{asset('storage/registration/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('storage/registration/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
  
    <!-- Font special for pages-->

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('storage/registration/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('storage/registration/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('storage/registration/css/main.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('storage/assets2/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets2/vendor/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets2/vendor/toastr/css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets2/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <style>
      .form-control{
        width:100%;
      }
      .is-invalid{
        border: 1px solid red;
      }
      .invalid-feedback{
          color:red;
          font-size:12px;
      }
      .hide{
          display: none;
      }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <p class="alert" id="message" ></p>
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <input type="hidden" id='id'>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Full Name</label>
                                    <input class="input--style-4" type="text" name="name" id="name" placeholder="Enter Name">
                                    <div class="invalid-feedback hide" id="name_msg"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <input class="input--style-4" type="text" name="username" id="username" placeholder="Enter Username">
                                    <div class="invalid-feedback hide" id="username_msg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="text" name="email" id="email" placeholder="Enter Email">
                                    <div class="invalid-feedback hide" id="email_msg"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="number" name="phone" id="phone" placeholder="Enter Phone Number">
                                    <div class="invalid-feedback hide" id="phone_msg"></div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row row-space">
                          <div class="col-2">
                            <div class="input-group">
                                <label class="label">Refferance</label>
                                <div>
                                    <select name="subject" id="refference" class="form-control">
                                    </select>
                                    <div class="invalid-feedback hide" id="refference_msg"></div>
                                </div>
                            </div>
                          </div>
                          <div class="col-2">
                            <div class="input-group">
                                <label class="label">Uplink</label>
                                <div>
                                    <select name="subject" id="uplink" class="form-control">
                                    </select>
                                    <div class="invalid-feedback hide" id="uplink_msg"></div>
                                </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Position</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject" id="position">
                                            <option value="">Choose Option</option>
                                            <option value="0">Left</option>
                                            <option value="1">Right</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    <div class="invalid-feedback hide" id="position_msg"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Package</label>
                                    <div>
                                        <select name="subject" id="package" class="form-control">
                                        </select>
                                        <div class="invalid-feedback hide" id="package_msg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                              <div class="input-group">
                                  <label class="label">Password</label>
                                  <input class="input--style-4" type="password" name="password" id="password" placeholder="Enter Password">
                                  <div class="invalid-feedback hide" id="password_msg"></div>
                              </div>
                            </div>
                            <div class="col-2">
                              <div class="input-group">
                                  <label class="label">Confirm Password</label>
                                  <input class="input--style-4" type="password" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                                  <div class="invalid-feedback hide" id="confirm_password_msg"></div>

                              </div>
                            </div>
                          </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" onclick="event.preventDefault();formRequest()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('storage/registration/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('storage/registration/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('storage/registration/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('storage/registration/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('storage/registration/js/global.js')}}"></script>
    <script src="{{asset('storage/assets2/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('storage/assets2/vendor/axios/dist/axios.min.js')}}"></script>
    <script src="{{asset('storage/assets2/vendor/toastr/js/toastr.min.js')}}"></script>
    <script src="{{asset('storage/assets2/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    @include('frontend.registration.internal-assets.js.script')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->