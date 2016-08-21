@extends('pages.layout.master')
@section('title', 'Members Submitted Recipe')
@section('title-info', 'Pending approval')
@section('content')
@parent
   
	 <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Added By</th>
                    <th>Added On</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recipes as $r)
                <tr>
                    <td>{{ $r->recipeName() }}</td>
                    <td>{{ $r->catagoryNames(50) }}</td>
                    <td>{{ $r->user->userName() }}</td>
                    <td>{{ $r->addedOn() }}</td>
                    <td>
					<span id="lab_{{ $r->id }}">
					@if($r->active==1)
						<label class="label label-success">Active</label>
					@else
						<label class="label label-danger">In-Active</label>
					@endif
					</span>
					</td>
                    <td>
						<select class="form-control" onchange="update_status({{$r->id}},this.value)">
							<option value="">--Choose--</option>
							<option value="1">Active</option>
							<option value="0">In-Active</option>
						</select>
					</td>
                    <td>
						<a href="{{ url('view_recipe/'.$r->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
					</td>
                </tr>
                @endforeach
            </tbody>

        </table>
@stop

@section('include_js')
	<script>
		function update_status(intRecipeId,intStatus){
			var status = (intStatus==1)?"Active":"In-Active";
			
			var r = confirm("Are you sure want to "+status+" this recipe?");
			if(r){
				$.post(base_url + "/processStatus", {intRecipeId: intRecipeId,intStatus:intStatus}, function (result) {
					if(result=='1'){
						show_success("Recipe status updated");
						var lab;
						if(intStatus==1){
							lab = '<label class="label label-success">Active</label>';
						}
						else{
							lab = '<label class="label label-danger">In-Active</label>';
						}
						$('#lab_'+intRecipeId).html(lab);
						console.log(lab);
					}
					else{
						show_error("Recipe status update failed");
					}
				});
			}
		}
	</script>
@stop