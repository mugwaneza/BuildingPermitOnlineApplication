@extends('main')
 @section('content')
   @include('citizen_menus')

    <div class="analytics-sparkle-area">
        <div class="container-fluid dasboardcontainer">

            <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <div id="dropzone1" class="pro-ad">
                                <br><h3 class="col-md-offset-2 " style="margin-top: 50px;">Personal applications</h3><br>
                                @if($uvillage -> count()>0)

                                <table class="table table table-responsive table-bordered table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Application reason</th>
                                        <th>Land paper</th>
                                        <th>blueprint</th>
                                        <th>Application status</th>
                                        {{--<th>Application level</th>--}}
                                        <th>Time</th>
                                        {{--<th>Edit</th>--}}
                                        {{--<th>View</th>--}}
                                    </thead>
                                    <tbody>
                                       <?php $count = 0 ?>
                                    @foreach($uvillage as $uvi)
                                        <?php $count++ ?>
                                    <tr>
                                        <td> <?php echo $count  ?></td>
                                        <td>{{$uvi -> reason}}</td>
                                        <td>
                                            <button type="button" class="btn btn-md btn-default" >
                                                <span class="fa fa-clipboard "></span> </a>
                                                <a href="{{$uvi -> landcertificate}}" download>
                                                    <span class="fa fa-download text-warning"></span> </a>
                                            </button>
                                        </td>
                                       <td>
                                        <button type="button" class="btn btn-md btn-default" >
                                            <span class="fa fa-clipboard "></span> </a>
                                            <a href="{{$uvi -> blueprint}}" download>
                                                <span class="fa fa-download text-success"></span> </a>
                                        </button>
                                    </td>

{{--                                          @if($uvcsector->count()>0)

--}}{{--                                        @foreach ($uvcsector -> where('applicant_id',Session::get('citizensession')) as $uvcs)--}}{{--
                                             @foreach ($uvcsector -> where($uvi-> applicant_id,Session::get('citizensession')) as $uvcs)
                                            <td><span class="text-warning">{{$uvcs -> approval_status}}</span></td>
--}}{{--                                            <td><span class="text-warning">{{$uvcs -> Cell -> approval_status}}</span></td>--}}{{--
                                            <td><span class="text-warning">Sector</span></td>
                                            @endforeach

                                          @else

                                            @if($uvcell -> count()>0)

                                            @foreach ($uvcell->Village -> UserApplicant -> where('applicant_id',Session::get('citizensession')) as $uvc)
                                                <td><span class="text-warning">{{$uvc -> approval_status}}</span></td>
                                                <td><span class="text-warning">Cell</span></td>
                                            @endforeach
                                                @else
                                                <td><span class="text-warning">{{$uvi -> approval_status}}</span></td>
                                                <td><span class="text-warning">village</span></td>
                                             @endif



                                        @endif--}}

                                         @if($uvi -> approval_status =="permited" || $uvi -> approval_status =="approved")
                                        <td><span class="text-success">{{$uvi -> approval_status}}</span></td>
                                         @else
                                            <td><span class="text-warning">{{$uvi -> approval_status}}</span></td>

                                        @endif
                                        <td>{{$uvi -> created_at}}</td>

                                        {{--<td>--}}
                                            {{--@if($uvi->approval_status !="pending")--}}
                                                {{--<button class="btn btn-primary btn-sm disabled">Edit</button>--}}
                                            {{--@else--}}
                                                {{--<button class="btn btn-primary btn-sm">Edit</button>--}}
                                            {{--@endif--}}
                                        {{--</td>--}}



                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
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
