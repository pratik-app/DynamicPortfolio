@extends('admin.admin_master')
@section('admin')
@php
$clients = App\Models\Contact::all();
@endphp
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Emails</h4>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th hidden>Client ID </th>
                                <th>Client Name</th>
                                <th>Client Email</th>
                                <th>Client Mobile Number</th>
                                <th>Client Message</th>
                                <th>Mail Status</th>
                                <th>Received on</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                            <tr style="cursor: pointer;"  id="TableData">
                                
                                <td>{{$client->client_fullName}}</td>
                                <td>{{$client->client_Email}}</td>
                                <td>{{$client->client_Mobile}}</td>
                                <td>{{$client->client_Message}}</td>
                                <td>
                                    @php
                                        switch($client->status)
                                        {
                                            case 0:
                                                echo "Unread";
                                            break;
                                            case 1:
                                                echo "Read";
                                            break;
                                            default:
                                                echo "Unread";
                                                break;
                                        }
                                    @endphp
                                    
                                </td>
                                <td>{{$client->created_at}}</td>
                                <td>
                                    <a href="{{route('contact.display',['id' =>$client->id])}}"><button class="btn btn-primary">View</button></a><br><br>
                                    <a href="{{route('contact.deleteLead',['id' =>$client->id])}}"><button class="btn btn-danger">Delete Lead</button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
<script>

</script>

@endsection