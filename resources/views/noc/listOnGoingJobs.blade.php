@extends('layouts.app')

@section('title', 'On-Going Jobs')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading text-center"><b>On-Going Jobs</b></div>
					<div class="panel-body table-responsive">
						@if (Auth::user()->department != 'field team')
							<table class="table table-striped table-bordered" style="border: 1px solid #ccc;">
								@if (count($jobs) > 0)
									<tr>
										<th>Sr No</th>
										<th>Ticket</th>
										<th>Circuit Id</th>
										<th>Name</th>
										<th>Address</th>
										<th>Area</th>
										<th>City</th>
										<th>State</th>
										<th>Contact Details</th>
										<th>Generation Date</th>
										<th>Case Reason</th>
										<th>Assigned Level</th>
										<th>Assign To</th>
										<th>Generated By</th>
										<th>Transferred To Level</th>
										<th>Transferred To</th>
										<th>Transferred By</th>
										<th>Transfer</th>
										<th>Close</th>
									</tr>
									@foreach ($jobs as $job)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$job->ticket}}</td>
											<td>{{$job->circuit_id}}</td>
											<td>{{ucwords($job->name)}}</td>
											<td>{{ucwords($job->address)}}</td>
											<td>{{ucwords($job->area)}}</td>
											<td>{{ucwords($job->city)}}</td>
											<td>{{ucwords($job->state)}}</td>
											<td>{{$job->contact_details}}</td>
											<td>{{$job->created_at}}</td>
											<td>{{ucfirst($job->case_reason)}}</td>
											<td>{{ucwords($job->assigned_to_level)}}</td>
											<td>{{ucwords($job->assign_to)}}</td>
											<td>{{ucwords($job->generated_by)}}</td>
											<td>{{ucwords($job->transferred_to_level)}}</td>
											<td>{{ucwords($job->transferred_to)}}</td>
											<td>{{ucwords($job->transferred_by)}}</td>
											<td>
												<button class="btn btn-info btn-sm" style="color: white;" data-toggle="modal" data-target="#transfer_job" id="{{$job->ticket}}" onclick="transferJob(this.id)">Transfer
												</button>
											</td>
											<td>
												<button class="btn btn-danger btn-sm" style="color: white;" data-toggle="modal" data-target="#close_job" id="{{$job->ticket}}/{{$job->generation_date_timestamp}}" onclick="clck(this.id)">X</button>
											</td>
										</tr>
									@endforeach
								@endif
							</table>
						@else
							<table class="table table-striped table-bordered" style="border: 1px solid #ccc;">
								<tr>
									<th>Sr No</th>
									<th>Ticket</th>
									<th>Circuit Id</th>
									<th>Name</th>
									<th>Address</th>
									<th>Area</th>
									<th>City</th>
									<th>State</th>
									<th>Contact Details</th>
									<th>Generation Date</th>
									<th>Case Reason</th>
									<th>Assigned Level</th>
									<th>Assign To</th>
									<th>Generated By</th>
									<th>Transferred To Level</th>
									<th>Transferred To</th>
									<th>Transferred By</th>
									<th>Close</th>
								</tr>
								@foreach ($fieldJobs as $fieldJob)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$fieldJob->ticket}}</td>
										<td>{{$fieldJob->circuit_id}}</td>
										<td>{{ucwords($fieldJob->name)}}</td>
										<td>{{ucwords($fieldJob->address)}}</td>
										<td>{{ucwords($fieldJob->area)}}</td>
										<td>{{ucwords($fieldJob->city)}}</td>
										<td>{{ucwords($fieldJob->state)}}</td>
										<td>{{$fieldJob->contact_details}}</td>
										<td>{{$fieldJob->created_at}}</td>
										<td>{{ucfirst($fieldJob->case_reason)}}</td>
										<td>{{ucwords($fieldJob->assigned_to_level)}}</td>
										<td>{{ucwords($fieldJob->assign_to)}}</td>
										<td>{{ucwords($fieldJob->generated_by)}}</td>
										<td>{{ucwords($fieldJob->transferred_to_level)}}</td>
										<td>{{ucwords($fieldJob->transferred_to)}}</td>
										<td>{{ucwords($fieldJob->transferred_by)}}</td>
										<td>
											<button class="btn btn-danger btn-sm" style="color: white;" data-toggle="modal" data-target="#close_job" id="{{$fieldJob->ticket}}/{{$fieldJob->generation_date_timestamp}}" onclick="clck(this.id)">X</button>
										</td>
									</tr>
								@endforeach
							</table>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	  <div class="modal fade" id="close_job" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title text-center"><b>Close Job</b></h4>
	        </div>
	        <div class="modal-body">
				<form action="/closeJob" method="post">
					{{csrf_field()}}
					<table class="table table-striped">
						<tr class="from-group">
							<td><label>Ticket: </label></td>
							<td><input type="text" name="ticket" id="printTicket" readonly="true" class="form-control"></td>
						</tr>
						
						<tr class="from-group">
							<td><label>Close Date: </label></td>
							<td><input type="text" class="form-control" id="closeDate" name="close_date" readonly="true"></td>
						</tr>
						<tr class="from-group">
							<td><label>Total Time: </label></td>
							<td><input type="text" name="total_time" id="total_time" class="form-control" readonly="true"></td>
						</tr>
						<tr class="from-group">
							<td><label>Trouble Descrption: </label></td>
							<td><input type="text" name="trouble_description" class="form-control"></td>
						</tr>
						<tr class="from-group">
							<td><label>Solution Remark: </label></td>
							<td><input class="form-control" type="text" name="solution_remark"></td>
						</tr>
						<tr class="from-group">
							<td><label>Closed By: </label></td>
							<td><input type="text" class="form-control" value="{{ucwords(auth()->user()->name)}}" readonly="true" name="closed_by"></td>
						</tr>
						<tr class="from-group">
							<td></td>
							<td><input type="submit" name="close_job" class="btn btn-primary"></td>
						</tr>
					</table>
				</form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>

	  <!-- Modal -->
	  <div class="modal fade" id="transfer_job" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title text-center"><b>Transfer Job</b></h4>
	        </div>
	        <div class="modal-body">
				<form action="/transferJob" method="post">
					{{csrf_field()}}
					<table class="table table-striped">
						<tr class="from-group">
							<td><label>Ticket: </label></td>
							<td><input type="text" name="ticket" id="printTicket1" readonly="true" class="form-control"></td>
						</tr>
						<tr class="from-group">
							<td><label>Transfer to level: </label></td>
							<td>
								<select name="transfer_to_level" class="selectpicker form-control" id="transfer_to_level" title="Transfer To">
								    <option value="3">3</option>
								    <option value="field team">Field Team</option>
								</select>
							</td>
						</tr>
						<tr class="form-group">
							<td><label>Assign Job: </label></td>
							<td>
				                <select name="assign_job" class="selectpicker form-control" id="assign_job" title="Assign To">
				                    <option value="engineer">Engineer</option>
				                    <option value="team">Team</option>
				                </select>
				            </td>
						</tr>
						<tr class="from-group">
							<td><label>Transfer to: </label></td>
							<td id="engineer">
				            	<select class="selectpicker form-control" data-live-search="true" title="Select Engineer" name="assign_to_engineer">
					            	@if ($engineers != null)
                                        @foreach ($engineers as $engineer)
                                            @if ($engineer->name != 'admin')
                                            	<option value="{{$engineer->name}}" data-tokens="{{$engineer->name}}">
                                            		{{ucwords($engineer->name)}}
                                            	</option>
                                            @endif
                                        @endforeach
                                    @endif
				            	</select>
				            </td>
				            <td id="team">
				            	<select class="selectpicker form-control" data-live-search="true" title="Select Team" name="assign_to_team">
					            	@if ($teams != null)
                                        @foreach ($teams as $team)
                                            <option value="{{$team->department}}" data-tokens="{{$team->department}}">
                                            	{{ucwords($team->department)}}
                                            </option>
                                        @endforeach
                                    @endif
				            	</select>
				            </td>
						</tr>
						<tr class="from-group">
							<td><label>Transferred By: </label></td>
							<td><input type="text" class="form-control" value="{{ucwords(auth()->user()->name)}}" readonly="true" name="transferred_by"></td>
						</tr>
						<tr class="from-group">
							<td></td>
							<td><input type="submit" name="transfer_job" class="btn btn-primary"></td>
						</tr>
					</table>
				</form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	  <script type="text/javascript">
	  	function clck(clicked_id)
	  	{	
	  		var data = clicked_id.split("/")
	  	    document.getElementById("printTicket").value = data[0]
	  	    var currentdate = new Date(); 
	  	    var month = ""+(currentdate.getMonth()+1)
	  	    var date = currentdate.getDate()
	  	    if(currentdate.getDate() < 10)
	  	    	date = "0"+date
	  	    
	  	    var datetime = currentdate.getFullYear()+"-"+(month)+"-"+date+" "+currentdate.getHours() + ":"+ currentdate.getMinutes() + ":"+ currentdate.getSeconds()
	  	    document.getElementById("closeDate").value = datetime

	  	    console.log("ticket "+data[0])
	  	    console.log("generation_date_timestamp "+data[1])

			//Difference between generation_date and closing date
			var date1 = currentdate
			var date2 = data[1];
			var difference = date1.getTime() - date2;
			
	        var daysDifference = Math.floor(difference/1000/60/60/24)
	        difference -= daysDifference*1000*60*60*24

	       	var hoursDifference = Math.floor(difference/1000/60/60)
	        difference -= hoursDifference*1000*60*60

	        var minutesDifference = Math.floor(difference/1000/60)
	        difference -= minutesDifference*1000*60

	        var secondsDifference = Math.floor(difference/1000)

	     	var total_time = daysDifference + 'd ' + hoursDifference + 'h :' + minutesDifference + 'm :' + secondsDifference + 's'

	     	document.getElementById("total_time").value = total_time
	  	}

	  	function transferJob($ticket)
	  	{
	  		document.getElementById("printTicket1").value = $ticket
	  	}

	  	$(document).ready(function(){
	  		$("#engineer").hide()
	  		$("#team").hide()


	  		$("#assign_job").change(function(){
	  			var assign_job = $(this).val()
	  			if(assign_job == "engineer")
	  			{
	  				$("#engineer").show()
	  				$("#team").hide()
	  			}
	  			else
	  			{
	  				$("#engineer").hide()
	  				$("#team").show()
	  			}
	  		})
	  	}) 
	  </script>
@endsection