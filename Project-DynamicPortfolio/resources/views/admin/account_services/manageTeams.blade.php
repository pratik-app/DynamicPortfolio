@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Google Charts Integration -->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Teams</h2>
                        <p class="card-title-desc">Dragg Teams to Sort</p>
                        <div class="card">
                            <div class="card-body">
                                <ul id="draggablePanelList" class="list-unstyled">
                                    <li class="panel">
                                        <div class="panel-heading bg-info " style="color:#ffffff; padding:10px; cursor: move;">Developers Team</div>
                                        <div class="panel-body">
                                            <div class="card">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-md-4" style="padding:10px;">
                                                        <img class="img-thumbnail rounded-circle avatar-xl" src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="Card image">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Team Details</h5>
                                                            <p class="card-text">
                                                            <div>
                                                                <img src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                            </div>
                                                            </p>
                                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="panel">
                                        <div class="panel-heading bg-primary" style="color:#ffffff; padding:10px; cursor: move;">Marketing Team</div>
                                        <div class="panel-body">
                                            <div class="card">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-md-4" style="padding:10px;">
                                                        <img class="img-thumbnail rounded-circle avatar-xl" src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="Card image">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Team Details</h5>
                                                            <p class="card-text">
                                                            <div>
                                                                <img src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                            </div>
                                                            </p>
                                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="panel">
                                        <div class="panel-heading bg-warning" style="color:#ffffff ;padding:10px; cursor: move;">Support Team</div>
                                        <div class="panel-body">
                                            <div class="card">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-md-4" style="padding:10px;">
                                                        <img class="img-thumbnail rounded-circle avatar-xl" src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="Card image">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Team Details</h5>
                                                            <p class="card-text">
                                                            <div>
                                                                <img src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                            </div>
                                                            </p>
                                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="panel">
                                        <div class="panel-heading bg-danger" style="color:#ffffff; padding:10px;cursor: move;">Research & Development Team</div>
                                        <div class="panel-body">
                                            <div class="card">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-md-4" style="padding:10px;">
                                                        <img class="img-thumbnail rounded-circle avatar-xl" src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="Card image">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Team Details</h5>
                                                            <p class="card-text">
                                                            <div>
                                                                <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">

                                                            </div>
                                                            </p>
                                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="panel">
                                        <div class="panel-heading bg-success" style="color:#ffffff ;padding:10px;cursor: move;">Analyst Team</div>
                                        <div class="panel-body">
                                            <div class="card">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-md-4" style="padding:10px;">
                                                        <img class="img-thumbnail rounded-circle avatar-xl" src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Team Details</h5>
                                                            <p class="card-text">
                                                            <div>
                                                                <img src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                                <img src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="avatar-5" class="rounded-circle avatar-sm" style="cursor:pointer">
                                                            </div>
                                                            </p>
                                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-title">Analysis</h2>
                    </div>
                </div>                
                <div class="card">
                    <div class="card-body">
                        <ul id="draggablePanelList2" class="list-unstyled">
                            <li class="panel">
                                <div class="panel-heading bg-info " style="color:#ffffff; padding:10px; cursor: move;">Team Progress</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Current Projects</h5>
                                            <p class="card-text">ifodjsoidjsfoidsfjiodfsjio</p>
                                        <div>
                                    </div>
                                </div>                        
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-primary " style="color:#ffffff; padding:10px; cursor: move;">Recently Completed Projects</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Team Details</h5>
                                                <p class="card-text">ifodjsoidjsfoidsfjiodfsjio</p>
                                        <div>
                                    </div>
                                </div>                        
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-warning " style="color:#ffffff; padding:10px; cursor: move;">Upcoming Projects</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Team Details</h5>
                                                <p class="card-text">ifodjsoidjsfoidsfjiodfsjio</p>
                                        <div>
                                    </div>
                                </div>                        
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-title">Add OR Remove Teams</h2>
                    </div>
                </div>                
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Remove Teams</div>
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="Card image"> Developers Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="Card image"> R & D Team
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="Card image"> Marketing Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image"> Analyst Team
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="Card image"> Support Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="padding: 20px;">
                            <i class="fas fa-plus-square"></i> Add New Team
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

</div>
<script>
    $(".btn-danger").click(function(){
        confirm("This Team Will Be Deleted | Are you Sure You want to Continue?")
    })
    jQuery(function($) {
        var panelList = $('#draggablePanelList');

        panelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });

    jQuery(function($) {
        var panelList2 = $('#draggablePanelList2');

        panelList2.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList2).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });
    jQuery(function($) {
        var sidepanelList = $('#draggablePanelList2');

        sidepanelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });

    jQuery(function($) {
        var sidepanelList2 = $('#draggablePanelList2');

        sidepanelList2.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList2).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });
</script>
@endsection