
<style>
    .table tr td:first-child{
        padding-left: 0px;

    }
    .table tr td:last-child{

        
        padding-right: 0px;
    }

    .table tbody tr{
        border-bottom: none;
        border-style: hidden;
    }
</style>
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="create-contract">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header ">
						<h4 class="modal-title text-center w-100">Create contract</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">
                                

                                    <div class="card-body ">
                                        
                                        <div class="form-group">
                                            <label for="" class="h4">Contract name</label>
                                            <input type="text" name="contract_name" class="form-control" value="{{ $job->job_title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="h4">Description</label>
                                            <input type="text" name="description" class="form-control" value="{{ $job->job_description }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="h4">Contract type</label>
                                            <div class="d-flex row">
                                                <label for="hourly" class="col-md-6">
                                                    <input type="radio" name="contract_type" class="me-2 " id="hourly"/> Hourly rate
                                                </label>
                                                <label for="fixed" class="col-md-6">
                                                    <input type="radio" name="contract_type" class="me-2 " id="fixed"/> Fixed price
                                                </label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                                        <table class="table">
                                            <tr class="fixed_box">
                                                <td>
                                                    <strong>Fixed price</strong>
                                                    <p>Set your hourly rate for this contract</p>
                                                </td>
                                                <td>
                                                    <input type="number" name="fixed_price" class="form-control" onkeyup="update(this)"/>
                                                </td>
                                            </tr>
                                            <tr class="hourly_box">
                                                <td>
                                                    <strong>Your hourly rate</strong>
                                                    <p>Total budget for this contract</p>
                                                </td>
                                                <td>
                                                    <input type="number" name="fixed_price" class="form-control" onkeyup="update(this)"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>BrainX service fee</strong>
                                                    <p>BrainX takes 20%. It helps us run the platform and get clients for you. </p>
                                                </td>
                                                <td>
                                                    <input type="number" name="service_fee" readonly id="service_fee" class="form-control"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>You’ll receive</strong>
                                                    <p>The amount you receive after service fee</p>
                                                </td>
                                                <td>
                                                    <input type="number" name="talent_receive" readonly id="talent_receive" class="form-control"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Hours per week</strong>
                                                    <p>Number of hours you work weekly for this contract</p>
                                                </td>
                                                <td>
                                                    <input type="number" name="talent_receive" readonly id="talent_receive" class="form-control"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Client deposit</strong>
                                                    <p>The amount client deposits in escrow. Hourly rate x Hours per week</p>
                                                </td>
                                                <td>
                                                    <input type="number" name="talent_receive" readonly id="talent_receive" class="form-control"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Duration</strong>
                                                    <p>Number of weeks</p>
                                                </td>
                                                <td>
                                                    <input type="number" name="talent_receive" readonly id="talent_receive" class="form-control"/>
                                                </td>
                                            </tr>
                                        </table>
                                        <div>
                                            <button type="button" class="btn btn-outline-primary" onclick="addMilestone()">+ Add milestones</button>

                                            <table class="table mt-3" id="milestones">
                                                <tr>
                                                    <td>
                                                        <strong>Milestone 1</strong>
                                                        <input type="text" class="form-control" name="milestone[]"/>
                                                    </td>
                                                    <td>
                                                        <br>
                                                        <input type="text" class="form-control"  name="milestone_value[]">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Milestone 2</strong>
                                                        <input type="text" class="form-control" name="milestone[]"/>
                                                    </td>
                                                    <td>
                                                        <br>
                                                        <input type="text" class="form-control"  name="milestone_value[]">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                    </div>
                                <div class="card-footer pb-2 border-0 float-right">
                                    <button type="button"  class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#review-contract"  > Next</button>
                                </div>
                                

                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
        

@section('add-milestone-js')

<script>

let counter = 2;

function milestoneRow(){
    counter++;
    return '<tr><td><strong>Milestone '+counter+'</strong><input type="text" class="form-control" name="milestone_'+counter+'"/></td><td><br><input type="text" class="form-control"  name="milestone_'+counter+'_value"></td></tr>'
}

function addMilestone(){
    $('#milestones').append(milestoneRow())
}

function update(el){
    document.getElementById('service_fee').value = el.value * 0.2
    document.getElementById('talent_receive').value = el.value * 0.8
}

</script>

@endsection
		
        