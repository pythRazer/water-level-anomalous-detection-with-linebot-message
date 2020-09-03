{{-- @extends('admin.template') --}}
@extends('layouts.master')





@section('content')
	<div class="container">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title">Name and Line ID List </h3>
	            </div>
	            <table class="table table-bordered table-striped table-condensed">
	                <tr>
                        <td>編號</td>
                        <td>姓名</td>
                        <td>Line ID</td>
                        <td>建立於</td>
                        <td>更新於</td>
                        <td>刪除</td>

	                </tr>

	                @foreach($data as $row)
		                <tr>
                            <td>
                                {{$row->id}}
                            </td>
		                    <td>
                                {{-- pk: Primary key --}}
		                    	<a href="#" class="xedit"
		                    	   data-pk="{{$row->id}}"
		                    	   data-name="name">
		                    	   {{$row->name}}</a>
		                    </td>

		                     <td>
		                    	<a href="#" class="xedit"
		                    	   data-pk="{{$row->id}}"
		                    	   data-name="lineID">
		                    	   {{$row->lineID}}</a>
                            </td>
                            <td>
                                {{$row->created_at}}
                            </td>
                            <td>
                                {{$row->updated_at}}
                            </td>
                            <td>
                                <a href="userinfo/{{$row->id}}/delete">刪除</a>
                                {{-- <a href="#" class="delete_data" data-pk="{{ $row->id }}">刪除</a> --}}
                            </td>
		                </tr>
	                @endforeach

	            </table>
	        </div>

	    </div>
	</div>


	<script>

		$(document).ready(function(){
	            $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': '{{csrf_token()}}'
	                }
	            });

                // edit table
	            // $('.xedit').editable({
	            //     url: '{{url("userinfo/update")}}',
	            //     title: 'Update',
	            //     success: function (response, newValue) {
	            //         console.log('Updated', response)
	            //     }
	            // });

                $('.xedit').editable({
	                url: 'userinfo/update',
	                title: 'Update',
	                success: function (response, newValue) {
	                    console.log('Updated', response)
	                }
	            });



                 // delete user
                // $(".delete_data").click(function(){
                //     var del_id = $(this).attr('id');
                //     var parent = $(this).parent();
                //     $.ajax({
                //         type:'POST',
                //         url: '9' +'/delete',
                //         data:'delete_id='+del_id,

                //         success:function(data) {
                //             parent.slideUp(300,function() {
                //             parent.remove();
                //             });
                //         }


                // });

                //  });
        });
	</script>
@endsection
