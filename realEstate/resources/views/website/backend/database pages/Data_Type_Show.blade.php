@extends('website.backend.database pages.Data_Type')
@section('table')
<form method="Post" action="{{ url('/delete_data_types?_method=delete') }}" enctype="multipart/form-data">
    @csrf
<table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
    <thead>
        <tr>
           
        <th><h2 style="margin-right:200px; padding-bottom: 5px;">Data Type Name</h2></th>
                        <th ><h2 style="margin-right:250px;padding-bottom: 5px;">Edit</h2></th>
                  <th >Select all <input type="checkbox" id="selectAll" name="selectAll">  <button class="btn"><i class="fa fa-trash" style="margin-right:200px;"></i></th>
                     
            <script>
                document.getElementById('selectAll').onclick = function() {
                    var checkboxes = document.getElementsByName('id[]'); //get all check boxes with name delete
                    for (var checkbox of checkboxes) { //for loop to set all checkboxes to checked
                        checkbox.checked = this.checked;
                    }
                }
            </script>
        </tr>
    </thead>
    <tbody>
        <!-- EL FOREARCH HNA -->
        @foreach($data_types as $data_types)
     
        <tr>
            <td>{{$data_types->datatype}}</td>
            
                         <input type="hidden" name="_method" value="DELETE">
                        <td><a href="javascript:void(0)" onclick="setDataTypeIdName('{{$data_types->id}}','{{$data_types->datatype}}')"><i class="fa fa-edit"> Edit</i></a></td>
                        <td><input type="checkbox" name="id[]" value="{{$data_types->id}}"></td>
                    </tr>
                @endforeach
                <!-- END OF FOREACH -->
            </tbody>
        </table>
        
        </form>
<!-- Modal -->
<div class="modal fade" id="EditDataTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditDataTypeForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="DataTypeName" >Data Type Name</label>
                        <input type="text" name="DataTypeName" id="DataTypeName" class="form-control">
                    </div>
                    <button  type="submit" class="btn btn-success">Edit</button>
                </form>

            </div>
        </div>
    </div>
</div>

    <script>
        function setDataTypeIdName(id,name){

                $("#id").val(id);
                $("#DataTypeName").val(name);
                $("#EditDataTypeModal").modal("toggle");
        }
        $('#EditDataTypeForm').submit(function (){

            var id=$("#id").val();
            var DataTypeName=$("#DataTypeName").val();
            var _token= $("input[name=_token]").val();
            
            $.ajax({
                url:"{{route('usertype.update')}}",
                Type:"PUT",
                data:{
                    id:id,
                    DataTypeName:DataTypeName,
                     _token:_token
                },
                success:function (response){
                    console.log('Success')
                    console.log(response);
                    $('#sid'+response.id + 'td:nth-child(1)').text(response.DataTypeName);
                    $("#EditDataTypeModal").modal("toggle");
                    // $("#EditDataTypeModal")[0].reset();
                },
                error:function ()
                {
                    console.log('Error');
                }

            });
        })
    </script>
@endsection
