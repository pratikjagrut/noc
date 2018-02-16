@extends('layouts.app')

@section('title', 'Down Area')

@section('content')
   
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <b>Down Area</b>
                </div>
                <div class="panel-body">
                    <form action="/downArea" method="post">
                        {{csrf_field()}}
                        <table class="table table-striped">
                            <tr class="from-group">
                                <td><label>Area Name: </label></td>
                                <td><input id="area" type="text" class="form-control" name="area" required pattern="([A-Za-z\s]){3,}" title="Only letters are allowed.Minimum 3 letters required."></td>
                            </tr>
                            <tr class="from-group">
                                <td><label>Down Reason: </label></td>
                                <td>
                                    <input id="reason" type="text" class="form-control" name="reason" required pattern="([A-Za-z\s]){3,}" title="Only letters are allowed.Minimum 3 letters required.">
                                </td>
                            </tr>
                            <tr class="from-group">
                                <td><label>Down Day: </label></td>
                                <td>
                                    <input id="down_day_time" type="date" class="form-control" name="down_day_time" required>
                                </td>
                            </tr>
                            <tr class="from-group">
                                <td><label>TAT: </label></td>
                                <td>
                                    <input id="tat" type="time" class="form-control" name="tat" required>
                                </td>
                            </tr>
                            <tr class="from-group">
                                <td><label>Assigned to: </label></td>
                                <td>
                                    <input id="assigned_to" type="text" class="form-control" name="assigned_to" required  pattern="([A-Za-z\s]){2,}" title="Only letters are allowed.Minimum 2 letters required.">
                                </td>
                            </tr>
                            <tr class="from-group">
                                <td><label>Generated by: </label></td>
                                <td>
                                    <input id="generated_by" type="text" class="form-control" name="generated_by" value="{{Auth::user()->name}}" readonly="true" required>
                                </td>
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
@endsection
