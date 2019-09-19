@extends('main')

@include('citizen_menus')

 <div class="analytics-sparkle-area">
    <div class="container-fluid dasboardcontainer">
        <div class="product-tab-list tab-pane fade active in" id="description">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
                        <div id="dropzone1" class="pro-ad">
                            <br><h3 class="col-md-offset-2 "> Fill the following form for building permit application</h3><br>


                            <form action="/apply" class="dropzone dropzone-custom needsclick add-professors" method="post" id="demo1-upload" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @include('error_message')

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>National Identity number</label>
                                            <input name="nid" disabled class="form-control" placeholder="National Identity" value="{{$userInfo['nid']}}">
                                        </div>

                                        <div class="form-group {{$errors->has('reason') ? ' has-error' : '' }}">
                                            <input name="reason" type="text" class="form-control" placeholder="Application reason" value="{{old('reason')}}">
                                            <small class="text-danger">{{ $errors->first('reason') }}</small>
                                        </div>

                                        <div class="form-group">
                                            <label>Names</label>
                                            <input name="fullnme" disabled class="form-control" placeholder="Full name" value="{{$userInfo['name'] }}">
                                        </div>

                                        <div class="form-group {{ $errors->has('landcertificate') ? ' has-error' : '' }}">
                                            <label class=""><span class="fa fa-download"></span>  upload your land certificate</label>
                                            <input type="file" name="landcertificate"  class="form-control "  id="landcertificate" value="{{ old('landcertificate') }}" >
                                            <small class="text-danger">{{ $errors->first('landcertificate') }}</small>
                                        </div>
                                    <div class="form-group {{ $errors->has('blueprint') ? ' has-error' : '' }}">
                                    <label class=""><span class="fa fa-download"></span>  upload blueprint </label>
                                    <input type="file" name="blueprint"  class="form-control "  id="blueprint" value="{{ old('blueprint') }}" >
                                    <small class="text-danger">{{ $errors->first('blueprint') }}</small>
                                </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Village</label>
                                            <input type="text"  disabled class="form-control" placeholder="Village" value="{{$userInfo['village']}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Cell</label>
                                            <input type="text"  disabled class="form-control" placeholder="Cell" value="{{$userInfo['village']}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Sector</label>
                                            <input type="text"  disabled class="form-control" placeholder="Sector" value="{{$userInfo['sector']}}">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary" value="Submit">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
  </div>
@include('footer')
