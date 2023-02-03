@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
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
                                        <div class="card-title "><b>Manage Teams</b></div>
                                        <ul id="draggablePanelList" class="list-unstyled">
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-dark" style="color:#ffffff">You can drag this panel.</div>
                                                <div class="panel-body">Content here ...</div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-primary" style="color:#ffffff">You can drag this panel too.</div>
                                                <div class="panel-body">More content here...</div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-warning" style="color:#ffffff">You can drag this panel too.</div>
                                                <div class="panel-body">More blah content here...</div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-danger" style="color:#ffffff">You can drag this panel too.</div>
                                                <div class="panel-body">Another content panel here...</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title "><b>Manage Teams</b></div>
                                        <ul id="draggablePanelList" class="list-unstyled">
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-dark" style="color:#ffffff">You can drag this panel.</div>
                                                <div class="panel-body">Content here ...</div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-primary" style="color:#ffffff">You can drag this panel too.</div>
                                                <div class="panel-body">More content here...</div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-warning" style="color:#ffffff">You can drag this panel too.</div>
                                                <div class="panel-body">More blah content here...</div>
                                            </li>
                                            <li class="panel" style="cursor: move;">
                                                <div class="panel-heading bg-danger" style="color:#ffffff">You can drag this panel too.</div>
                                                <div class="panel-body">Another content panel here...</div>
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