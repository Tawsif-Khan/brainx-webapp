
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="client-signin">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header text-center">
						<h4 class="modal-title text-center w-100">Log in</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                            <div class="  card m-2 border-0 text-center col-md-12 ">
                                  
                                    <div class="card-body text-center">
                                        <form action="{{ route('client.login') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required/>
                                            </div>
											
                                            
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                            </div>
                                            <button type="submit"  class="btn btn-primary"  > Log in</button>

                                        </form>
                                    </div>
                                <div class="card-footer pb-2 border-0">
                                    
                                </div>
                            </div>
					</div>

				</div>
			</div>
		</div>
        

        