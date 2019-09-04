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


                                <table class="table table table-responsive table-bordered table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Application reason</th>
                                        <th>File</th>
                                        <th>Application Atatus</th>
                                        <th>Application level</th>
                                        <th>Time</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                    </thead>
                                    <tbody>
                                    @if($villageapp -> count()>0)
                                       <?php $count = 0 ?>
                                    @foreach($villageapp as $vapp)
                                        <?php $count++ ?>
                                    <tr>
                                        <td> <?php echo $count  ?></td>
                                        <td>{{$vapp['reason']}}</td>
                                        <td>
                                            <button type="button" class="btn btn-md btn-default" >
                                                <span class="fa fa-clipboard "></span> </a>
                                                <a href="{{$vapp['landcertificate']}}" download>
                                                    <span class="fa fa-download "></span> </a>
                                            </button>
                                        </td>
                                        @if($vapp['approval_status']!="pending")

                                            <td><span class="text-warning">active</span></td>
                                         @else
                                        <td><span class="text-warning">{{$vapp['approval_status']}}..</span></td>
                                         @endif

                                        <td><span class="text-danger">Village</span></td>
                                        <td>{{$vapp['created_at']}}</td>
                                        <td>
                                            @if($vapp['approval_status']!="pending")
                                            <button class="btn btn-primary btn-sm disabled">Edit</button>
                                                @else
                                                <button class="btn btn-primary btn-sm">Edit</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($vapp['approval_status']!="pending")
                                            <button class="btn btn-info btn-sm">Details</button>
                                                @else
                                                <button class="btn btn-info btn-sm disabled">Details</button>
                                            @endif
                                        </td>
                                    </tr>
                                        @endforeach
                                       @endif
                                      </tbody>
                                </table>



                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@include('footer')

