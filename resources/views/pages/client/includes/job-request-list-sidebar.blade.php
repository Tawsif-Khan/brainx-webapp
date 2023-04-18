
<style>
    .motivation{
        margin-left: 15px;
        margin-right: 15px;
    }
    .btn-outline-primary{
        font-weight: 700;
    }
</style>
<!-- Chat Left -->
<div class="chat-cont-left">
    <div class="text-start pe-3">
        <a href="{{ route('client.job.new') }}">         
        <button class="btn btn-outline-primary box-shadow text-bold" type="button">Create a request</button>
        </a>
    </div>
    <div class="chat-users-list mt-4">
        <div class="" style="overflow:visible;">
            @php
                $selectedJob = isset($job) ? $job->job_id : 0;
            @endphp
            @foreach ($jobs as $job)
                
    <div class="media d-flex border-top pt-4 pb-4 @php echo($selectedJob == $job->job_id)? 'bg-primary ':'' @endphp  ">
        <div class="media-img-wrap flex-shrink-0 me-3">
            <div class=" ">
                {{-- <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle"> --}}
            </div>
        </div>
        <a href="{{ route('client.job.details', ['id'=>$job->job_id]) }}">
        <div class="media-body flex-grow-1">
            <h4 class="mt-2  @php echo($selectedJob == $job->job_id)? 'text-white ':'' @endphp">{{ $job->job_title }} </h4>
        </div>
        </a>
    </div>
    
    @endforeach
            
        </div>
    </div>
</div>
<!-- /Chat Left -->
