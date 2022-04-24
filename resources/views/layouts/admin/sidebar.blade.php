<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a></div>
            <ul>
                <li class="label">Main</li>
                <li><a href="{{URL::to('/home')}}"><i class="ti-calendar"></i> Dashboard </a></li>


                <li class="label">Apps</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>  Customer  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="chart-flot.html">Customer</a></li>
                    </ul>
                </li>
                <li><a href="app-event-calender.html"><i class="ti-calendar"></i> Calender </a></li>
                <li>
                    {{-- <a><i class="ti-power-off"></i> Logout</a> --}}
                
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
</div>
<!-- /# sidebar -->