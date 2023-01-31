@php
$id = Auth::user()->id;
$adminData = App\Models\User::find($id);
@endphp

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{(!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{$adminData->name}}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-edit-box-line"></i>
                        <span>Modify Portfolio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('home.slide')}}">Home Section</a></li>
                        <li><a href="{{route('about.slide')}}">About Section</a></li>
                        <li><a href="#">Service Section</a></li>
                        <li><a href="#">Portfolio/Work Section</a></li>
                        <li><a href="#">Partners Section</a></li>
                        <li><a href="#">FeedBack Section</a></li>
                        <li><a href="#">Block Section</a></li>
                        <li><a href="#">Contact Section</a></li>
                        <li><a href="#">Footer</a></li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Landing Pages Leads</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('contact.inbox')}}">Leads</a></li>
                    </ul>
                </li>
                <li class="menu-title">Employment</li>                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Account Services</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Add New Employee</a></li>
                        <li><a href="#">Timeline</a></li>
                        <li><a href="#">Directory</a></li>
                        <li><a href="#">Invoice</a></li>
                        <li><a href="#">Error 404</a></li>
                        <li><a href="#">Error 500</a></li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>


        </div>
        <!-- Sidebar -->
    </div>
</div>