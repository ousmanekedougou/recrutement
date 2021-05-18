
      
        			@if (session('existe'))
								<div class="single-feature bg-success" style="margin-top:10em;margin-bottom:-10em;">
									<div class="title bg-success">
										@if(session('name'))
										<h3 style="color: white;">Salut {!! session('name') !!}</h3>
										@endif
									</div>
									<div class="desc-wrap bg-success" >
											@if(session('remercie'))
												<p class="mb-1 mt-1" style="text-align:justify;font-weight:700; color:white;font-size:18px;"> {!! session('remercie') !!}</p>
                      @endif
											<!-- @if(session('sms'))
												<p class="mb-1 mt-1" style="text-align:justify;font-weight:700; color:black"> {!! session('sms') !!}</p>
                      @endif -->
									</div>
								</div>

					@endif




			<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
	