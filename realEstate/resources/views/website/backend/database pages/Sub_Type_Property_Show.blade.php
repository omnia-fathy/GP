@extends('website.backend.database pages.Sub_Type_Property')
@section('Property_Details_table')
    <div class="row">
        <div class="col-sm-12">
            <form method="Post" action="{{ url('/delete_sub_type_property?_method=delete') }}" enctype="multipart/form-data">
                @csrf
            <table id="datatable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
                <thead>
                <tr>
                    <th>Main Type</th>
                    <th>Sub Type</th>
                    <th>Property Name</th>
                    <th>Select all <input type="checkbox" id="selectAll" name="selectAll">  <input type="submit" value="Delete Selected" class="btn btn-secondary"> </th>
                    <th></th>
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
                </thead>
                <tbody>
                <!-- EL FOREARCH HNA -->
                @foreach($property as $property)
                    <tr>
                        <td>{{$property->Main_Type_Name}}</td>
                        <td>{{$property->Sub_Type_Name}}</td>
                        <td>{{$property->Property_Name}}</td>
                        <td><input type="checkbox" name="id[]" value="{{$property->Property_Id}}"></td>
                        <td><a href="javascript:void(0)" onclick="setSubTypePropertyIdName('{{$property->Property_Id}}','{{$property->Property_Name}}')"><i class="fa fa-edit"> Edit</i></a></td>
                 </tr>
                @endforeach
                <!-- END OF FOREACH -->
                
            </tbody>
        </table>
    </form>
        </div>
    </div>
    <div class="modal fade" id="EditSubTypePropertyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sub Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditSubTypeForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
            
                    <div class="form-group">
                        <label for="SubTypePropertyName" >Property Name</label>
                        <input type="text" name="SubTypePropertyName" id="SubTypePropertyName" class="form-control">
                    </div>
                    <button  type="submit" class="btn btn-success">Edit</button>
                </form>

            </div>
        </div>
    </div>
</div>

    <script>
        function setSubTypePropertyIdName(id,name){

                $("#id").val(id);
                $("#SubTypePropertyName").val(name);
                $("#EditSubTypePropertyModal").modal("toggle");
        }
        $('#EditSubTypeForm').submit(function (){

            var id=$("#id").val();
            // var MainTypeid=$("#MainTypeNameEdit").val();
            var SubTypePropertyName=$("#SubTypePropertyName").val();
            var _token= $("input[name=_token]").val();
            
            $.ajax({
                url:"{{route('subTypeProperty.update')}}",
                Type:"PUT",
                data:{
                    id:id,
                    // MainTypeid:MainTypeid,
                    SubTypePropertyName:SubTypePropertyName,
                     _token:_token
                },
                success:function (){
                    console.log('Success');
                    $("#EditSubTypePropertyModal").modal("toggle");
                    // $("#EditSubTypePropertyModal")[0].reset();
                },
                error:function ()
                {
                    console.log('Error');
                }

            });
        })
    </script>
@endsection
