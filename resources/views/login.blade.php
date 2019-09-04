@extends('main')
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>PLEASE LOGIN TO Electronic Building Permit Online Application System</h3>
            <p>Apply electronically today!</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="/login" method="post" id="loginForm" autocomplete="off" >
                        @csrf
                        @include('error_message')

                        <div class="form-group {{ $errors->has('nid') ? ' has-error' : '' }}">
                            <label class="control-label" for="username">National ID / Email </label>
                            <input type="text" placeholder="119845959592001" title="Please enter you NID"  value="{{ old('nid')}}" name="nid" class="form-control">
                            <span class="help-block small">Type unique nid to EBPOA</span><br>
                            <small class="text-danger">{{ $errors->first('nid') }}</small>
                        </div>
                        <div class="form-group {{ $errors->has('nid') ? ' has-error' : '' }}">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******"  value="{{ old('nid')}}" name="password" class="form-control">
                            <span class="help-block small">Type your password to EBPOA</span><br>
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>

                        <input type="submit" class="btn btn-success btn-block loginbtn" value="Login">
                        <a class="text-success" href="/register">If you don't have an account click here</a>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
