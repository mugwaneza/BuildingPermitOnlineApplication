@extends('main')
@include('admin_menus')
<div class="analytics-sparkle-area">
    <div class="container-fluid dasboardcontainer">
        <div class="product-tab-list tab-pane fade active in" id="description">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section main-container-admin mt-5">
                        <div id="dropzone1" class="pro-ad">
                            <br><h3 class="col-md-offset-0 ">
                                @if(session('village'))
                                    <div class="alert alert-warning">
                                        {{session('village')}}
                                    </div>
                                    @elseif(session('cell'))
                                    <div class="alert alert-warning">
                                        {{session('cell')}}
                                    </div>
                                @elseif(session('sector'))
                                    <div class="alert alert-warning">
                                        {{session('sector')}}
                                    </div>
                                @endif
                                    @include('error_message')

                            </h3>
                            <br>
                            <table class="table table table-responsive table-bordered table-hover table-striped">
                                @if($applicant -> count()>0)

                                <thead>
                                <th>No</th>
                                <th>Applicant name</th>
                                <th>Land paper</th>
                                <th>blueprint</th>
                                <th>Application status</th>
                                <th>created on</th>
                                <th>View</th>
                                <th>Decision</th>

                                @if(session('Sector'))
                                    <th>Reject</th>
                                @endif

                                </thead>
                                <tbody>
                                    <?php $count = 0 ?>
                                    @foreach($applicant as $vapp)
                                        <?php $count++ ?>
                                        <tr>
                                            <td> <?php echo $count  ?></td>
                                            @if(session('village'))
                                            <td hidden class="vid">{{$vapp -> vid }}</td>
                                            @elseif(session('cell'))
                                            <td hidden class="cid">{{$vapp -> cid }}</td>
                                            @elseif(session('sector'))
                                            <td hidden class="sid">{{$vapp -> sid }}</td>
                                            <td hidden class="scomment">{{$vapp -> scomment }}</td>
                                            @endif
                                            <td hidden class="reason">{{$vapp -> reason }}</td>
                                            <td hidden class="name">{{$vapp -> name }}</td>
                                            <td hidden class="village">{{$vapp -> village }}</td>
                                            <td hidden class="cell">{{$vapp -> cell }}</td>
                                            <td hidden class="sector">{{$vapp -> sector }}</td>
                                            <td hidden class="nid">{{$vapp -> nid }}</td>
                                            <td hidden class="email">{{$vapp -> email }}</td>
                                            <td >{{$vapp -> name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-md btn-default" >
                                                    <span class="fa fa-clipboard "></span> </a>
                                                    <a href="{{$vapp -> landcertificate }}" download>
                                                        <span class="fa fa-download text-success"></span>
                                                    </a>
                                                </button>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-md btn-default" >
                                                    <span class="fa fa-clipboard"></span> </a>
                                                    <a href="{{$vapp -> blueprint}}" download>
                                                        <span class="fa fa-download text-warning"></span> </a>
                                                </button>
                                            </td>

                                            @if(session('sector'))

                                            <td>
                                                @if($vapp -> sapproval == "permited")
                                                <span class="text-success">{{$vapp -> sapproval }}</span>
                                                  @elseif($vapp -> sapproval == "rejected")
                                                 <span class="text-danger">{{$vapp -> sapproval }}</span>
                                                  @else
                                                <span class="text-warning">{{$vapp -> sapproval }}..</span>
                                                @endif
                                            </td>

                                            <td>{{$vapp -> stime  }}</td>

                                              @elseif(session('cell'))

                                              @if($vapp -> capproval == "approved")
                                              <td><span class="text-success">{{$vapp -> capproval }}</span></td>
                                               @else
                                              <td><span class="text-warning">{{$vapp -> capproval }}..</span></td>
                                              @endif
                                             <td>{{$vapp -> ctime  }}</td>

                                              @elseif(session('village'))

                                                @if($vapp -> vapproval == "approved")
                                                    <td><span class="text-success">{{$vapp -> vapproval }}</span></td>
                                                @else
                                                    <td><span class="text-warning">{{$vapp -> vapproval }}..</span></td>
                                                @endif
                                                <td>{{$vapp -> vtime  }}</td>

                                            @endif
                                            <td>
                                                <button class="btn btn-info btn-sm btnDetails">Details</button>
                                             <td>
                                                @if(session('sector') && ($vapp -> sapproval) =="pending")
                                                    <button class="btn btn-success btn-sm ApproveBtn" >Approve</button>
                                                    <button  class="btn btn-danger btn-sm RejectBtn" > Reject</button>

                                                @elseif(session('cell') && ($vapp -> capproval) =="pending")
                                                    <button class="btn btn-success btn-sm cApproveBtn" >Approve</button>

                                                @elseif(session('village') && ($vapp -> vapproval) =="pending")
                                                    <button class="btn btn-success btn-sm vApproveBtn" >Approve</button>
                                                @else
                                                   <button disabled class="btn btn-warning btn-sm ApproveBtn" >No action</button>

                                                @endif
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                                    @else
                                    <p class="col-md-offset-2">Sorry you don't have any application</p>
                                @endif

                            </table>
                            <div class="row " >
                                <div class="myfooter offset-2" >
                                    {{--show pagination--}}
                                    {{$applicant -> links() }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal detail -->
    <div class="modal fade" id="DetailModel" tabindex="-1" role="dialog" aria-labelledby="tetail" aria-hidden="true">
        <div class="modal-dialog" role="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Applicant detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" autocomplete="off">
                        @csrf
                        <div class="row">

                            <div class="form-group col-lg-12 " hidden>
                                <input class="form-control"  id="dialogid" name="dialogid" placeholder="id" value="">
                            </div>

                            <div class="form-group col-lg-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Names</label>
                                <input class="form-control" disabled  id="namedial" name="name" placeholder="Names" value="{{ old('name')}}">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="form-group col-lg-6 {{$errors->has('email') ? ' has-error' : ''  }}">
                                <label>Email Address</label>
                                <input class="form-control" disabled id="emaildial" name="email" value="{{old('email')}}">
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            <div class="form-group col-lg-6 {{$errors->has('nid') ? ' has-error' : ''  }}">
                                <label>Nat ional ID</label>
                                <input class="form-control" disabled id="niddial" name="nid" value="{{old('nid')}}">
                                <small class="text-danger">{{ $errors->first('nid') }}</small>
                            </div>


                            <div class="form-group col-lg-6 {{$errors->has('village') ? ' has-error' : ''  }}">
                                <label>Village</label>
                                <input class="form-control" disabled name="village" id="villagedial" value="{{old('village')}}">
                                <small class="text-danger">{{ $errors->first('village') }}</small>
                            </div>

                            <div class="form-group col-lg-6 {{$errors->has('cell') ? ' has-error' : ''  }}">
                                <label>Cell</label>
                                <input class="form-control" disabled name="cell" id="celldial" value="{{old('cell')}}">
                                <small class="text-danger">{{ $errors->first('cell') }}</small>
                            </div>

                            <div class="form-group col-lg-12 {{$errors->has('sector') ? ' has-error' : ''  }}">
                                <label>Sector</label>
                                <input class="form-control" disabled name="sector" id="sectordial" value="{{old('sector')}}">
                                <small class="text-danger">{{ $errors->first('sector') }}</small>
                            </div>

                             <div class="  col-lg-12 ">
                                 <p class="ml-5">Application Feedback :</p>
                                <span class="text-success text-center col-md-offset-0"  id="commentsdialog"></span></div>
                        </div>

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


    <!-- comment approve model -->
    <div class="modal fade" id="commentDialog" tabindex="-1" role="dialog" aria-labelledby="modelComment" aria-hidden="true">
        <div class="modal-dialog modal-md" role="">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id=""> Approval comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form method="post" action="/admin/sector/approval">
                        @csrf
                        <input type="text" hidden name="commentid" id="commentid">

                         <div class="form-group">
                             <input class="form-control" name="comment" id="comment" placeholder="youur comment">
                         </div>
                        <div class="row col-md-offset-3">
                            <input class=" btn-success btn-sm" type="submit" value="Confirm" required>
                            <input class="btn-warning btn-sm" type="button" data-dismiss="modal" value="Cancel">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- comment reject model -->
<div class="modal fade" id="rejectModeldialog" tabindex="-1" role="dialog" aria-labelledby="rejectModeldialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-danger" id=""> Reject comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="post" action="/admin/sector/reject">
                    @csrf
                    <input type="text" hidden name="commentid2" id="commentid2">

                    <div class="form-group">
                        <input class="form-control" name="comment" id="comment" placeholder="youur comment" required>
                    </div>
                    <div class="row col-md-offset-3">
                        <input class=" btn-danger btn-sm" type="submit" value="Confirm">
                        <input class="btn-info btn-sm" type="button" data-dismiss="modal" value="Cancel">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@include('footer')

