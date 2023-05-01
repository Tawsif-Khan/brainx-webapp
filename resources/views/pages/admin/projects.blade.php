@extends('pages.admin.layouts.app')

@section('content')

<style>
    
.table td, .table th {
    white-space: normal;
}
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3 class="page-title">Projects</h3>
        </div>
        
    </div>
</div>
<!-- /Page Header -->

<!-- Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox">
                                              <input type="checkbox" class="form-check-input" id="select-all">
                                              <label class="form-check-label" ></label>
                                            </div>
                                        </th>
                                        <th>Job title</th>
                                        <th>Job description</th>	
                                        <th>Job type </th>	
                                        <th>Created Date</th>	
                                        
                                        <th>Client</th>	
                                        <th>Talent</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox">
                                              <input type="checkbox" class="form-check-input" >
                                              <label class="form-check-label" ></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div >
                                                {{-- <a href="profile.html"><img class="avatar-img rounded-circle " src="{{ $user->talent->photo }}" alt="User Image"></a> --}}
                                                <div>
                                                    <h5><a href="#">{{ $job->job_title  }}</a></h5>
                                                
                                                </div>	
                                            </div>
                                        </td>
                                        <td class="description">{!! $job->job_description !!}</td>
                                        
                                        <td>
                                            {{ $job->job_type }}
                                        </td>
                                        <td>{{ $job->created_at }}</td>
                                        <td><div>
                                            @if(isset($job->client))
                                            <h5><a href="#">{{ $job->client->name  }}</a></h5>
                                            <p>	{{ $job->client->email }}</p>
                                            @endif
                                        </div>	</td>
                                        <td>
                                            <div>
                                                @if($job->talent)
                                                <h5><a href="#">{{ $job->talent->name  }}</a></h5>
                                                <p>	{{ $job->talent->email }}</p>
                                                @else
                                                - 
                                                @endif
                                            </div>	
                                        </td>
                                        <td class="text-end three-dots">

                                            <a data-bs-toggle="modal" data-bs-target="#project-{{ $job->job_id }}" class="btn btn-primary">View</a>
                                            @include('pages.admin.includes.modals.my-request');
                                           
                                        </td>
                                    </tr>
                                                          
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
    
</div>

@endsection