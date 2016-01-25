<table class="table table-hover">
    <tbody>
        <tr>
            <th>#</th>
            <th>Ingredient</th>
            <th style="width: 70px">Quantity</th>
            <th style="width: 70px">Unit</th>
            <th>Action</th>
        </tr>
        @if(count($recipe->ingredients) == 0)
        <tr>
            <td colspan="5" class="text-center">No Records</td>
        </tr> 
        @endif
        @foreach ($recipe->ingredients as $key => $ing)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ ucfirst($ing->name) }}</td>
            <td>{{ ucfirst($ing->quantity) }}</td>
            <td>{{ ucfirst($ing->measure->name) }}</td>
            <td>
                <a href="javascript:void(0)" class="btn btn-primary btn-xs" onclick="addEditIngredients({{ $recipe->id }},{{ $ing->id }})"><i class="fa fa-edit"></i> Edit</a>
                <a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="deleteIngredients({{ $recipe->id }},{{ $ing->id }})"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
