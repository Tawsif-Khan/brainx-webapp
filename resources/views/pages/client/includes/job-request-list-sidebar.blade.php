
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
    <div class="chat-users-list">
        <div class="" style="overflow:visible;">
            
            @foreach ($jobs as $job)
                
    <div class="media d-flex border-top pt-4 mt-4">
        <div class="media-img-wrap flex-shrink-0 me-3">
            <div class=" ">
                {{-- <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle"> --}}
            </div>
        </div>
        <a href="{{ route('client.job.details', ['id'=>$job->job_id]) }}">
        <div class="media-body flex-grow-1">
            <h3 class="mt-2">{{ $job->job_title }} </h3>
        </div>
        </a>
    </div>
    
    @endforeach
            
        </div>
    </div>
</div>
<!-- /Chat Left -->
