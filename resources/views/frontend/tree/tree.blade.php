@extends('layouts.frontend.master')
@section('content')
@section('link')
<style>
/*----------------genealogy-scroll----------*/
.genealogy-scroll::-webkit-scrollbar {
    width: 5px;
    height: 8px;
}
.genealogy-scroll::-webkit-scrollbar-track {
    border-radius: 10px;
    background-color: #e4e4e4;
}
.genealogy-scroll::-webkit-scrollbar-thumb {
    background: #212121;
    border-radius: 10px;
    transition: 0.5s;
}
.genealogy-scroll::-webkit-scrollbar-thumb:hover {
    background: #d5b14c;
    transition: 0.5s;
}
/*----------------genealogy-tree----------*/
.genealogy-body{
    white-space: nowrap;
    overflow-y: hidden;
    padding: 50px;
    min-height: 500px;
    padding-top: 10px;
    text-align: center;
}
.genealogy-tree{
  display: inline-block;
}
.genealogy-tree ul {
    padding-top: 20px; 
    position: relative;
    padding-left: 0px;
    display: flex;
    justify-content: center;
}
.genealogy-tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;
}
.genealogy-tree li::before, .genealogy-tree li::after{
    content: '';
    position: absolute; 
  top: 0; 
  right: 50%;
    border-top: 2px solid #ccc;
    width: 50%; 
  height: 18px;
}
.genealogy-tree li::after{
    right: auto; left: 50%;
    border-left: 2px solid #ccc;
}
.genealogy-tree li:only-child::after, .genealogy-tree li:only-child::before {
    display: none;
}
.genealogy-tree li:only-child{ 
    padding-top: 0;
}
.genealogy-tree li:first-child::before, .genealogy-tree li:last-child::after{
    border: 0 none;
}
.genealogy-tree li:last-child::before{
    border-right: 2px solid #ccc;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.genealogy-tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}
.genealogy-tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 2px solid #ccc;
    width: 0; height: 20px;
}
.genealogy-tree li a{
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}

.genealogy-tree li a:hover+ul li::after, 
.genealogy-tree li a:hover+ul li::before, 
.genealogy-tree li a:hover+ul::before, 
.genealogy-tree li a:hover+ul ul::before{
    border-color:  #fbba00;
}

/*--------------memeber-card-design----------*/
.member-view-box{
    padding:0px 30px;
    text-align: center !important;
    border-radius: 4px;
    position: relative;
}
.member-view-box h6{
  text-align: center;
}
.member-image{
    width: 100px;
    position: relative;
}
.member-image img{
    width: 60px;
    height: 60px;
    border-radius: 50%;
  background-color :#000;
  z-index: 1;
}
.member-details{
  text-align: center;
}
.status i{
  font-size: 18px;
  margin-top: -30px !important;
}
 </style>
@endsection
<div class="content-wrap">
  <div class="main">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-8 p-r-0 title-margin-right">
                  <div class="page-header">
                      <div class="page-title">
                          <h1>Tree View</h1>
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
              <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="tree">
                          <div class="body genealogy-body genealogy-scroll">
                          <div class="genealogy-tree">
                              <ul>
                                  <li>
                                      <a href="">
                                          <div class="member-view-box">
                                              <div class="member-image">
                                                  <img src="{{asset('storage/img/man.png')}}" alt="Member">
                                                  <div class="status {{($owner==null ? 'text-danger' : 'text-success' )}}">
                                                    <i class="fas {{($owner==null? 'fa-times-circle' : 'fa-check-circle' )}}"></i>
                                                  </div>
                                                  <div class="member-details">
                                                      <h6>{{($owner==null? 'unknown' : $owner->username )}}</h6>
                                                  </div>
                                              </div>
                                          </div>
                                      </a>
                                      <ul class="active">
                                        {{-- level 1 left side --}}
                                          <li>
                                              <a href="{{($left==null? '' : URL::to('tree/'.$left->id))}}">
                                                  <div class="member-view-box">
                                                      <div class="member-image">
                                                          <img src="{{asset('storage/img/man.png')}}" alt="Member">
                                                          <div class="status {{($left==null? 'text-danger' : 'text-success' )}}">
                                                            <i class="fas {{($left==null? 'fa-times-circle' : 'fa-check-circle' )}}"></i>
                                                           </div>
                                                          <div class="member-details">
                                                              <h6>{{($left==null? 'unknown' : $left->username )}}</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </a>
                                              <ul class="active">
                                                {{-- level 2 left hand left side --}}
                                                <li>
                                                    <a href="{{($second_level_left_hand_left_side==null? '' : URL::to('tree/'.$second_level_left_hand_left_side->id))}}">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{asset('storage/img/man.png')}}" alt="Member">
                                                                <div class="status {{($second_level_left_hand_left_side==null? 'text-danger' : 'text-success' )}}">
                                                                  <i class="fas {{($second_level_left_hand_left_side==null? 'fa-times-circle' : 'fa-check-circle' )}}"></i>
                                                                </div>
                                                                <div class="member-details">
                                                                    <h6>{{($second_level_left_hand_left_side==null? 'unknown' : $second_level_left_hand_left_side->username )}}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                 </li>
                                                 {{-- level 2 right hand right --}}
                                                 <li>
                                                      <a href="{{($second_level_left_hand_right_side==null? '' : URL::to('tree/'.$second_level_left_hand_right_side->id))}}">
                                                          <div class="member-view-box">
                                                              <div class="member-image">
                                                                  <img src="{{asset('storage/img/man.png')}}" alt="Member">
                                                                  <div class="status {{($second_level_left_hand_right_side==null? 'text-danger' : 'text-success' )}}">
                                                                    <i class="fas {{($second_level_left_hand_right_side==null? 'fa-times-circle' : 'fa-check-circle' )}}"></i>
                                                                  </div>
                                                                  <div class="member-details">
                                                                      <h6>{{($second_level_left_hand_right_side==null? 'unknown' : $second_level_left_hand_right_side->username )}}</h6>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </li>
                                              </ul>
                                          </li>
                                          {{-- level 1 right --}}
                                          <li>
                                              <a href="{{($right==null? '' : URL::to('tree/'.$right->id))}}">
                                                  <div class="member-view-box">
                                                      <div class="member-image">
                                                          <img src="{{asset('storage/img/man.png')}}" alt="Member">
                                                          <div class="status {{($right==null? 'text-danger' : 'text-success' )}}">
                                                            <i class="fas {{($right==null? 'fa-times-circle' : 'fa-check-circle' )}}"></i>
                                                           </div>
                                                          <div class="member-details">
                                                              <h6>{{($right==null? 'unknown' : $right->username )}}</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </a>
                                              <ul class="active">
                                                {{-- level 2 right hand left side --}}
                                                <li>
                                                    <a href="{{($second_level_right_hand_left_side==null? '' : URL::to('tree/'.$second_level_right_hand_left_side->id))}}">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{asset('storage/img/man.png')}}" alt="Member">
                                                                <div class="status {{($second_level_right_hand_left_side==null? 'text-danger' : 'text-success' )}}">
                                                                  <i class="fas {{($second_level_right_hand_left_side==null? 'fa-times-circle' : 'fa-check-circle' )}}"></i>
                                                                </div>
                                                                <div class="member-details">
                                                                    <h6>{{($second_level_right_hand_left_side==null? 'unknown' : $second_level_right_hand_left_side->username )}}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                {{-- level 2 right hand right side--}}
                                                <li>
                                                    <a href="{{($second_level_right_hand_right_side==null? '' : URL::to('tree/'.$second_level_right_hand_right_side->id))}}">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{asset('storage/img/man.png')}}" alt="Member">
                                                                <div class="status {{($second_level_right_hand_right_side==null? 'text-danger' : 'text-success' )}}">
                                                                  <i class="fas {{($second_level_right_hand_right_side==null? 'fa-times-circle' : 'fa-check-circle' )}}"></i>
                                                                </div>
                                                                <div class="member-details">
                                                                    <h6>{{($second_level_right_hand_right_side==null? 'unknown' : $second_level_right_hand_right_side->username )}}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                              </ul>
                                          </li>
                                      </ul>
                                  </li>
                              </ul>
                          </div>
                      </div>
                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- /.row (main row) -->
                  </div><!-- /.container-fluid -->
          </section>

@endsection