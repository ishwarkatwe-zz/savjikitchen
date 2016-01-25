<table class="table table-hover">
    <tbody>
        <tr>
            <th>#</th>
            <th>Instruction</th>
            <th style="width: 150px;">Action</th>
        </tr>
        @foreach ($recipe->instructions as $key => $inst)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ ucfirst($inst->instruction) }}</td>
            <td>
                <button type="button" class="btn btn-primary btn-xs" onclick="addEditInstruction({{ $recipe->id }},{{ $inst->id }})"><i class="fa fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger btn-xs" onclick="deleteInstructions({{ $recipe->id }},{{ $inst->id }})"><i class="fa fa-trash-o"></i> Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>