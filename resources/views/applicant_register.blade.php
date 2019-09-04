
@extends('main')

 <div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <h3 class="text-primary">Electronic Building Permit Online Application</h3>
            <p>New applicant registration form</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="post" action="/register" autocomplete="off">
                        @csrf

                         <div class="row">
                             @include('error_message')
                            <div class="form-group col-lg-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Names</label>
                                <input class="form-control" name="name" placeholder="Names" value="{{ old('name')}}">
                                <small class="text-danger">{{ $errors->first('name') }}</small>

                            </div>
                            <div class="form-group col-lg-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password</label>
                                <input type="password"  name="password" class="form-control" value="{{old('password')}}">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                            <div class="form-group col-lg-6 {{$errors->has('comfirmpass') ? ' has-error' : ''  }}">
                                <label>Repeat Password</label>
                                <input type="password"  name="comfirmpass" class="form-control" value="{{old('comfirmpass')}}">
                                <small class="text-danger">{{ $errors->first('comfirmpass') }}</small>
                            </div>
                            <div class="form-group col-lg-6 {{$errors->has('email') ? ' has-error' : ''  }}">
                                <label>Email Address</label>
                                <input class="form-control" name="email" value="{{old('email')}}">
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            <div class="form-group col-lg-6 {{$errors->has('nid') ? ' has-error' : ''  }}">
                                <label>Nat ional ID</label>
                                <input class="form-control" name="nid" value="{{old('nid')}}">
                                <small class="text-danger">{{ $errors->first('nid') }}</small>
                            </div>

                            <div class="form-group col-lg-6 {{$errors->has('village') ? ' has-error' : ''  }}">
                                <label>Village</label>
                                <input class="form-control" name="village" value="{{old('village')}}">
                                <small class="text-danger">{{ $errors->first('village') }}</small>
                            </div>
                            <div class="form-group col-lg-6 {{$errors->has('cell') ? ' has-error' : ''  }}">
                                <label>Cell</label>
                                <input class="form-control" name="cell" value="{{old('cell')}}">
                                <small class="text-danger">{{ $errors->first('cell') }}</small>
                            </div>

                            <div class="form-group col-lg-12 {{$errors->has('sector') ? ' has-error' : ''  }}">
                                <label>Sector</label>
                                <input class="form-control" name="sector" value="{{old('sector')}}">
                                <small class="text-danger">{{ $errors->first('sector') }}</small>
                            </div>

                        </div>
                            <button type="submit" class="btn btn-block btn-success ">Register</button>
                        <br><h5><a href="/login"><span class="text-danger">If you are already registered click here</span></a></h5>

                    </form>
                </div>
            </div>
        </div>

        </div>
     </div>
