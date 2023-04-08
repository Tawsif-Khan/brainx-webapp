
<style>
    .motivation{
        margin-left: 15px;
        margin-right: 15px;
    }
</style>
<!-- Chat Left -->
<div class="chat-cont-left">
                        
        <button class="btn btn-outline-primary">Post a request</button>
    <div class="chat-users-list">
        <div class="" style="overflow:visible;">
            <div class="chat-header border-bottom mb-4" style="z-index: -99;">
                {{-- <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                    <i class="material-icons">chevron_left</i>
                </a> --}}
                
                
                
            </div>
            @foreach ($jobs as $job)
                
            <div class="card boxes-shadow motivation ">
                <div class="card-header border-0 ">
                    <div class="card-title">
                        {{ $job->job_title }}
                    </div>
                </div>
                
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- /Chat Left -->
