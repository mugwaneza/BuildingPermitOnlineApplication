@extends('main')
@include('admin_menus')
    <div class="analytics-sparkle-area">
        <div class="container-fluid dasboardcontainer">
            <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section main-container-admin mt-5">
                            <div id="dropzone1" class="pro-ad">
                                <br><h3 class="col-md-offset-2 "> All system authorities accounts and their roles</h3><br>
        <table class="table table-hover table-bordered table-striped">
            <div class="center-block">@include('error_message')</div>
            <thead>
            <th>id</th>
            <th>Names</th>
            <th>NID</th>
            <th>Email</th>
            <th>Role</th>
            <th>Village</th>
            <th>Cell</th>
            <th>Sector</th>
            <th>Created at</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
             <tbody>
             <?php $count =1; ?>
             @foreach($administrators as $user)
             <tr>
                 <td >{{$count}}</td>
                 <td hidden class="id">{{$user["id"]}}</td>
                 <td class="name">{{$user["name"]}}</td>
                 <td class="nid">{{$user["nid"]}}</td>
                 <td class="email">{{$user["email"]}}</td>
                 <td class="role" >{{$user["role"]}}</td>
                 <td class="cell">{{$user["cell"]}}</td>
                 <td class="village">{{$user["village"]}}</td>
                 <td class="sector">{{$user["sector"]}}</td>
                 <td class="ceatedat">{{$user["created_at"]->format('d-m-Y')}}</td>
                 <td>
                 <button class="btn btn-primary btn-sm BtnEdit" data-toggle="modal" > Edit </button>

                 </td>
                 <td><button class="btn btn-danger btn-sm BtnDelete">Delete</button></td>
             </tr>
             <?php $count ++ ; ?>
             @endforeach

             </tbody>

        </table>
        </div>
        </div>
        </div>
        </div>
    </div>
   </div>
        <!-- Modal Edit administrator -->
        <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="modeledit" aria-hidden="true">
            <div class="modal-dialog" role="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Edit Administrator</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/update" autocomplete="off">
                            @csrf
                            <div class="row">
                                @include('error_message')

                                <div class="form-group col-lg-12 "  hidden>
                                    <input class="form-control"  id="dialogid" name="dialogid" placeholder="id" value="">
                                </div

                                 > <div class="form-group col-lg-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Names</label>
                                    <input class="form-control"  id="namedial" name="name" placeholder="Names" value="{{ old('name')}}">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group col-lg-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label>Password</label>
                                    <input type="password"  id="passworddial" name="password" class="form-control" value="{{old('password')}}">
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="form-group col-lg-6 {{$errors->has('comfirmpass') ? ' has-error' : ''  }}">
                                    <label>Repeat Password</label>
                                    <input type="password"  name="comfirmpass" class="form-control" value="{{old('comfirmpass')}}">
                                    <small class="text-danger">{{ $errors->first('comfirmpass') }}</small>
                                </div>
                                <div class="form-group col-lg-6 {{$errors->has('email') ? ' has-error' : ''  }}">
                                    <label>Email Address</label>
                                    <input class="form-control" id="emaildial" name="email" value="{{old('email')}}">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="form-group col-lg-6 {{$errors->has('nid') ? ' has-error' : ''  }}">
                                    <label>Nat ional ID</label>
                                    <input class="form-control" id="niddial" name="nid" value="{{old('nid')}}">
                                    <small class="text-danger">{{ $errors->first('nid') }}</small>
                                </div>

                                <div class="form-group col-lg-6 {{$errors->has('role') ? ' has-error' : ''  }}">
                                    <label>Role</label>
                                    <select class="form-control" id="roledial" name="role">
                                        <option value="{{old('role')}}"></option>
                                        <option value="Village coordinator">Village coordinator</option>
                                        <option value="Cell coorditor">Cell coordinator</option>
                                        <option value="Land manager">Land manager</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('role') }}</small>
                                </div>

                                <div class="form-group col-lg-6 {{$errors->has('village') ? ' has-error' : ''  }}">
                                    <label>Village</label>
                                    <input class="form-control" name="village" id="villagedial" value="{{old('village')}}">
                                    <small class="text-danger">{{ $errors->first('village') }}</small>
                                </div>

                                <div class="form-group col-lg-12 {{$errors->has('cell') ? ' has-error' : ''  }}">
                                    <label>Cell</label>
                                    <input class="form-control" name="cell" id="celldial" value="{{old('cell')}}">
                                    <small class="text-danger">{{ $errors->first('cell') }}</small>
                                </div>

                                <div class="form-group col-lg-12 {{$errors->has('sector') ? ' has-error' : ''  }}">
                                    <label>Sector</label>
                                    <input class="form-control" name="sector" id="sectordial" value="{{old('sector')}}">
                                    <small class="text-danger">{{ $errors->first('sector') }}</small>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-block btn-success ">update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal delete -->
        <div class="modal fade" id="Deletemodel" tabindex="-1" role="dialog" aria-labelledby="modelete" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Would you like to delete this row ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <form method="post" action="/admin/delete">
                            @csrf
                            <input type="text" hidden name="deleteid" id="iddelete">
                         <div class="row col-md-offset-3">
                         <input class=" btn-danger btn-sm" type="submit" value="Delete">
                         <input class="btn-warning btn-sm" type="button" data-dismiss="modal" value="Cancel">
                         </div>
                        </form>
                        </div>
                        </div>
                        </div>
            </div>


@include('footer')

