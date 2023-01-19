@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit About Section</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="#" enctype="multipart/form-data">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->

                            <!-- <input type="hidden" name="id" value=""/> -->
                        
                        <div class="row mb-3">
                            <label for="Title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "title" alt="Heading Title" type="text" value="{{$aboutslide->title}}">
                            </div>
                        </div>
                        
                        <input type="submit" class="btn btn-rounded btn-primary" value="Update Slide"/></br></br>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
    </div>
</div>

<!-- <script type="text/javascript">    
$(document).ready(function(){
        $('#home_slide').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showSelectedImg').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
        $('#portfolio_Logo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#portfolioImg').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script> -->
@endsection