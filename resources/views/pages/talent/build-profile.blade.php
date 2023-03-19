@extends('app')

@section('content')

<style>
    .skills{
        border-bottom: solid 1px rgb(217, 207, 207);
    }
.prog-lang .form-group{
    margin: 20px;
}
.skills .form-group label{
    margin-left: 5px;
}
.chat-cont-right{
    /* height: 100%; */
    /* overflow-y: hidden; */
}

ul li{
    padding: 10px 0px;
}
</style>
<form action="{{ route('submit.profile') }}" method="POST">
    @csrf
<!-- Content -->
<div class="content ">
    <div class="container-fluid">
        <h2 class="ps-3">My Clients</h2>
        <div class="row">
            
            <div class="col-md-12">
                
                <div class="chat-window">
                 
                    <!-- Chat Left -->
                    <div class="chat-cont-left">
                        
                        <div class="chat-users-list">
                            <div class="" style="overflow:visible;">
                                <div class="chat-header border-bottom mb-4">
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
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            Get matched to clients
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        Based on your experience and skills in AI, you will be matched to suitable projects and clients by our experts
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                           Flexible work
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        Multiple flexible engagements: full-time contract, part-time, hourly, project based. Work anywhere remotely
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            AI-focused profile
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        BrainX help you create a standout profile showcasing your experience & skills in AI
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            Safe transaction
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        Start working with clients only after they escrow payment to BrainX
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Chat Left -->
                
                    <!-- Chat Right -->
                    <div class="chat-cont-right chat-scrol">
                        <div class="">

                            <div class="chat-header border-0">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="material-icons">chevron_left</i>
                                </a>
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0">
                                        <div class="avatar avatar-online">
                                            <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="user-name">Talent care </div>
                                        <div><strong>1/5. Import</strong></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center mt-4 mb-4">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary " data-bs-toggle="modal" data-bs-target="#add-category">
                                        Import from Linkedin
                                    </a>

                                </div>
                            </div>
                           
                        </div>
                        <div class="section-2 ">

                            <div class="chat-header border-0">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="material-icons">chevron_left</i>
                                </a>
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0">
                                        <div class="avatar avatar-online">
                                            <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="user-name">Talent care </div>
                                        <div><strong>2/5. Intro</strong></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="  card m-2 border-0  col-md-12 ">
                                
                                    <div class="card-body text-start">
                                        <div class="row">

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="">
                                                    What is your legal full name?
                                                </label>
                                                <input type="text" name="name" class="form-control" onkeyup="setValuetoProfile('name', this.value)" value="{{ $user->name}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    Which country are you from?
                                                </label>
                                                @include('includes.countries')
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    What is your standout job title? (ex: AI engineer...)
                                                </label>
                                                <input type="text" name="standout_job_title" class="form-control" onkeyup="setValuetoProfile('position', this.value)"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    How many years of AI experience do you have?
                                                </label>
                                                <input type="number" name="experience" class="form-control" onkeyup="setValuetoProfile('experience', this.value)"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 text-center">
                                            <div class="avatar avatar-xxl">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{ $user->talent->photo }}">
											</div>
                                        </div>
                                    </div>

                                    </div>
                                
                                <div class="card-footer border-0 ">
                                    <button type="button" class="btn btn-primary" onclick="showSection(document.getElementsByClassName('section-3')[0], this);"> Next</button>

                                </div>
                            </div>
                        </div>
                        <div class="section-3 d-none">

                            <div class="chat-header border-0">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="material-icons">chevron_left</i>
                                </a>
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0">
                                        <div class="avatar avatar-online">
                                            <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="user-name">Talent care </div>
                                        <div><strong>3/5. Bio</strong></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="  card m-2 border-0  col-md-6 offset-md-3">
                                
                                    <div class="card-body text-start">
                                        <div class="form-group">
                                            <textarea name="bio"  cols="80" rows="5" onkeyup="setValuetoProfile('bio', this.value)" placeholder="Please briefly summarize your professional experience in AI"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">
                                                Your availability to work on BrainX
                                            </label>
                                            <select name="hours_per_week" id="" class="form-control" onchange="setValuetoProfile('hours_of_week', this.value)">
                                                <option value="0">Not available for now</option>
                                                <option value="10">10 hours/week</option>
                                                <option value="15">15 hours/week</option>
                                                <option value="20">20 hours/week</option>
                                                <option value="25">25 hours/week</option>
                                                <option value="30">30 hours/week</option>
                                                <option value="35">35 hours/week</option>
                                                <option value="40">40 hours/week</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                <div class="card-footer border-0">
                                    <button class="btn btn-primary" type="button" onclick="showSection(document.getElementsByClassName('section-4')[0], this);"> Next</button>

                                </div>
                            </div>
                        </div>
                        <div class="section-4 d-none">

                            <div class="chat-header border-0">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="material-icons">chevron_left</i>
                                </a>
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0">
                                        <div class="avatar avatar-online">
                                            <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="user-name">Talent care </div>
                                        <div><strong>4/5. AI skills</strong></div>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="  card m-2 border-0  col-md-12 ">
                               
                                    <div class="card-body text-start">

                                        @include('includes.ai-skill')
                                        
                                    
                                    </div>
                                <div class="card-footer border-0">
                                    <button class="btn btn-primary" type="button" onclick="showSection(document.getElementsByClassName('section-5')[0], this);"> Next</button>

                                </div>
                            </div>
                        </div>
                        <div class="section-5 d-none">
                            <div class="chat-header border-0">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="material-icons">chevron_left</i>
                                </a>
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0">
                                        <div class="avatar avatar-online">
                                            <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle border-1">
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="user-name">Talent care </div>
                                        <div><strong>5/5. Hourly rate</strong></div>
                                    </div>
                                </div>    
                            </div>
                            <div class="  card m-2 border-0  col-md-12 ">
                                
                                    <div class="card-body text-start">
                                        
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Your hourly rate</h4>
                                                <p>
                                                    Set the rate based on your level of experience, skills and location. We may review and recommend you a reasonable rate. 
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
													<span class="input-group-text">$</span>
													<input type="number" name="hourly_rate" class="form-control" onkeyup="setValuetoProfile('hourly_rate', this.value)"/>
													<span class="input-group-text">/hour</span>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="card-footer border-0">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#profile"> Preview my profile</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Chat Right -->
                    
                </div>				
            </div>													
        </div>					
    </div>
</div>	
<!-- /Page Content -->

@include('pages.talent.profile-modal-view')
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="add-category">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content pb-5 pt-5">

					<!-- Modal Header -->
					<div class="modal-header text-center">
						<h4 class="modal-title text-center w-100">Upload your Linkedin profile</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body pb-5 pt-5">
						<form>
                            <div class="  card  border-0 text-center col-md-12 ">
                                   
                                    <div class="card-body text-start">
                                        <ul>
                                            <li>
                                                Step 1: Save your LinkedIn profile as a PDF
                                            </li>
                                            <li>
                                                Step 2: Upload your LinkedIn PDF
                                            </li>
                                        </ul>
                                        <div>
                                            <label for="cv" class="btn btn-outline-primary ">
                                            <input type="file" name="resume" class="btn  d-none" id="cv"/>
                                            Upload Linkedin PDF
                                        </label>
                                        </div>
                                    </div>
                                <div class="card-footer border-0  mt-4 col-md-8 offset-md-2 ">
                                    <button type="button" data-bs-dismiss="modal" class="btn mt-4 btn-primary w-100" onclick="showSection(document.getElementsByClassName('section-2')[0], this);"> Next</button>

                                </div>
                            </div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->

</form>

@endsection

@section('custom-js')


<script>
    (function($) {
  var CheckboxDropdown = function(el) {
    var _this = this;
    this.isOpen = false;
    this.areAllChecked = false;
    this.$el = $(el);
    this.$label = this.$el.find('.dropdown-label');
    this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
    this.$inputs = this.$el.find('[type="checkbox"]');
    
    this.onCheckBox();
    
    this.$label.on('click', function(e) {
      e.preventDefault();
      _this.toggleOpen();
      
    });
    
    this.$checkAll.on('click', function(e) {
      e.preventDefault();
      _this.onCheckAll();
    });
    
    this.$inputs.on('change', function(e) {
      _this.onCheckBox();
    });
  };
  
  CheckboxDropdown.prototype.onCheckBox = function() {
    this.updateStatus();
  };
  
  CheckboxDropdown.prototype.updateStatus = function() {
    var checked = this.$el.find(':checked');
    
    this.areAllChecked = false;
    this.$checkAll.html('Check All');
    
    if(checked.length <= 0) {
      this.$label.html('Select Options');
    }
    else if(checked.length === 1) {
    //   this.$label.html(checked.parent('label').text());
    }
    else if(checked.length === this.$inputs.length) {
      this.$label.html('All Selected');
      this.areAllChecked = true;
      this.$checkAll.html('Uncheck All');
    }
    else {
    //   this.$label.html(checked.length + ' Selected');
    }
  };
  
  CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
    if(!this.areAllChecked || checkAll) {
      this.areAllChecked = true;
      this.$checkAll.html('Uncheck All');
      this.$inputs.prop('checked', true);
    }
    else {
      this.areAllChecked = false;
      this.$checkAll.html('Check All');
      this.$inputs.prop('checked', false);
    }
    
    this.updateStatus();
  };
  
  CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
    var _this = this;
    
    if(!this.isOpen || forceOpen) {
       this.isOpen = true;
       this.$el.addClass('on');
      $(document).on('click', function(e) {
        if(!$(e.target).closest('[data-control]').length) {
         _this.toggleOpen();
        }
      });
      
    }
    else {
      this.isOpen = false;
      
      this.$el.removeClass('on');
      $(document).off('click');
    }
  };
  
  var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
  for(var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
    new CheckboxDropdown(checkboxesDropdowns[i]);
  }
})(jQuery);


function addToList(element){

if(element.checked){
    $('#skill-lists').append($('<li class="list-inline-item btn btn-dark">'+element.id+'</li>'))
$('.inserted').before($('<p class="keyword " >' + element.id + '<a class="delete '+element.value+'" onclick="deleteWord(this,\''+element.value+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></p>'));
}else{
    
    deleteWord(document.getElementsByClassName(element.value)[0], element.value)
}
}

//Delete a keyword
function deleteWord(element, value){

    
  $(element).parent('.keyword').remove();
  var skill = document.querySelector("input[value='"+value+"']");
  skill.checked = false;
}
</script>

<script>

    function showSection(el, btn){

        console.log(el)
        el.classList.remove('d-none')
        btn.disabled= true
        el.scrollIntoView()
    }

</script>

<script>

    function setValuetoProfile(id, value){
        var el = document.getElementById(id);
        el.innerHTML = value
    }

</script>
@endsection