
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
                    <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
                </div>
            </div>
            <div class="media-body flex-grow-1">
                <h3 class="mt-2">Talent care </h3>
            </div>
        </div>
       
        
    </div>
    @foreach ($jobs as $job)
                
    <div class="media d-flex">
        <div class="media-img-wrap flex-shrink-0 me-3">
            <div class="avatar avatar-online">
                <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
            </div>
        </div>
        <div class="media-body flex-grow-1">
            <h3 class="mt-2">{{ $job->client->name }} </h3>
        </div>
    </div>
    
    @endforeach
    <div class="chat-users-list">
        <div class="" style="overflow:visible;">
            <div class="chat-header border-bottom mb-4" style="z-index: -99;">
                {{-- <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                    <i class="material-icons">chevron_left</i>
                </a> --}}
                
                
                
            </div>
            
            <div class="card boxes-shadow motivation ">
                <div class="card-header border-0 ">
                    <div class="card-title">
                        
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
<!-- /Chat Left -->
