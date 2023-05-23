
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
		<div class="modal fade custom-modal" id="add-education">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header ">
						<h4 class="modal-title text-center w-100">Add education</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">
                                <form action="{{ route('add.education') }}" method="POST">
                                    @csrf

                                    <div class="card-body ">
                                        
                                        <div class="form-group">
                                            <label for="" class="h4">Degree</label>
                                            <input type="text" name="degree" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="h4">Field of study</label>
                                            <input type="text" name="field_of_study" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="h4">School</label>
                                            <input type="text" name="school" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="h4">Period</label>
                                            <div class="d-flex row">
                                                <label for="hourly" class="col-md-6">
                                                    
                                                    <input type="date" name="from" class="me-2 " id="from" placeholder="From"/> 
                                                </label>
                                                <label for="fixed" class="col-md-6">
                                                    <input type="date" name="to" class="me-2 " id="to" placeholder="To"/> 
                                                </label>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                <div class="card-footer pb-2 border-0 float-right">
                                    <button type="submit"  class="btn btn-primary" data-bs-dismiss="modal"  > Save</button>
                                </div>
                            </form>


                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
        

        
		
        