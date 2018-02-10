@extends('layouts.app')

@section('title', 'Exptension Request')

@section('content')
   

 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading text-center" >Extension</div>

                <div class="panel-body">
                    <div class="modal-body">
                       <form action="/extension" method="post">
                        {{csrf_field()}}
                      <table class="table table-striped">
                        <tr class="from-group">
                            <td><label>Customer User_ID: </label></td>
                            <td>
                                <input id="customer_id" type="text" class="form-control" name="customer_id" value="" required>
                            </td>
                        </tr>
                        <tr class="from-group">
                            <td><label>Complaint Date: </label></td>
                            <td>
                                <input id="complaint_date" type="date" class="form-control" name="complaint_date" required>
                            </td>
                        </tr>
                        <tr class="from-group">
                            <td><label>Expiry: </label></td>
                            <td><input id="expiry_date" type="date" class="form-control" name="expiry_date" required></td>
                        </tr>
                        <tr class="from-group">
                            <td><label>Status: </label></td>
                            <td> <input id="status" type="text" class="form-control" name="status" required pattern="([A-Za-z\s]){3,}" title="Only letters are allowed.Minimum 3 letters required."></td>
                        </tr>
                        <tr class="from-group">
                            <td><label>Reason: </label></td>
                            <td><input id="reason" type="text" class="form-control" name="reason" required></td>
                        </tr>
                        <tr class="from-group">
                            <td><label>Extension Date: </label></td>
                            <td>
                                <input id="extension_date" type="date" class="form-control" name="extension_date" required>
                            </td>
                        </tr>
                        <tr class="from-group">
                            <td><label>Assigned to: </label></td>
                            <td><input id="assigned_to" type="text" class="form-control" name="assigned_to" required></td>
                        </tr>
                        <tr class="from-group">
                            <td><label>Generated by: </label></td>
                            <td><input id="generated_by" type="text" class="form-control" name="generated_by" value="{{Auth::user()->name}}" readonly="true" required></td>
                        </tr>


                        <tr class="from-group">
                            <td></td>
                            <td>
                                <button type="clear" name="clear" class="btn btn-danger">Clear!</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </td>
                        </tr>
                     </table>
                    </form>
                  </div>
                </div>
            </div>            
        </div>
    </div>
</div>




@endsection