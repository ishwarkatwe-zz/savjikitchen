@extends('pages.layout.master')
@section('title', 'Edit Recipe')
@section('title-info', 'You can update your recipe information here.')
@section('content')
@parent
{!! Form::open(array('url' => 'processEditRecipe','method'=>'POST','id'=>'frmAddRecipe','name'=>'frmAddRecipe','enctype'=>'multipart/form-data')) !!}    
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Brief Information</h3>
        <div class="box-tools pull-right">
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Recipe Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Recipe name" value="{{ $recipe->name }}">
            </div>
            <div class="form-group col-md-6">
                <label for="category">Category <span class="text-danger">*</span></label>

                <select class="form-control" id="category" name="category">
                    <option value="">--Choose--</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($recipe->category_id==$category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="category">Cooking method</label>
                <select class="form-control" id="cooking_method" name="cooking_method">
                    <option value="">--Choose--</option>
                    @foreach ($methods as $method)
                    <option value="{{ $method->id }}" @if($recipe->cooking_method_id==$method->id) selected @endif >{{ $method->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="category">Cuisine</label>
                <select class="form-control" id="cuisine" name="cuisine">
                    <option value="">--Choose--</option>
                    @foreach ($cuisines as $cuisine)
                    <option value="{{ $cuisine->id }}" @if($recipe->cuisine_id==$cuisine->id) selected @endif >{{ $cuisine->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="cuisine">Serving <span class="text-danger">*</span></label>
                <input type="number" min="1" class="form-control" id="servings" name="servings" placeholder="Serving" value="{{ $recipe->servings }}">
            </div>
            <div class="form-group col-md-3">
                <label for="cuisine">Time required <span class="text-danger">*</span></label>
                <select class="form-control" name="prepare_time" id="prepare_time">
                    <option value="">--Choose--</option>
                    @foreach ($prepare_time as $time)
                    <option value="{{ $time->id }}" @if($recipe->preparation_time==$time->id) selected @endif >{{ $time->time }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="is_vegetarian">Vegetarian <span class="text-danger">*</span></label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="is_vegetarian" @if($recipe->is_vegetarian==1) checked @endif value="1"/> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" class="radio-inline" name="is_vegetarian" @if($recipe->is_vegetarian==0) checked @endif value="0"/> No
                </label>    
            </div>
            <div class="form-group col-md-12">
                <label for="description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Please provide recipe description">{{ $recipe->description  }}</textarea>
            </div>
        </div><!-- /.row -->
    </div><!-- /.box-body -->
    <div class="box-header with-border">
        <h3 class="box-title">Ingredients</h3>
        <button type="button" class="btn btn-primary btn-xs pull-right" onclick="addEditIngredients({{ $recipe->id }}, '')"><i class="fa fa-plus"></i> Add Ingredient</button>
    </div>
    <div class="box-body table-responsive" id="ingredient_list">
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
    </div>



    <div class="box-header with-border">
        <h3 class="box-title">Instructions</h3>
        <button type="button" class="btn btn-primary btn-xs pull-right" onclick="addEditInstruction({{ $recipe->id }}, '')"><i class="fa fa-plus"></i> Add Instruction</button>
    </div>

    <div class="box-body table-responsive" id="instruction_list">
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
    </div>


    <div class="box-header with-border">
        <h3 class="box-title">Recipe note</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">     
                <textarea class="form-control" rows="3" name="note" id="note" placeholder="Please enter note for this recipe with can help user under better">{{ $recipe->note  }}</textarea>
            </div>
        </div>
    </div>  

    <div class="box-header with-border">
        <h3 class="box-title">Social Network</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-2">  
                YouTube Link :
            </div>
            <div class="form-group col-md-10">     
                <input class="form-control" name="youtube_link" id="youtube_link" placeholder="Youtube Link" value="{{ $recipe->youtube_url  }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">  
                Other Link :
            </div>
            <div class="form-group col-md-10">     
                <input class="form-control" name="other_link" id="other_link" placeholder="Other Link" value="{{ $recipe->links  }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">  
                Tags :
            </div>
            <div class="form-group col-md-10">     
                <input class="form-control typeahead" name="tags" id="tags"  data-role="tagsinput"  placeholder="Keyword tags" value="{{ $recipe->tag->implode('name', ', ')  }}" />
            </div>
        </div>
    </div>  
    <div class="box-header with-border">
        <h3 class="box-title">Image Upload</h3>
    </div>
    <div class="box-body">
        <input name="recipe_image" id="recipe_image"  type="file" onchange="loadFile(event)"/>
        <br>
        <div class="row">
            <div class="col-md-3">
                <img src="{{ $recipe->recipeImage()  }}" class="img-responsive"/>
            </div>
            <div class="col-md-6">
              
            </div>
        </div>

        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
        <input type="hidden" id="old_image" name="old_image" value="img/{{ $recipe->image }}" />

    </div>  

    <input type="hidden" id="ingredient_count" name="ingredient_count" value="0" />
    <input type="hidden" id="instruction_count" name="instruction_count" value="{{ count($recipe->instructions) }}" />
    <input type="hidden" id="recipe_id" name="recipe_id" value="{{ $recipe->id }}" />

    <div class="box-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </div>
</div>
</form>
@stop

@section('include_js')
<script type="text/javascript" src="{{ URL::asset('plugins/custom/editRecipe.js') }}"></script>
@stop