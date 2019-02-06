@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Maintenance</div>
                <div class="panel-body">
                    <div class="search-content pull-left col-md-6">
                        

                      <div class="input-group">
                        <input type="text" class="form-control search-key" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-default submit-search" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                          </button>
                        </div>
                      </div>

                    </div>
                    <div class="add-content pull-right col-md-4">
                        <button type="button" class="btn btn-primary add-employee">Add Employee</button>
                    </div>
                </div>
                <div class="panel-body">
                      <table class="table table-bordered table-data">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Employed</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $employees)
                          <tr>
                            <td>{{$employees->name}}</td>
                            <td>{{$employees->email}}</td>
                            <td>{{$employees->created_at}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                  <button type="button" class="btn btn-link update-employee" data-id="{{$employees->id}}"  data-email="{{$employees->email}}"  data-name="{{$employees->name}}">Edit</button>
                                  <button type="button" class="btn btn-link delete-employee" data-id="{{$employees->id}}">Delete</button>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
