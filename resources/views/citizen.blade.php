@extends('main')
 @section('content')
   @include('citizen_menus')

    <div class="analytics-sparkle-area">
        <div class="container-fluid dasboardcontainer">

            <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <div id="dropzone1" class="pro-ad  col-md-10 ">
                                <br><h3 class="col-md-offset-2 " style="margin-top: 50px;">Personal applications</h3><br>
                                @if($uvillage -> count()>0 || $uvcsector->count()>0 ||$uvcell ->count()>0 )


                      <table class="table table-responsive table-bordered table-hover table-striped col-md-offset-2">
                                    <thead>
                                        <th>No</th>
                                        <th>Reason</th>
                                        <th>Land Certificate</th>
                                        <th>Blueprint</th>
                                        <th>Status</th>
                                        <th>Feedback</th>
                                        <th>Level</th>
                                        <th>Created on</th>
                                    </thead>
                                    <tbody>
                                       <?php $count = 0 ?>


                                        @if($uvcsector->count()>0)
                                            @foreach ($uvcsector as $uvcs )

                                        <?php $count++ ?>
                                    <tr>
                                        <td> <?php echo $count  ?></td>
                                        <td>{{$uvcs -> Cell -> Village -> reason}}</td>

                                        <td><button type="button" class="btn btn-md btn-default" >
                                                <span class="fa fa-clipboard "></span> </a>
                                                <a href="{{$uvcs -> Cell -> Village -> landcertificate}}" download>
                                                    <span class="fa fa-download text-warning"></span> </a>
                                            </button>
                                        </td>
                                       <td>
                                        <button type="button" class="btn btn-md btn-default" >
                                            <span class="fa fa-clipboard "></span> </a>
                                            <a href="{{$uvcs -> Cell -> Village ->blueprint}}" download>
                                                <span class="fa fa-download text-success"></span> </a>
                                        </button>
                                       </td>

                                         @if($uvcs -> approval_status =="permited" || $uvcs -> approval_status =="approved")
                                        <td><span class="text-succes text-left">{{$uvcs -> approval_status}}</span></td>
                                        <td class="text-success">{{$uvcs -> feeback}}<br>
                                            <button type="button" class="btn btn-md btn-default printCertBtn center-block" >
                                            <span class="fa fa fa-download text-info"></span>
                                             </button>
                                        </td>

                                        @elseif($uvcs -> approval_status =="rejected")
                                         <td><span class="text-danger">{{$uvcs -> approval_status}}</span></td>
                                            <td class="text-danger">{{$uvcs -> feeback}}</td>

                                        @else
                                         <td><span class="text-warning">{{$uvcs -> approval_status}}</span></td>
                                            <td class="text-warning">{{$uvcs -> feeback}}</td>
                                        @endif

                                            <td><span class="text-warning">Sector</span></td>
                                            <td>{{$uvcs -> Cell -> Village -> UserApplicant -> created_at ->format('d-m-Y')}}</td>
                                            <td class="landmanager" hidden>{{$uvcs -> SectorCoord -> name}}</td>

                                    </tr>
                                    @endforeach
                                      @else

                                            @if($uvcell -> count()>0)

                                 <?php $count++ ?>

                                 @foreach ($uvcell as $uvc )

                                     <tr>
                                    <td> <?php echo $count  ?></td>
                                    <td>{{$uvc  -> Village -> reason}}</td>

                                    <td><button type="button" class="btn btn-md btn-default" >
                                            <span class="fa fa-clipboard "></span> </a>
                                            <a href="{{$uvc -> Village -> landcertificate}}" download>
                                                <span class="fa fa-download text-warning"></span> </a>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-md btn-default" >
                                            <span class="fa fa-clipboard "></span> </a>
                                            <a href="{{$uvc  -> Village ->blueprint}}" download>
                                                <span class="fa fa-download text-success"></span> </a>
                                        </button>
                                    </td>

                                    @if($uvc -> approval_status =="permited" || $uvc -> approval_status =="approved")
                                        <td><span class="text-success">{{$uvc -> approval_status}}</span></td>
                                        <td class="text-success">Waiting ..</td>

                                    @elseif($uvc -> approval_status =="rejected")
                                        <td><span class="text-danger">{{$uvc -> approval_status}}</span></td>
                                        <td class="text-danger">Waiting ..</td>

                                    @else
                                        <td><span class="text-warning">{{$uvc -> approval_status}}</span></td>
                                        <td class="text-warning">Waiting ..</td>
                                    @endif

                                    <td><span class="text-warning">Cell</span></td>
                                    <td>{{$uvc -> Village -> UserApplicant -> created_at ->format('d-m-Y')}}</td>
                                </tr>
                                     @endforeach
                                           @else
                                                @if($uvillage -> count()>0)

                                                    <?php $count++ ?>

                                                    @foreach($uvillage as $uv)
                                                    <tr>
                                                        <td> <?php echo $count  ?></td>
                                                        <td>{{$uv -> reason}}</td>

                                                        <td><button type="button" class="btn btn-md btn-default" >
                                                                <span class="fa fa-clipboard "></span> </a>
                                                                <a href="{{$uv -> landcertificate}}" download>
                                                                    <span class="fa fa-download text-warning"></span> </a>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-md btn-default" >
                                                                <span class="fa fa-clipboard "></span> </a>
                                                                <a href="{{$uv ->blueprint}}" download>
                                                                    <span class="fa fa-download text-success"></span> </a>
                                                            </button>
                                                        </td>

                                                        @if($uv -> approval_status =="permited" || $uv -> approval_status =="approved")
                                                            <td><span class="text-success">{{$uv -> approval_status}}</span></td>
                                                            <td class="text-success">Waiting ..</td>

                                                        @elseif($uv -> approval_status =="rejected")
                                                            <td><span class="text-danger">{{$uv -> approval_status}}</span></td>
                                                            <td class="text-danger">Waiting ..</td>

                                                        @else
                                                            <td><span class="text-warning">{{$uv -> approval_status}}</span></td>
                                                            <td class="text-warning">Waiting ..</td>
                                                        @endif

                                                        <td><span class="text-warning">Village</span></td>
                                                        <td>{{$uv -> created_at ->format('d-m-Y')}}</td>
                                                    </tr>
                                                    @endforeach

                                                    @endif
                                               @endif
                                         @endif

                                    </tbody>
                                </table>

                                       <div class="printableCert col-md-offset-2"  id="printableCert" style="display: none">
                                        <div class="logopermit" >

                                        </div>
                                        <div><p class="fonnt-bold text-big">
                                                <img src="{{@asset('fileuploads/buildingpermit.png')}}">

                                                <b class="col-md-offset-5" id="no">NO: <?php echo (rand()); ?> </b></p>
                                        </div>
                                        <br><p class="text-uppercase  text-big">
                                               <b>Date: </b> <?php $now = new DateTime();
                                                           echo $now->format('d-m-Y'); ?><br>
                                               <b>Sector:</b> {{$userInfo['sector']}}<br>
                                               <b>Cell:</b> {{$userInfo['cell']}}<br>
                                               <b>Village:</b> {{$userInfo['village']}}<br>
                                               <b>Dear</b> {{$userInfo['name']}}: <br>
                                                </p>
                                         <p class="text-center"><b>ONLINE BUILDING PERMIT CERTIFICATE</b></p>
                                        <p id="contents">This certificate is to let you know that we have received your application and you are allowed
                                            to build the <b>Plot number : UPI - <?php echo rand(10, 10000); ?></b> for which you applied,Thank you
                                            again, for your interest in our sytem. We do appreciate the time
                                            that you invested in this application.</p>

                                        <p class="mt-5" id="regards">Regards,<br>
                                        Land manager<br>
                                        <b><span id="landmanagername"></span></b>
                                        </p>
                                       </div>


                                    <div class="row " >
                                        <div class="myfooter offset-2" >
                                            {{--show pagination--}}
                                            {{$uvillage -> links() }}
                                        </div>

                                    </div>
                                @else
                                    <p class="col-md-offset-2 mt-5">Sorry ! you have no available application this time</p>
                                @endif



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
     </div>

   @include('footer')
