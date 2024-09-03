
@php
                    $siteinfo = App\Models\Siteinfo::find(1);
                @endphp

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset($siteinfo->fabicon) }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin Dashboard</h4>
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
                <div class="menu-title">Team</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.team') }}"><i class='bx bx-radio-circle'></i>Team Membar</a>
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
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">About</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.about') }}"><i class='bx bx-radio-circle'></i>About Info</a>
                </li>


            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.faq') }}"><i class='bx bx-radio-circle'></i>FAQ All</a>
                </li>


            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Testimonial</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.testimonial') }}"><i class='bx bx-radio-circle'></i>Testimonial All</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Pages</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.pages') }}"><i class='bx bx-radio-circle'></i>Pages All</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Contact</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.contact') }}"><i class='bx bx-radio-circle'></i>Contact All</a>
                </li>


            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Site Info</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.siteinfo') }}"><i class='bx bx-radio-circle'></i>Site Info  All</a>
                </li>


            </ul>
        </li>





    </ul>
    <!--end navigation-->
</div>
