@extends('layouts.app')

@section('title', 'Finished Jobs')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<b>Finished Jobs</b>
					</div>
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
										<th>Close Date</th>
										<th>Total Time</th>
										<th>Case Reason</th>
										<th>Trouble Description</th>
										<th>Assign To</th>
										<th>Generated By</th>
										<th>Transferred To Level</th>
										<th>Transferred To</th>
										<th>Transferred By</th>
										<th>Solution Remark</th>
										<th>Closed By</th>
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
											<td>{{$job->close_date}}</td>
											<td>{{$job->total_time}}</td>
											<td>{{ucwords($job->case_reason)}}</td>
											<td>{{ucwords($job->trouble_description)}}</td>
											<td>{{ucwords($job->assign_to)}}</td>
											<td>{{ucwords($job->generated_by)}}</td>
											<td>{{ucwords($job->transferred_to_level)}}</td>
											<td>{{ucwords($job->transferred_to)}}</td>
											<td>{{ucwords($job->transferred_by)}}</td>
											<td>{{ucfirst($job->solution_remark)}}</td>
											<td>{{ucwords($job->closed_by)}}</td>
										</tr>
									@endforeach
								@endif
							</table>
						@else
							<table class="table table-striped table-bordered" style="border: 1px solid #ccc;">
							@if (count($fieldJobs) > 0)
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
									<th>Close Date</th>
									<th>Total Time</th>
									<th>Case Reason</th>
									<th>Trouble Description</th>
									<th>Assign To</th>
									<th>Generated By</th>
									<th>Transferred To Level</th>
									<th>Transferred To</th>
									<th>Transferred By</th>
									<th>Solution Remark</th>
									<th>Closed By</th>
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
										<td>{{$fieldJob->close_date}}</td>
										<td>{{$fieldJob->total_time}}</td>
										<td>{{ucwords($fieldJob->case_reason)}}</td>
										<td>{{ucwords($fieldJob->trouble_description)}}</td>
										<td>{{ucwords($fieldJob->assign_to)}}</td>
										<td>{{ucwords($fieldJob->generated_by)}}</td>
										<td>{{ucwords($fieldJob->transferred_to_level)}}</td>
										<td>{{ucwords($fieldJob->transferred_to)}}</td>
										<td>{{ucwords($fieldJob->transferred_by)}}</td>
										<td>{{ucfirst($fieldJob->solution_remark)}}</td>
										<td>{{ucwords($fieldJob->closed_by)}}</td>
									</tr>
								@endforeach
							@endif
						</table>
						@endif
					</div>
				</div>
				<div class="text-center">{{$jobs->links()}}</div>
				<a href="/exportFinishedJobs" class="btn btn-success pull-right">Export File</a>
			</div>
		</div>
	</div>
@endsection