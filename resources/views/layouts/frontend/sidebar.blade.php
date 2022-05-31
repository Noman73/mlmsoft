<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="index.html">
                        <!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a></div>
                <li class="label">Main</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span
                            class="badge badge-primary">2</span> <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="index.html">Dashboard 1</a></li>
                        <li><a href="index1.html">Dashboard 2</a></li>
                    </ul>
                </li>

                <li><a href="app-event-calender.html"><i class="ti-calendar"></i> Calender </a></li>
                <li><a href="{{URL::to('/pin-verify')}}" aria-expanded="false"><i class="ti-email"></i> <span
                    class="nav-text">Pin Varify</span></a>
                </li>
                <li>
                    <a href="{{URL::to('/profile')}}" aria-expanded="false"><i class="ti-user"></i><span
                        class="nav-text">Profile</span></a>
                </li>
                <li>
                    <a href="{{URL::to('/tree'.'/'.auth()->user()->id)}}" aria-expanded="false"><i class="ti-user"></i><span
                        class="nav-text">Tree</span></a>
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
</div>
{{-- end sidebar --}}



