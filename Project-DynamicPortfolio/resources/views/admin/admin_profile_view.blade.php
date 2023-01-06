@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make
                            up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-md-6 col-xl-3">

                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make
                            up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-md-6 col-xl-3">

                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make
                            up the bulk of the card's content.</p>
                    </div>
                </div>

            </div><!-- end col -->


            <div class="col-md-6 col-xl-3">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle font-14 text-muted">Support card subtitle</h6>
                    </div>
                    <img class="img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make
                            up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div><!-- end col -->
        </div>
    </div>
</div>

@endsection