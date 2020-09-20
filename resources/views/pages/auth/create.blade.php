@extends('layouts.default')

@section('content')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="select">
            </div>
            <div class="card">
                                    <h5 class="card-header">Register</h5>
                                    <div class="card-body">
                                         <form action="{{route('auth.store')}}" method="post">
                    @csrf

                 <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12">

                         <div class="form-group col-md-12">
                      <label for="name">{{ __('Name') }}</label>
                        <input id="name" 
                               type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required autocomplete="email">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                       </div>   
                         <div class="form-group col-md-12">
                      <label for="inputEmail4">{{ __('E-Mail Address') }}</label>
                        <input id="email" 
                               type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                       </div>
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">{{ __('Password') }}</label>
                        <input id="password" 
                               type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" 
                               required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                      </div>
                       <div class="form-group col-md-12">
                      <label for="inputEmail4">{{ __('level') }}</label>
                            <select name="level"  class="form-control" id="input-select"required>
                                <option value="">--select level--</option>
                                <option value="admin">admin</option>
                                <option value="officer">officer</option>
                            </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
    </form>
            </div>
        </div>
    </div>
   

@endsection