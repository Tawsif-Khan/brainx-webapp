
<style>
    .motivation{
        margin-left: 15px;
        margin-right: 15px;
    }
</style>
<!-- Chat Left -->
<div class="chat-cont-left">
                        
    <div class="chat-header border-bottom mb-4" style="z-index: -99;">
        {{-- <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
            <i class="material-icons">chevron_left</i>
        </a> --}}
        <div class="media d-flex">
            <div class="media-img-wrap flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                    <img src="/assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
                </div>
            </div>
            <a href="{{ route('talent.care') }}">
            <div class="media-body flex-grow-1">
                <h3 class="mt-2">Talent care </h3>
            </div>
            </a>
        </div>
       
        
    </div>
    @foreach ($jobs as $job)
                
    <div class="chat-header border-bottom mb-4" style="z-index: -99;">
    <div class="media d-flex">
        <div class="media-img-wrap flex-shrink-0 me-3">
            <div class="avatar avatar-online">
                <img src="/assets/img/BrainX/AI-focused-profile.png" alt="User Image" class="avatar-img rounded-circle">
            </div>
        </div>
        <a href="{{ route('talent.job.detail', $job->job_id) }}">
        <div class="media-body flex-grow-1">
            <h3 class="mt-2">{{ $job->client->name }} </h3>
        </div>
    </a>
    </div>
    </div>
    @endforeach
    
    
</div>
<!-- /Chat Left -->
