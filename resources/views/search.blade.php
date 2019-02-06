<table class="table table-bordered">
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