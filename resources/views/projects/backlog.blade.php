@extends('layouts.app')
@section('content')

@auth

<!-- productowner -->


    @isset($empty)
    <div class="col-md-12 text-right" style="padding: 10px;">
        <a  href="" class="btn btn-info"  data-toggle="modal" data-target="#backlog">ad backlog +</a>
    </div>
    <div id="backlog" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="myForm" action="/projects" method="POST">
                @csrf
               
                
              <div class="col-md-12 inner-text">
                <h1>add backlogelement</h1>
              </div>
              <div class="inner-form">

                <div class="form-group">


                <label for="exampleInputEmail1">description</label>
                <input type="hidden" name="project_id" value="{{$project_id}}">
                </div>


                <div class="form-group">
                <label for="exampleInputEmail1">description</label>
                <input type="text" name="description"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">backlog_item</label>
                <input type="text" name="backlog_item" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">moscow</label>
                <input type="text" name="moscow" class="form-control" id="moscow">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">deadline</label>
                <input type="date" name="deadline" class="form-control" id="start_date">
                </div>


                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary" onclick="add_teamMember()">Submit</button>
                </div>
              </div>
            </form>
        </div>

      </div>
    </div>
    @endisset
    @isset($project)
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="heading has-text-weight-bold is-size-4 date-title">{{ $project->name }}</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 date-title">
          <h3 class="">start: {{ date('d/m/Y', strtotime($project->start_date)) }}</h3>
        </div>
         <div class="col-md-6 text-right date-title">
          <h3 class="">finish: {{ date('d/m/Y', strtotime($project->end_date)) }}</h3>
        </div>
      </div>
    </div>



    <div class="container">
      <div class="card text-center " id="backlog-card">
        <div class="card-header">
          <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-backlog" role="tab" aria-controls="pills-backlog" aria-selected="true">Backlog</a>

            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-teamMember" role="tab" aria-controls="pills-teamMember" aria-selected="false">Team members</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-sprints" role="tab" aria-controls="pills-sprints" aria-selected="false">Sprints</a>
            </li>
           <!--  <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Retrospectives</a>
            </li> -->
          </ul>


    <div class="tab-content" id="pills-tabContent">


      <div class="tab-pane fade show active" id="pills-backlog" role="tabpanel" aria-labelledby="pills-backlog-tab">
            <table class="table ">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">project id</th>
                  <th scope="col">description</th>
                  <th scope="col">backlog item</th>
                  <th scope="col">moscow</th>
                  <th scope="col">deadline</th>
                  <th scope="col">task id</th>
                  <th scope="col">sprint</th>
                 

                </tr>
              </thead>



            
              <tbody>

                @if($backlogs)
                @foreach($backlogs as $backlog)
                <tr>
                  <th scope="row">{{ $backlog->id }}</th>
                  <td>{{ $backlog->project_id }}</td>
                  <td>{{ $backlog->description}}</td>
                  <td>{{ $backlog->backlog_item}}</td>
                  <td>{{ $backlog->moscow}}
                  </td>
                  <td>{{ $backlog->deadline}}
                  </td>
                  <td>{{ $backlog->task_id}}
                  </td>
                  <td>
                    {{getSprint($backlog->taskid,$backlog->taskid)}}
                  </td>
                </tr> 
              <tbody>
            @endforeach

            @endif
            <div class="col-md-12" style="padding: 10px;">
                <a style="width: 50%;" href="" class="btn btn-info"  data-toggle="modal" data-target="#backlog">ad backlog +</a>
            </div>
            </table>
            <!-- Modal -->
        <div id="backlog" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
              <div class="modal-content">
                  <form class="myForm" action="/projects" method="POST">
                      @csrf
                     
                      
                    <div class="col-md-12 inner-text">
                      <h1>add backlogelement</h1>
                    </div>
                    <div class="inner-form">

                      <div class="form-group">


                      <label for="exampleInputEmail1">description</label>
                      <input type="hidden" name="project_id" value="{{$backlog->project_id}}">
                      </div>


                      <div class="form-group">
                      <label for="exampleInputEmail1">description</label>
                      <input type="text" name="description"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>

                      <div class="form-group">
                      <label for="exampleInputPassword1">backlog_item</label>
                      <input type="text" name="backlog_item" class="form-control" id="exampleInputPassword1">
                      </div>

                      <div class="form-group">
                      <label for="exampleInputPassword1">moscow</label>
                      <input type="text" name="moscow" class="form-control" id="moscow">
                      </div>

                      <div class="form-group">
                      <label for="exampleInputPassword1">deadline</label>
                      <input type="date" name="deadline" class="form-control" id="start_date">
                      </div>


                      <div class="col-md-12">
                        <button type="submit" onclick="add_backlogItem()" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
      </div>



          <!-- andere tab -->
      <div class="tab-pane fade" id="pills-teamMember" role="tabpanel" aria-labelledby="pills-teamMember-tab">
          <table class="table ">
            <thead>

              <tr>
                <th scope="col">user name</th>
                <th scope="col">project name</th>
              </tr>

            </thead>
            <tbody>

              @foreach($teamusers as $teamuser)
                <tr>
                  <th scope="row">{{$teamuser->userName}}</th>
                  <td>{{$teamuser->projectName}}</td>
                </tr>
              @endforeach
              <!-- button team members -->
              <div class="col-md-12" style="padding: 10px;">
                  <a style="width: 50%;" href="" class="btn btn-info"  data-toggle="modal" data-target="#teamember">ad team users+</a>
              </div>
            </tbody>
          </table>
        <div id="teamember" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <!-- // dit is de team users form  -->
              <div class="modal-content">
                  <form class="myForm" action="/teamusers" method="POST">
                      @csrf 
                    <div class="col-md-12 inner-text">
                      <h1>add teammembers</h1>
                    </div>
                    <div class="inner-form">
                        <div class="form-group">
                        <input type="hidden" name="team_id" value="{{$teamuser->team_id}}">
                        <select name="user_id" class="custom-select" id="inputGroupSelect01">
                          
                          <option  selected >Choose...</option>

                          @foreach($allUsers as $allUser)
                         
                        
                            {{checkTeamUser($allUser->id,$teamuser->team_id, $allUser->name)}}
                    
                        


                        
                          @endforeach
                          
                        
                        </select> 
                        </div>
                    

                      <div class="col-md-12">
                        <button type="submit" onclick="add_teamMember()" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>          
      </div>


      <div class="tab-pane fade" id="pills-sprints" role="tabpanel" aria-labelledby="pills-sprints">
        <table class="table ">
          <thead>

            <tr>
              <th scope="col">sprint_id</th>
              <th scope="col">project_id</th>
              <th scope="col">start_date</th>
              <th scope="col">Standrt date</th>
              <th scope="col">remarks</th>
              <th scope="col">view/edit</th>
            </tr>
          </thead>
          <tbody>
              @foreach($sprints as $sprint)
            <tr>
              <th scope="row">{{$sprint->id}}</th>
              <td>{{$sprint->project_id}}</td>
              <td>{{$sprint->created_at}}</td>
              <td>{{$sprint->updated_at}}</td>
              <td>{{$sprint->remarks}}</td>
              <td>
                <div class="container">
                  <div class="row">

                    <div class="col-sm-6">
                      <form action="{{route('sprints.edit', $sprint->id)}}" method="post">
                        @csrf
                        @method('GET')


                        <input type="hidden" value="{{$project->id}}" name="project_id">
                        <input type="hidden" name="backlog_id" value="{{$backlog->id}}">

                        <input type="hidden" value="{{$sprint->id}}" name="sprint_id">

                        <input type="submit"  name="" class="btn btn-primary">
                        
                      </form>
                      
                    </div>

                    <div class="col-sm-6">
                      <form action="{{url('sprints')}}/{{$sprint->id}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="submit" class="btn btn-danger">
                        
                      </form>
                      
                    </div>

                  </div>
                </div>
              </td>
            </tr>
          </tbody>
            @endforeach
         <!-- button team members -->
              <div class="col-md-12" style="padding: 10px;">
                <a style="width: 50%;" href="" class="btn btn-info"  data-toggle="modal" data-target="#halo">ad sprint+</a>
              </div>
        </table>

      <div id="halo" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <form class="myForm" action="/sprints" method="POST">
            @csrf
           
            
          <div class="col-md-12 inner-text">
            <h1>add sprints</h1>
          </div>
          <div class="inner-form">

            <div class="form-group">


            <label for="exampleInputEmail1">description</label>
            <input type="hidden" name="project_id" value="{{$backlog->project_id}}">
            </div>




             <div class="form-group">
            <label for="exampleInputPassword1">created_at</label>
            <input type="date" name="created_at" class="form-control" id="start_date">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">updated_at</label>
            <input type="date" name="updated_at" class="form-control" id="start_date">
            </div>

              <div class="form-group">
            <label for="exampleInputEmail1">remarks</label>
            <input type="text" name="remarks"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            

          

            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        </div>

        </div>
        </div>
      </div>


    </div>



          

        
      @endisset


<!-- user -->



@endauth
@guest
  <h1>guest</h1>
@endguest
@endsection