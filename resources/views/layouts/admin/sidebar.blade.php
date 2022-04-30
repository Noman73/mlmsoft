
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            </li> -->
            {{-- <li><a class="has-arrow" href="{{URL::to('admin/customer')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span >Customer</span></a> --}}
                {{-- <ul aria-expanded="false"> --}}
                    {{-- <li><a href="index-2.html">Dashboard 1</a></li> --}}
                    {{-- <li><a href="index2.html">Dashboard 2</a></li> --}}
                {{-- </ul> --}}
            {{-- </li> --}}
            <li>
                <a href="{{URL::to('admin/package')}}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                class="nav-text">Package</span></a>
            </li>
            <li>
                <a href="{{URL::to('admin/customer')}}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                class="nav-text">Customer</span></a>
            </li>
            <li><a href="{{URL::to('admin/pin_generate')}}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                class="nav-text">Pin Generate</span></a></li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Charts</span></a>
                <ul aria-expanded="false">
                    <li><a href="chart-flot.html">Flot</a></li>
                    <li><a href="chart-morris.html">Morris</a></li>
                    <li><a href="chart-chartjs.html">Chartjs</a></li>
                    <li><a href="chart-chartist.html">Chartist</a></li>
                    <li><a href="chart-sparkline.html">Sparkline</a></li>
                    <li><a href="chart-peity.html">Peity</a></li>
                </ul>
            </li>
           
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="ti-power-off"></i>{{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
            </li>
        </ul>
    </div>
</div>



