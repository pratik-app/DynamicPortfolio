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
                        <li><a href="{{route('accountservices.empdashboard')}}">Employees Dashboard</a></li>
                        <li><a href="{{route('accountservices.empdesk')}}">Employee Hub</a></li>
                        <li><a href="{{route('accountservices.manageTeam')}}">Manage Teams</a></li>                        
                        <li><a href="{{route('accountservices.payrollDashboard')}}">Pay Roles</a></li>
                    </ul>
                </li>
                
                <li class="menu-title">Essential Hub</li>  
                <li>
                    <a href="{{route('projects.showprojecthub')}}" class="waves-effect">
                        <i class="fas fa-project-diagram"></i>
                        <span>Project Hub</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('clients.showclientshub')}}" class="waves-effect">
                        <i class="fas fa-user-tie"></i>
                        <span>Client Hub</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Company Jobs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('compnayjobs.createnewopp')}}">Create New Posting</a></li>
                        <li><a href="#">Job Applications</a></li>
                        <li><a href="#">Hiring Desk</a></li>                        
                        <li><a href="#">Recruiters Hub</a></li>
                    </ul>
                </li>              
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class=" fas fa-address-card"></i>
                        <span>Company Records</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Income Record</a></li>
                        <li><a href="#">Expense Record</a></li>
                        <li><a href="#">Property Record</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>