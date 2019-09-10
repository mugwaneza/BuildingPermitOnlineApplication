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
                                @if($basic -> count()>0)

                                <table class="table table table-responsive table-bordered table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Application reason</th>
                                        <th>File</th>
                                        <th>Application status</th>
                                        {{--<th>Application level</th>--}}
                                        <th>Time</th>
                                        {{--<th>Edit</th>--}}
                                        {{--<th>View</th>--}}
                                    </thead>
                                    <tbody>
                                       <?php $count = 0 ?>
                                    @foreach($basic as $vapp)
                                        <?php $count++ ?>
                                    <tr>
                                        <td> <?php echo $count  ?></td>
                                        <td>{{$vapp -> reason}}</td>
                                        <td>
                                            <button type="button" class="btn btn-md btn-default" >
                                                <span class="fa fa-clipboard "></span> </a>
                                                <a href="{{$vapp -> landcertificate}}" download>
                                                    <span class="fa fa-download "></span> </a>
                                            </button>
                                        </td>

                                        <td><span class="text-warning">{{$vapp -> approval_status}}</span></td>

                                        <td>{{$vapp -> created_at}}</td>

                                        {{--<td>--}}
                                            {{--@if( $vapp->vapproval !="pending")--}}
                                            {{--<button class="btn btn-primary btn-sm disabled">Edit</button>--}}
                                                {{--@else--}}
                                                {{--<button class="btn btn-primary btn-sm">Edit</button>--}}
                                            {{--@endif--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--@if( $vapp -> vapproval!="pending")--}}
                                            {{--<button class="btn btn-info btn-sm">Details</button>--}}
                                                {{--@else--}}
                                                {{--<button class="btn btn-info btn-sm disabled">Details</button>--}}
                                            {{--@endif--}}
                                        {{--</td>--}}

                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
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
