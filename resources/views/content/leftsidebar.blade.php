<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div class="navbar-brand-box">
            <a href="index.html" class="logo">
                <i class="mdi mdi-alpha-x-circle"></i>
                <span>
                            Invoince
                        </span>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a  href="{{ route('dashboard') }}" class="waves-effect"><i class="feather-airplay"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('offers.index') }}" class="waves-effect"><i class="feather-users"></i><span>Offers</span></a>
                </li>
                <li>
                    <a href="{{ route('order.index') }}"><i class="feather-user"></i><span>Orders</span></a>
                </li>
                <li>
                    <a href="{{ route('customers.index') }}" class="waves-effect"><i class="fas fa-address-book"></i><span>Customers</span></a>
                </li>


                <li><a  href="{{ route('product.index') }}" class=" waves-effect"><i class="feather-aperture"></i><span>Product</span></a></li>
               <!-- <li><a  href="{{ route('html.index') }}" class=" waves-effect"><i class="feather-aperture"></i><span>Html</span></a></li>-->

                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect">
                        <i class="feather-log-out"></i><span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
