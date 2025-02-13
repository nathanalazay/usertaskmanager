@extends('layouts.auth')
@section("style")
    <style>
        html,
            body {
            height: 100%;
            }

            .form-signin {
            max-width: 330px;
            padding: 1rem;
            }

            .form-signin .form-floating:focus-within {
            z-index: 2;
            }

            .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
            
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            }
    </style>
@section("content")   
<main class="form-signin w-100 m-auto">
    <form method="post" action="{{route("register.post")}}">
        @csrf
      <div class="text-center"><img class="mb-4 img-fluid" src="{{asset("assets/img/register.png")}}" title="Register here"  width="200"></div>
      
      
      <div class="form-floating">
        <input name="fullname" type="text" class="form-control" id="floatingInput" placeholder="Enter name">
        <label for="floatingInput">Full name</label>
        @error('fullname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-floating" style="margin-bottom: 10px;">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
      @endif
      @if(session("error"))
        <div class="alert alert danger">
            {{session("error")}}
        </div>
      @endif
      <div class="mb-10">     
        <button class="btn btn-primary w-100 py-2" type="submit">Create account</button>
      </div> <br>
      <div class="mt-10">      
        <a href="{{'/login'}}"class="btn btn-primary w-100 py-2" type="submit">Login</a>
      </div>  
      
    </form>
  </main>
@endsection