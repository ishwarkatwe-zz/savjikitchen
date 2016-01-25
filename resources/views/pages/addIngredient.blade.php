<form class="form-horizontal" id="frmIngredient" name="frmIngredient" method="POST">
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Ingredient Name <span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="ingredient_name" name="ingredient_name" placeholder="Ex: Olive oil" value="{{ $ingredent['name'] }}" />
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Quantity <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="4" value="{{ $ingredent['quantity'] }}">
            </div>
            <div class="col-sm-4">
                <select class="form-control" id="unit" name="unit">
                    <option value="">--Choose--</option>
                    @foreach ($units as $u)
                    <option value="{{ $u->id }}"
                            @if($u->id == $ingredent['unit_id']) selected @endif >{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer text-center">
        <input type="hidden" id="intRecipeId" name="intRecipeId" value="{{ $intRecipeId }}"/>
        <input type="hidden" id="intIngredientId" name="intIngredientId" value="{{ $intIngredientId }}"/>
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i> Close</button>
    </div><!-- /.box-footer -->
</form>

<script>
    $('#frmIngredient').validate({
        rules: {
            ingredient_name: "required",
            quantity: {
                required: true,
                number: true
            },
            unit: "required"
        },
        messages: {
            ingredient_name: "Please enter ingredient name",
            quantity: {
                required: "Please enter quantity",
                number: "Please enter numeric quantity"
            },
            unit: "Please choose unit"
        },
        submitHandler: function (form) {
            var data = $("#frmIngredient").serialize();
            $.post(base_url + "/processAddIngredient", data, function (result) {
                $('#ingredient_list').html(result);

                var intIngredientId = $('#intIngredientId').val();
                if (intIngredientId == '') {
                    show_success('Ingredient added successfully');
                }
                else {
                    show_success('Ingredient updated successfully');
                }
                $('#commonBox').modal('hide');
            });
            return false;
        }
    });

</script>