@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>  
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Google Charts Integration -->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Accordion example</h4>
                        <p class="card-title-desc">Extend the default collapse behavior to create an accordion.</p>
                        <div class="custom-accordion">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <ul id="draggablePanelList" class="list-unstyled">
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-dark " style="color:#ffffff; padding:10px;">Developers Team</div>
                                                <div class="panel-body">
                                                    <div class="card">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-md-4" style="padding:10px;" >
                                                                <img class="img-thumbnail rounded-circle avatar-xl"  src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Card title</h5>
                                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-primary" style="color:#ffffff; padding:10px;">Marketing Team</div>
                                                <div class="panel-body">
                                                <div class="card">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-md-4" style="padding:10px;" >
                                                                <img class="img-thumbnail rounded-circle avatar-xl"  src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Card title</h5>
                                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-warning" style="color:#ffffff ;padding:10px;">Support Team</div>
                                                <div class="panel-body">
                                                <div class="card">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-md-4" style="padding:10px;" >
                                                                <img class="img-thumbnail rounded-circle avatar-xl"  src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Card title</h5>
                                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-danger" style="color:#ffffff; padding:10px;">Research & Development Team</div>
                                                <div class="panel-body">
                                                <div class="card">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-md-4" style="padding:10px;" >
                                                                <img class="img-thumbnail rounded-circle avatar-xl"  src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Card title</h5>
                                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-success" style="color:#ffffff ;padding:10px;">Analyst Team</div>
                                                <div class="panel-body">
                                                <div class="card">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-md-4" style="padding:10px;">
                                                                <img class="img-thumbnail rounded-circle avatar-xl" src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Card title</h5>
                                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script>
   
        
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
    
</script>
@endsection