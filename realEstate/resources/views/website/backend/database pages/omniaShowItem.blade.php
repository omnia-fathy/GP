@extends('website.backend.database pages.Item')
@section('Item_Main_Type_table')

<link href="{{asset('css/ShowItem.css')}}" rel="stylesheet" type="text/css" />


<div class="C">
    
    <h2>{{$user->First_Name}} {{$user->Middle_Name}} {{$user->Last_Name}} Items </h2> 
    
</div>

<table id="datatable" class="table  pro  dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
    <thead>
        <tr>
            
            <td class="th1">User</td>
            <td class="td1"> 
                 Name : {{$user->First_Name}} {{$user->Middle_Name}} {{$user->Last_Name}} 
                <br>Email : {{$email->email}} <a href="javascript:void(0)" onclick="setUserId('{{$item_id}}')"><i class="fa fa-edit"> Edit</i></a>
                <br>Phone Number :{{$phone_number->phone_number}}
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th class="th1">Location</th>
            <td class="td1">{{$Location->Country_Name}},{{$Location->State_Name}},{{$Location->City_Name}},{{$Location->Region_Name}},{{$Location->Street_Name}}
                <a href="javascript:void(0)" onclick=""><i class="fa fa-edit"> Edit</i></a>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center" class="td1">Details</td>
        </tr>
        <tr>
            <form method="Post" action="{{ url('/delete_detail_item?_method=delete') }}" enctype="multipart/form-data">
                @csrf
                <table class="table pro2 table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">

                    @foreach ($details as $property => $detail)
                    <tr>
                        <td class="th2">
                            <h4>{{$property}}</h4>
                        </td>
                        <th class="th2">value</th>
                        <th class="th2">Select all <input type="checkbox" id="selectAll" name="selectAll"> </a> <input type="submit" value="Delete Selected" class="btn btn-secondary"></th>
                        <th class="th2">Edit</th>
                        <!-- Java Script for select all function -->
                        <script>
                            document.getElementById('selectAll').onclick = function() {
                                var checkboxes = document.getElementsByName('id[]'); //get all check boxes with name delete
                                for (var checkbox of checkboxes) { //for loop to set all checkboxes to checked
                                    checkbox.checked = this.checked;
                                }
                            }
                        </script>

                    </tr>

                    @foreach($detail as $detailValue)
                    <tr  class="ha">
                        <td>
                            <h6>{{$detailValue->Detail_Name}}</h6>
                        </td>
                        <td>
                            <h6>{{$detailValue->DetailValue}}</h6>
                        </td>
                        <td><input type="checkbox" name="id[]" value="{{$detailValue->Detail_Id}}"></td>
                        <td><a href="javascript:void(0)" onclick="setDetailIdName('{{$detailValue->Detail_Id}}','{{$detailValue->DetailValue}}')"><i class="fa fa-edit"></i></a></td>

                    </tr>

                    @endforeach


                    @endforeach
                </table>
            </form>
        </tr>
    </tbody>
</table>



@if(!empty($subtypeid))
<a href="{{url('/property_select/'.$item_id.'/'.$subtypeid.'')}}" id="btun1"class="btn btn-info "> Add More Details</a>
@else 
<a href="{{url('/addItemSteps/'.$item_id)}}" class="btn btn-info"id="btun1" > Add Details of item</a>

@endif
<a href="{{url('/Details')}}" class="btn btn-info" id="btun3">Search for an Item</a>
<a href="{{url('/Item')}}" class="btn btn-info" id="btun2"> Create Another Item</a>
<form method="Post" action="{{ url('/DelteItem/'.$item_id.'?_method=delete') }}" enctype="multipart/form-data">
                @csrf
<button type="submit" class="btn btn-danger" id="btun4"> Delete Item</button>
</form>
<div class="modal fade" id="EditDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sub Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditDetailForm">
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="DetailName"  style="font-size: 12pt">Detail Value</label>
                        <input type="text" style="border-radius: 3pt" name="DetailName" id="DetailName" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success" id="btun5">Edit</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Main type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditUserForm">
                    @csrf
                    <input type="hidden" name="id" id="item_id" value="{{$item_id}}">


                    <div class="item form-group">
                        <a href="javascript:void(0)" id="SearchA" onclick="searchForEmail()" class="btn btn-info" role="button">Search </a>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="search" id="Search" name="Search" required="required" class="form-control">
                            <input type="hidden" id="userIdHiddenInput" name="userIdHiddenInput">
                        </div>
                    </div>
                    <div class="item form-group">
                        <table id="result" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">

                        </table>
                    </div>

                    <button type="submit" id="EUbtn" class="btn btn-success">Edit</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    function searchForEmail() {

        var email = $("#Search").val();
        var _token = $("input[name=_token]").val();
        $.ajax({
            type: 'post',
            url: "{{ route('search') }}",
            data: {
                email: email,
                _token: _token
            },
            success: function(data) {
                Object.values(data).forEach(val => {
                    $("#result").html('<tr><td>' + val['email'] + '</td> <td> <input type="checkbox" name="userid" value="' + val['User_ID'] + '" onclick="onlyOne(this)"> </td> </tr>');
                });
            },
            error: function() {
                $("#result").html('There is no User with this Email!!');
            }
        });

    }

    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('userid')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
        $("#userIdHiddenInput").val(checkbox.value);
    }
</script>
<script>
    function setDetailIdName(id, name) {

        $("#id").val(id);
        $("#DetailName").val(name);
        $("#EditDetailModal").modal("toggle");
    }

    $('#EditDetailForm').submit(function() {

        var id = $("#id").val();
        // var MainTypeid=$("#MainTypeNameEdit").val();
        var DetailName = $("#DetailName").val();
        var _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('Detail.update')}}",
            Type: "PUT",
            data: {
                id: id,
                // MainTypeid:MainTypeid,
                DetailName: DetailName,
                _token: _token
            },
            success: function() {
                console.log('Success');
                $("#EditDetailModal").modal("toggle");
                // $("#EditDetailModal")[0].reset();
            },
            error: function() {
                console.log('Error');
            }

        });
    })


    function setUserId() {
        $("#EditUserModal").modal("toggle");
    }

    $('#EditUserForm').submit(function() {

        var b2dons=$("#item_id").val();
        var user_id = $("#userIdHiddenInput").val();
        console.log(user_id);console.log(b2dons);
        var _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('edit_item_user')}}",
            Type: "PUT",
            data: {
                id: b2dons,
                User_Id:user_id,
                _token: _token
            },
            success: function() {
                console.log('Success');
            },
            error: function(da) {
                console.log('Error');
            }

        });
    })
</script>
@endsection