@extends('layouts.app')
@section('content')
<title>User Management</title>
@error('password')
<span class=”invalid-feedback” role=”alert”>
<strong>{{ $message }}</strong>
</span>
@enderror
@if(Auth::User()->is_admin==1)
<div class="px-2">
<!-- BUTTON TRIGGER -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingoing">
  Add User
</button>
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="ingoing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('register') }}">
      <div class="modal-body">
      @csrf

        <div class="form-group">
            <label for="fname">First Name</label>                             
            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>                                
        </div>

        <div class="form-group">
        <label for="lname">Last Name</label>                                        
        <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>                                           
        </div>

        <div class="form-group">
        <label for="email">{{ __('E-Mail Address') }}</label>                                       
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>

        <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        </div>

        <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
        </div>

        <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Register">
        </div>
        </div>
        </form>
    </div>
  </div>
</div>
<br>
<table class="table">
         <thead>
         <tr>
            <th>Date Created</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Account Type</th>
            @if(Auth::User()->is_admin==1)
            <th></th>
            @endif
         </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
            <tr>
               <td>{{ $user->created_at }}</td>
               <td>{{ $user->fname }}</td>
               <td>{{ $user->lname }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->dob }}</td>
               @if($user->is_admin == 1)
                <td>Admin</td>
               @endif
               @if($user->is_admin == 0)
                <td>User</td>
               @endif
               @if(Auth::User()->is_admin==1)
               @if($user->is_admin == 1)
               @endif
               @if($user->is_admin == 0)
               <td><form action="/users/{{ $user->id }}" method="POST">
                @csrf
                    @method('DELETE')
                    <button>Delete User</button>
                    </form>
               </td>
               @endif
               @endif
            </tr>
            @endforeach
         </tbody>
      </table>
      {{ $users->links() }}
@endsection