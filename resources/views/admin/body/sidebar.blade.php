<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div> --}}
        <div>
            <h4 class="logo-text">Grow Ever</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">HomePage</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.home.info') }}"><i class='bx bx-radio-circle'></i>HomeInfo</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Services</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.services') }}"><i class='bx bx-radio-circle'></i>Services</a>
                </li>

            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.blog.category') }}"><i class='bx bx-radio-circle'></i>Blog Category</a>
                </li>
                <li> <a href="{{ route('admin.portfolio.category') }}"><i class='bx bx-radio-circle'></i>Portfolio
                        Category</a>
                </li>

            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Blog</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.blog.all') }}"><i class='bx bx-radio-circle'></i>Blog All</a>
                </li>


            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Portfolio</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.portfolio.all') }}"><i class='bx bx-radio-circle'></i>Portfolio All</a>
                </li>


            </ul>
        </li>


       

    </ul>
    <!--end navigation-->
</div>
