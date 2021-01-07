@extends('layouts.app')
@section('content')

@auth


<div class="container" >
    <div class="row">
        <div class="col-md-12 border-bottom">
            <!-- <h2>Personal information</h2> -->
            <h1 ><strong>my profile</strong></h1>
        </div>
    </div>
    
</div>

<div class="container p-3 border-bottom">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-2"><strong>profile information</strong></h4>
                </div>
                <div class="col-md-12">
                    <span>your account information</span>
                </div>
            </div>

        </div>
        <div class="col-md-9 ">

            <div class="card" id="profile-card">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h5><strong>name</strong></h5>
                            </div>
                            <div class="col-md-12">
                                <h6>{{$user->name}}</h6>
                            </div>

                            <br><br>


                            <div class="col-md-12">
                                <h5><strong>email</strong></h5>
                            </div>
                            <div class="col-md-12">
                                <h6>{{$user->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>


<div class="container p-3">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-2"><strong>change user</strong></h4>
                </div>
                <div class="col-md-12">
                    <span>your account information</span>
                </div>
            </div>

        </div>
        <div class="col-md-9 ">

            <div class="card" id="profile-card">
              <h2 class="card-header">{{$user->name}}</h2>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-group" action="{{url('/profile')}}/{{$user->id}}" method="post">
                                        @csrf
                                        @method('PUT')
                                     
                                        <div class="row my-2">
                                            <div class="col-12 mt-2">
                                                <label for="first_name">
                                                    <h5>Change Name </h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="form-control" required type="text" id="name" name="name" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <br>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <select name="rights"  class="custom-select" id="inputGroupSelect01" required>
                                                <option value=""  >Choose...</option >
                                                <option  value="1"  {{$rightStr1}} >1</option>
                                                <option value="0" {{$rightStr0}} >0</option>
                                                </select>                                               
                                            </div>
                                        </div>
                                        <br>
                                       <div class="row">
                                            <div class="col-md-12 ">
                                            
                                                <button id="same-color" class="btn btn-info" onclick="return confirm('are you sure you want to change this accunt?');" href="" type="submit">change
                                                </button>      
                                            </div>
                                        </div>
                                    </form>   
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12">
                        <div class="row">
                             <div class="col-12">
                                <label>
                                    <h5>delete account </h5>
                                </label>

                            </div>
                            <div class="col-md-12 ">
                                <form method="post"   action="{{url('profile')}}/{{$user->id}}"> @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('are you sure you want to delete this account? ');" class="btn btn-danger" id="same-color">Delete</button>                        
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                
              </div>
            </div>
        </div>
    </div>
</div>







<br>
<br>


<div class="container p-3  border-top">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-2"><strong>User administration</strong></h4>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table" id="profile-card">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">rights</th>
              <th scope="col">edit/delete</th>
            </tr>
          </thead>

        @foreach($users as $data)
          <tbody>
            <tr>
              <th scope="row">{{$data->id}}</th>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>

                {{$data->rights}}</td>
              <td>
                  <div class="container">
                    <div class="row">

                        <div class="col-md-6" >
                            <a href="/profile/{{$data->id}}/edit" type="submit" name="edit" class="btn btn-info">edit</a>
                        </div>
                    </div>
                </div>
              </td>
            </tr>
          </tbody>
        @endforeach
    </table>
        </div>
    </div>
    
</div>





@endauth


@guest

<h1>eerst inloggen jij</h1>

@endguest
    

@endsection
