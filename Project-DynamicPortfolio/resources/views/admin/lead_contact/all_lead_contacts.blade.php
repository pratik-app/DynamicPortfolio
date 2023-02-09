@extends('admin.admin_master')
@section('admin')
@php
$Leads = App\Models\Contact::all();
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
                                <th hidden>Lead ID </th>
                                <th>Lead Name</th>
                                <th>Lead Email</th>
                                <th>Lead Mobile Number</th>
                                <th>Lead Message</th>
                                <th>Mail Status</th>
                                <th>Received on</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                            <tr style="cursor: pointer;"  id="TableData">
                                
                                <td>{{$lead->lead_fullName}}</td>
                                <td>{{$lead->lead_Email}}</td>
                                <td>{{$lead->lead_Mobile}}</td>
                                <td>{{$lead->lead_Message}}</td>
                                <td>
                                    @php
                                        switch($lead->status)
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
                                <td>{{$lead->created_at}}</td>
                                <td>
                                    <a href="{{route('contact.display',['id' =>$lead->id])}}"><button class="btn btn-primary">View Leads</button></a><br><br>
                                    <a href="{{route('contact.deleteLead',['id' =>$lead->id])}}"><button class="btn btn-danger">Delete Lead</button></a>
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