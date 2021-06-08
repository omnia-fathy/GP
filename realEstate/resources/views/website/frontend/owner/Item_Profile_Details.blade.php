<div class="modal fade" id="EditMainTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="item_id" value="{{$item_id}}">
                <form id="data_form_edit">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</div>
@extends('website.frontend.owner.Item_Profile')
@section('profile_Content')

<div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
        <div class="card-body d-block p-4">
            <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Choose your Vacation time now!</a>
            <div class="row">
                <span class="font-xsssss fw-700 ps-3 pe-3 lh-32 text-uppercase rounded-3 ls-2 alert-info d-inline-block text-info"> <a href="javascript:void(0)" onclick="goreserve('{{$item_id}}');" id="gobutton" style="display: none;text-align: center;"> All done?</a></span>
            </div>
        </div>
        <!--January  -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["01"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="morejan" onclick="$('#jan')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">January</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="jan" style="display: none;">
                    @foreach($schedule["01"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">January</span></h4>
            </div>
            @endif
        </div>
        <!-- February -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["02"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="morefeb" onclick="$('#feb')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">February</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="feb" style="display: none;">
                    @foreach($schedule["02"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">February</span></h4>
            </div>
            @endif
        </div>
        <!-- March -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["03"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="moremar" onclick="$('#mar')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">March</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="mar" style="display: none;">
                    @foreach($schedule["03"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">March</span></h4>
            </div>
            @endif

        </div>
        <!-- April -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["04"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="moreapril" onclick="$('#april')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">April</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="april" style="display: none;">
                    @foreach($schedule["04"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">April</span></h4>
            </div>
            @endif

        </div>
        <!-- May -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["05"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="moremay" onclick="$('#may')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">May</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="may" style="display: none;">
                    @foreach($schedule["05"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">May</span></h4>
            </div>
            @endif
        </div>
        <!-- June -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["06"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="morejune" onclick="$('#june')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">June</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="june" style="display: none;">
                    @foreach($schedule["06"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">June</span></h4>
            </div>
            @endif
        </div>
        <!-- July -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["07"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="morejuly" onclick="$('#july')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">July</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="july" style="display: none;">
                    @foreach($schedule["07"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">July</span></h4>
            </div>
            @endif
        </div>
        <!-- August -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["08"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="moreaug" onclick="$('#aug')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">August</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="aug" style="display: none;">
                    @foreach($schedule["08"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">August</span></h4>
            </div>
            @endif
        </div>
        <!-- September -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["09"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="moresep" onclick="$('#sep')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">September</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="sep" style="display: none;">
                    @foreach($schedule["09"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">September</span></h4>
            </div>
            @endif
        </div>
        <!-- October -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["10"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="moreoct" onclick="$('#oct')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">October</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="oct" style="display: none;">
                    @foreach($schedule["10"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">October</span></h4>
            </div>
            @endif
        </div>
        <!-- November -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["11"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="morenov" onclick="$('#nov')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">November</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="nov" style="display: none;">
                    @foreach($schedule["11"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">November</span></h4>
            </div>
            @endif
        </div>
        <!-- December -->
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
            @if(isset($schedule["12"]))
            <div class="bg-success me-2 p-3 rounded-xxl">
                <a href="javascript:void(0)" id="moredec" onclick="$('#dec')
            .slideToggle();">
                    <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">December</span></h4>
                </a>
            </div>
            <h4 class="fw-700 text-grey-900 font-xssss mt-2">
                <ul id="dec" style="display: none;">
                    @foreach($schedule["12"] as $Dates => $date)
                    <?php
                    $day = \Carbon\Carbon::parse($date["date"])->format('d');
                    $day = $day + 1 - 1;
                    $SID = $date["schedule_Id"];
                    $ID = $date["date"];                                        ?>
                    <li>
                        <div> <span id="{{$ID}}" name="{{$SID}}" class="calendar-table__item" href="javascript:void(0)" onclick="test('{{$ID}}','{{$SID}}')">{{$day}}</span></div>
                    </li>
                    @endforeach
                </ul>
            </h4>
            @else
            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">December</span></h4>
            </div>
            @endif
        </div>
    </div>


</div>

<div class=" col-xl-8 col-xxl-9 col-lg-8">
    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
        <div class="card-body p-0 d-flex">
            <h3>
                Description
            </h3>
        </div>
        <div class="card-body p-0 me-lg-5">
            <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">

                @foreach ($details as $Property_Name => $Property_Id_Array)
                @foreach ($Property_Id_Array as $Property_Id => $Property_diff_Array)

            <ul>
                <li><a href="javascript:void(0)" id="moreprop{{$Property_Id}}" onclick="$('#property{{$Property_Id}}').slideToggle(function(){$('#moreprop{{$Property_Id}}').html($('#property{{$Property_Id}}').is(':visible')?'Hide {{$Property_Name}}':'{{$Property_Name}}');});" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">{{$Property_Name}}</a>
                    <!-- {{$i=0}} -->
                    <ul id="property{{$Property_Id}}" style="display: none;">
                        @foreach ($Property_diff_Array as $Property_diff => $detailValue)
                        <!-- {{$i+=1}} -->
                        <li>

                            <a href="javascript:void(0)" id="more{{$Property_diff}}" onclick="$('#diff{{$Property_diff}}').slideToggle(function(){$('#more{{$Property_diff}}').html($('#diff{{$Property_diff}}').is(':visible')?'Hide {{$Property_Name}} {{$i}}':'{{$Property_Name}} {{$i}}');});" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss">{{$Property_Name}} {{$i}}</span></a>
                            <a href="javascript:void(0)" onclick="AddDetail('{{$Property_Id}}','{{$Property_Name}}','{{$Property_diff}}')"><i style="padding-left:14px" class="feather-edit"></i></a>
                            <a href="javascript:void(0)" onclick="DeleteDetail('{{$Property_diff}}')"><i style="padding-left:14px" class="feather-trash-2"></i></a>

                            <!-- sha8ala hena -->
                            <ul id="diff{{$Property_diff}}" style="display: none;">
                                @if(count($detailValue) !=0 )
                                @foreach ($detailValue as $detail)
                                @if($detail->datatype=='text')
                                <li>{{$detail->Detail_Name}} : {{$detail->DetailValue}} </li>
                                @elseif($detail->datatype=='checkbox')
                                @if($detail->DetailValue=='yes')
                                <li>{{$detail->Detail_Name}} : <i class="feather-check-circle"></i></li>
                                @else
                                <li>{{$detail->Detail_Name}} : <i class="feather-x-circle"></i></li>
                                @endif
                                @elseif($detail->datatype=='file')
                                <li>{{$detail->Detail_Name}} : <div class="col-6 mb-2 pe-1"><a href="{{$detail->DetailValue}}" data-lightbox="roadtrip"><img src="{{asset('storage/profile gallery/'.$detail->DetailValue)}}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                </li>
                                @endif
                                @endforeach
                                @else
                                <li> no data for this {{$Property_Name}} yet </li>
                                @endif
                            </ul>

                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @endforeach
            @endforeach

            </p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
        <div class="card-body p-0 d-flex">
            <h3>
                Location
            </h3>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    var s = 0;
    var start;
    var end;
    var start_date;
    var end_Date;
    var start_id;
    var End_id;
    var schedule;

    function test(day, schedule_Id) {
        var date2;
        var clicked = document.getElementById(day);
        var clicked_id = clicked.getAttribute('id');
        var schedule_Id2;
        var disable;


        // if(clicked_id==start_id){clicked.className="calendar-table__item"; s=0; start_id=null; start=nu }// reset all days if s=0 or 1 or
        // else if(clicked_id==End_id){clicked.className="calendar-table__item"; s=1;}

        if (s == 0) {
            clicked.className = 'calendar-table__item_Start';
            s = 1;
            start = clicked;
            start_id = clicked.getAttribute('id');
            start_date = new Date(start_id);

            disable = document.getElementsByClassName("calendar-table__item");
            // console.log(disable.length); //44

            $('.calendar-table__item').each(function() {
                var $this = $(this);
                // console.log($this);
                schedule_Id2 = $this[0].getAttribute("name");
                date2 = new Date($this[0].getAttribute("id"));

                if (schedule_Id2 != schedule_Id) {
                    $this.removeClass('calendar-table__item').addClass('calendar-table__item_isdisable');
                }
                if (date2 < start_date) {
                    $this.removeClass('calendar-table__item').addClass('calendar-table__item_isdisable');
                }
            });
        } else if (s == 1) {

            clicked.className = 'calendar-table__item_End';
            end = clicked;
            End_id = end.getAttribute('id');
            end_Date = new Date(End_id);
            s = 2;
            if (End_id == start_id) {
                end.className = 'one_day';
            }

            $('.calendar-table__item').each(function() {
                var $this = $(this);
                date2 = new Date($this[0].getAttribute("id"));
                if (date2 > start_date && date2 < end_Date) {
                    // console.log($this);
                    $this.removeClass('calendar-table__item').addClass('calendar-table__item_Rang');

                }
            });
            // $("#gobutton").style.display = "none";
            schedule = schedule_Id;
            console.log(schedule);
            document.getElementById("gobutton").style.display = "inline";

        } else {
            end.className = 'calendar-table__item';
            start.className = 'calendar-table__item';
            $('.calendar-table__item_Rang').each(function() {
                var $this = $(this);
                $this.removeClass('calendar-table__item_Rang ').addClass('calendar-table__item');
            });
            $('.calendar-table__item_isdisable').each(function() {
                var $this = $(this);
                $this.removeClass('calendar-table__item_isdisable ').addClass('calendar-table__item');
            });
            s = 0;
            schedule = null;
            document.getElementById("gobutton").style.display = "none";
        }

    }

    function goreserve(item_id) {
        console.log(start_id);
        console.log(End_id);
        console.log(schedule);

        $.ajax({
            url: "{{route('calculate.days')}}",
            Type: "get",
            data: {
                start: start_id,
                end: End_id,
                schedule_Id: schedule,

            },
            success: function(data) {
                console.log(data);
                // return (['totalPrice'=>$totalPric>$start_date,"end_date"=>$end_date]);

                location.href = "/Payment/" + item_id + "/" + data['totalDays'] + "/" + data['totalPrice'] + "/" + data['price_per_night'] + "/" + data['start_date'] + "/" + data['end_date'];
            },
            error: function(data) {

                console.log(data['totalDays']);
            }

        });

    }

    function showDetails(Property_diff) {
        console.log("2bl el ajax");

        $.ajax({
            url: "{{route('detail.find')}}",
            Type: "PUT",
            data: {
                id: Property_diff
            },
            success: function(data) {
                console.log('gwa el ajax');
                console.log(data);
                var text = "";
                Object.values(data).forEach(val => {
                    text += "<li>" + val['Detail_Name'] + " : " + val['DetailValue'] + "</li>";
                });
                console.log(text);
                var check = $("#diff" + Property_diff).html();
                //   $("#diff" + Property_diff).html(text);
                if (check == "") {
                    $("#diff" + Property_diff).html(text);
                } else {
                    $("#diff" + Property_diff).html("");
                }
            },
            error: function() {
                console.log('Error');
            }

        });



    }

    function DeleteDetail(diff) {
        $.ajax({
            url: "{{route('delete.details')}}",
            Type: "PUT",
            data: {
                diff: diff,
            },
            success: function(data) {
                console.log(data);
            },
            error: function() {}

        });

    }

    function AddDetail(id, name, diff) {

        $("#exampleModalLabel").html(name);
        var Form = '';
        $.ajax({
            url: "{{route('Details.find')}}",
            Type: "PUT",
            data: {
                id: id,
                diff: diff
            },
            success: function(data) {

                var properties = data['properties'];
                var details = data['details'];

                $("#EditMainTypeModal").modal("toggle");
                Object.values(properties).forEach(val => {
                    var detail = details[val['Property_Detail_Id']];
                    if (detail != undefined) {
                        // console.log('found');
                        console.log(detail[0]['DetailValue']);

                        Form += ' <div class="form-group row"> ' +
                            '<label for="' + detail[0]['Detail_Id'] + '" class="col-md-2 col-form-label text-md-right">' + detail[0]['Detail_Name'] + '</label>' +
                            '<div class="col-md-5">';

                        if (detail[0]['datatype'] == "checkbox") {
                            if (detail[0]['DetailValue'] == "yes") {
                                Form += '<input type="' + detail[0]['datatype'] + '" id="' + detail[0]['Detail_Id'] + '" name="DetailItem[]" value="' + detail[0]['DetailValue'] + '" class="form-check-input" checked>' +
                                    '</div>' +
                                    '</div>';
                            } else {
                                Form += '<input type="' + detail[0]['datatype'] + '" id="' + detail[0]['Detail_Id'] + '" name="DetailItem[]" value="' + detail[0]['DetailValue'] + '" class="form-check-input" >' +
                                    '</div>' +
                                    '</div>';
                            }
                        } else {
                            Form += '<input type="' + detail[0]['datatype'] + '" id="' + detail[0]['Detail_Id'] + '" name="DetailItem[]" value="' + detail[0]['DetailValue'] + '" class="form-control" >' +
                                '</div>' +
                                '</div>';
                        }

                     

                    } else {
                        Form += ' <div class="form-group row"> ' +
                            '<label for="new" class="col-md-2 col-form-label text-md-right">' + val['Detail_Name'] + '</label>' +
                            '<div class="col-md-5">' +
                            '<input type="' + val['datatype'] + '" name="DetailItem[]" id="prop' + val['Property_Detail_Id'] + '" class="form-control" >' +
                            '<input type="hidden" id="diff" value="' + diff + '">' +
                            '</div>' +
                            '</div>';
                    }
                });

                if (Form == '')
                    Form = 'No Property Details';
                else
                    Form += ' <div class="form-group row mb-0">' +
                    '<div class="col-md-2 offset-md-2">' +
                    ' <button type="submit" class="btn btn-primary">' +
                    ' {{ __("Edit") }}';
                '</button>';


                $('#data_form_edit').html(Form);
                Object.values(data).forEach(val => {
                    $('#' + val['Property_Detail_Id']).val($('#PID' + val['Property_Detail_Id']).val());
                });

            },
            error: function() {
                console.log('Error');
            }

        });
    }

    $('#data_form_edit').submit(function() {
        var data = [];
        var item_id = $("#item_id").val();
        var diff = $("#diff").val();

        //3iza ageeb kol el inputs b get element by name
        //w b3deen 3iza 27ot el inputs value&id f array
        $('input[name="DetailItem[]"]').each(function() {
            data.push({
                id: this.id,
                value: this.value,
                type: this.type,
                diff: diff,
            });
        });
        var _token = $("input[name=_token]").val();
        //w b3den 3iza 2b3t el array le el controller
        $.ajax({
            type: "post",
            url: "{{ route('details.edit')}}",
            data: {
                data: data,
                item_id: item_id,
                _token: _token
            },
            success: function(s) {
                //hna 3iza anady 3la created succefully
                console.log(s);
            },
            error: function() {
                // hna anady 3la not created w kdaho
                console.log('Error');
            }
        });

    });
</script>

<style>
    /*label  {*/
    /*    display: inline-block;*/
    /*    padding: 5px;*/
    /*    background: red;*/
    /*}*/


    .one_day {
        border: 2px solid transparent;
        border-radius: 50%;
        color: black;
        font-size: 12px;
        font-weight: 700;
        width: 40%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background-color: #7e66ec;
        border-color: #fefefe;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
        box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
        color: #fff;
    }

    .calendar-table__item {
        border: 2px solid transparent;
        border-radius: 50%;
        color: #424588;
        font-size: 12px;
        font-weight: 700;
        width: 40%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;

    }

    .calendar-table__item_isdisable {
        border: 2px solid transparent;
        border-radius: 50%;
        color: #424588;
        font-size: 12px;
        font-weight: 700;
        width: 40%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;

        background-color: #dbd6d0;
        border-color: #dbd6d0;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        color: #fff;
        pointer-events: none;
    }


    .calendar-table__item:hover {
        background: #7e66ec;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        transition: 0.2s all ease-in;
    }

    .calendar-table__item_Start {
        border: 2px solid transparent;
        border-radius: 50%;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        width: 40%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #7e66ec;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        transition: 0.2s all ease-in;
        border-radius: 50% 50% 0 0;
    }

    .calendar-table__item_Rang {
        border: 2px solid transparent;
        border-radius: 50%;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        width: 40%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #7e66ec;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        transition: 0.2s all ease-in;
        border-radius: 0;
        border-width: 0 2px;
    }


    .calendar-table__item_End {
        border: 2px solid transparent;
        border-radius: 50%;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        width: 40%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #7e66ec;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        transition: 0.2s all ease-in;
        border-radius: 0 0 50% 50%;
    }

    calendar-table__item_isDisabled {
        border-color: #fefefe;
        background-color: #f2f6f8;
        color: #fff;
        opacity: 0.25;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
        box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
    }



    /* hover Form table  */
    .nav.side-menu>li>a:hover {
        color: red !important;
    }

    .nav.side-menu>li>a:hover,
    .nav>li>a:focus {
        text-decoration: none;
        background: transparent;
    }

    .nav.child_menu {
        display: none;
    }

    .nav.child_menu li:hover,
    .nav.child_menu li.active {
        background-color: rgba(255, 255, 255, 0.06);
    }

    .nav.child_menu li {
        padding-left: 36px;
    }

    .nav-md ul.nav.child_menu li:before {
        background: #425668;
        bottom: auto;
        content: "";
        height: 8px;
        left: 23px;
        margin-top: 15px;
        position: absolute;
        right: auto;
        width: 8px;
        z-index: 1;
        border-radius: 50%;
    }

    .nav-md ul.nav.child_menu li:after {
        border-left: 1px solid #425668;
        bottom: 0;
        content: "";
        left: 27px;
        position: absolute;
        top: 0;
    }

    .nav-md ul.nav.child_menu li:last-child::after {
        bottom: 50%;
    }

    /* form table*/
    .nav.side-menu>li>a,
    .nav.child_menu>li>a {
        color: black;
        font-weight: 500;
    }

    .nav.child_menu li li:hover,
    .nav.child_menu li li.active {
        background: none;
    }

    /* hover country state */
    .nav.child_menu li li a:hover,
    .nav.child_menu li li a.active {
        color: red;
    }

    .nav.side-menu>li.current-page,



    .nav.side-menu>li.active>a {
        text-shadow: rgba(0, 0, 0, 0.25) 0 -1px 0;
        background: -webkit-gradient(linear, left top, left bottom, from(#334556), to(#2C4257)), #2A3F54;
        background: linear-gradient(#334556, #2C4257), #2A3F54;
        -webkit-box-shadow: rgba(0, 0, 0, 0.25) 0 1px 0, inset rgba(255, 255, 255, 0.16) 0 1px 0;
        box-shadow: rgba(0, 0, 0, 0.25) 0 1px 0, inset rgba(255, 255, 255, 0.16) 0 1px 0;
    }

    .nav.child_menu>li>a {
        color: black;
        font-size: 12px;
        padding: 9px;
    }

    /*...............................*/


    .main_menu_side {
        padding: 0;
    }

    .menu_section {
        margin-bottom: 35px;
    }

    .nav-sm .nav.side-menu li a {
        text-align: center !important;
        font-weight: 400;
        font-size: 10px;
        padding: 10px 5px;
    }

    .nav-sm .nav.child_menu li.active,
    .nav-sm .nav.side-menu li.active-sm {
        border-right: 5px solid #1ABB9C;
    }

    @media print {
        .hidden-print {
            display: none !important
        }
    }

    /*........................*/

    .nav-sm .menu_section h3 {
        display: none;
    }

    .nav-sm .menu_section {
        margin: 0;
    }

    .menu_section {
        margin-bottom: 35px;
    }

    .menu_section h3 {
        padding-left: 23px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-weight: bold;
        font-size: 11px;
        margin-bottom: 0;
        margin-top: 0;
        text-shadow: 1px 1px #000;
    }

    .menu_section>ul {
        margin-top: 10px;
        display: block;
    }

    .nav-sm .nav.side-menu li a {
        text-align: center !important;
        font-weight: 400;
        font-size: 10px;
        padding: 10px 5px;
    }

    .nav-sm .nav.child_menu li.active,
    .nav-sm .nav.side-menu li.active-sm {
        border-right: 5px solid #1ABB9C;
    }

    .nav-sm ul.nav.child_menu ul,
    .nav-sm .nav.side-menu li.active-sm ul ul {
        position: static;
        width: 200px;
        background: none;
    }

    .nav-sm>.nav.side-menu>li.active-sm>a {
        color: #1ABB9C !important;
    }

    .nav-sm .nav.side-menu li a i.toggle-up {
        display: none !important;
    }

    .nav-sm .nav.side-menu li a i {
        font-size: 25px !important;
        text-align: center;
        width: 100% !important;
        margin-bottom: 5px;
    }

    .nav-sm ul.nav.child_menu {
        left: 100%;
        position: absolute;
        top: 0;
        width: 210px;
        z-index: 4000;
        background: #3E5367;
        display: none;
    }

    .nav-sm ul.nav.child_menu li {
        padding: 0 10px;
    }

    .nav-sm ul.nav.child_menu li a {
        text-align: left !important;
    }

    .nav.side-menu>li {
        position: relative;
        display: block;
        cursor: pointer;
    }

    .nav.side-menu>li>a {
        margin-bottom: 6px;
    }

    .main-container-wrapper {
        background-color: #f8fafa;
        min-width: 320px;
        min-height: 568px;
        max-width: 414px;
        overflow-y: auto;
    }

    @media (min-width: 415px) {
        .main-container-wrapper {
            -moz-box-shadow: 0px 32px 47px rgba(32, 23, 23, 0.09);
            -webkit-box-shadow: 0px 32px 47px rgba(32, 23, 23, 0.09);
            box-shadow: 0px 32px 47px rgba(32, 23, 23, 0.09);
            margin: 24px auto;
        }
    }

    header {
        background-color: #fff;
        display: flex;
        height: 58px;
        justify-content: space-between;
        overflow: hidden;
        position: relative;
    }

    .header__btn {
        background-color: #86d8c9;
        border: 2px solid #fff;
        border-radius: 50%;
        -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        height: 80px;
        padding-top: 18px;
        position: absolute;
        top: -25px;
        width: 80px;
    }

    .header__btn:hover,
    .header__btn:focus {
        background: #67cebb;
        transition: all 0.3s ease-in;
        outline: none;
    }

    .header__btn .icon {
        display: inline-block;
    }

    .header__btn--left {
        left: -25px;
        padding-left: 38px;
        text-align: left;
    }

    .header__btn--right {
        padding-right: 32px;
        right: -25px;
        text-align: right;
    }

    .calendar-container {
        background-color: #fff;
        padding: 16px;
        margin-bottom: 24px;
    }

    .calendar-container__header {
        display: flex;
        justify-content: space-between;
    }

    .calendar-container__btn {
        background: transparent;
        border: 0;
        cursor: pointer;
        font-size: 16px;
        outline: none;
        color: #e9e8e8;
    }

    .calendar-container__btn:hover,
    .calendar-container__btn:focus {
        color: #9faab7;
        transition: all 0.3s ease-in;
    }

    .calendar-container__title {
        color: #222741;
        font-size: 20px;
        font-weight: 700;
    }

    .calendar-table {
        margin-top: 12px;
        width: 100%;
    }




    .calendar-table__row {
        display: flex;
        justify-content: center;
    }

    .calendar-table__header {
        border-bottom: 2px solid #f2f6f8;
        margin-bottom: 4px;
    }

    .calendar-table_header .calendar-table_col {
        display: inline-block;
        color: #99a4ae;
        font-size: 12px;
        font-weight: 700;
        padding: 12px 3px;
        text-align: center;
        text-transform: uppercase;
        width: 40px;
        height: 38px;
    }

    @media (min-width: 360px) {
        .calendar-table_header .calendar-table_col {
            width: 46px;
        }
    }

    @media (min-width: 410px) {
        .calendar-table_header .calendar-table_col {
            width: 54px;
        }
    }

    .calendar-table_body .calendar-table_col {
        width: 40px;
        height: 42px;
        padding-bottom: 2px;
    }

    @media (min-width: 360px) {
        .calendar-table_body .calendar-table_col {
            width: 46px;
            height: 48px;
        }
    }

    @media (min-width: 410px) {
        .calendar-table_body .calendar-table_col {
            width: 54px;
            height: 56px;
        }
    }

    .calendar-table_today .calendar-table_item {
        border-color: #fefefe;
        background-color: #f2f6f8;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .calendar-table_event .calendar-table_item {
        background-color: #7e66ec;
        border-color: #fefefe;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .calendar-table__event--long {
        overflow-x: hidden;
    }

    .calendar-table_event--long .calendar-table_item {
        border-radius: 0;
        border-width: 0 2px;
    }

    .calendar-table_event--start .calendar-table_item {
        border-left: 2px solid #fff;
        border-radius: 50% 50% 0 0;
    }

    .calendar-table_event--start.calendar-tablecol:last-child .calendar-table_item {
        border-width: 2px;
    }

    .calendar-table_event--end .calendar-table_item {
        border-right: 2px solid #fff;
        border-radius: 0 0 50% 50%;
    }

    .calendar-table_event--end.calendar-tablecol:first-child .calendar-table_item {
        border-width: 2px;
    }

    .calendar-table_inactive .calendar-table_item {
        color: #fff;
        cursor: default;
    }

    .calendar-table_inactive .calendar-table_item:hover {
        background: transparent;
        box-shadow: none;
    }

    .calendar-table_inactive.calendar-tableevent .calendar-table_item {
        color: #fff;
        opacity: 0.25;
    }

    .calendar-table_inactive.calendar-tableevent .calendar-table_item:hover {
        background: #7e66ec;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .events-container {
        padding: 0 15px;
    }

    .events__title {
        color: #bec1ca;
        display: inline-block;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .events__tag {
        background: #7e66ec;
        border: 2px solid #fefefe;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        color: #fff;
        font-size: 10px;
        font-weight: 600;
        width: 60px;
        margin-left: 16px;
        padding: 5px 2px;
        text-align: center;
    }

    .events__tag--highlighted {
        background: #fdca40;
    }

    .events__item {
        background: #fff;
        border-left: 8px solid #86d8c9;
        border-radius: 2px;
        -moz-box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.05);
        -webkit-box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.05);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.05);
        padding: 15px 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .events__item--left {
        width: calc(100% - 76px);
    }

    .events__name {
        font-size: 12px;
        font-weight: 700;
        color: #222741;
        display: block;
        margin-bottom: 6px;
    }

    .events__date {
        font-size: 12px;
        color: #9faab7;
        display: inline-block;
    }
</style>


<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>

@endsection