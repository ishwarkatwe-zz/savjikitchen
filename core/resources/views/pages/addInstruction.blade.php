<form class="form-horizontal" id="frmInstruction" name="frmInstruction" method="POST">
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Instruction <span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <textarea maxlength="1000" rows="5" class="form-control" id="instruction" name="instruction" placeholder="Instruction for cooking">{{ $instruction['instruction'] }}</textarea>
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer text-center">
        <input type="hidden" id="intRecipeId" name="intRecipeId" value="{{ $intRecipeId }}"/>
        <input type="hidden" id="intInstructionId" name="intInstructionId" value="{{ $intInstructionId }}"/>
        <button class="btn btn-primary" ><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i> Close</button>
    </div><!-- /.box-footer -->
</form>

<script>
    $('#frmInstruction').validate({
        rules: {
            instruction: "required"
        },
        messages: {
            instruction: "Please enter instruction name"
        },
        submitHandler: function (form) {
            var data = $("#frmInstruction").serialize();
            $.post(base_url + "/processAddInstruction", data, function (result) {
                $('#instruction_list').html(result);
                
                var intInstructionId = $('#intInstructionId').val();
                if (intInstructionId == '') {
                    show_success('Instruction added successfully');
                }
                else {
                    show_success('Instruction updated successfully');
                }
                $('#commonBox').modal('hide');
            });
            return false;
        }
    });

</script>