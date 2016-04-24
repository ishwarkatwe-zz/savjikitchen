@extends('pages.layout.master')
@section('title', 'Add Recipe')
@section('title-info', 'Please provide detail information about the recipe')
@section('content')
@parent
{!! Form::open(array('url' => 'save_recipe','method'=>'POST','id'=>'frmAddRecipe','name'=>'frmAddRecipe','enctype'=>'multipart/form-data')) !!}    
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
                <input type="text" class="form-control" id="name" name="name" placeholder="Recipe name">
            </div>
            <div class="form-group col-md-6">
                <label for="category">Category <span class="text-danger">*</span></label>

                <select class="form-control" id="category" name="category">
                    <option value="">--Choose--</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="category">Cooking method</label>
                <select class="form-control" id="cooking_method" name="cooking_method">
                    <option value="">--Choose--</option>
                    @foreach ($methods as $method)
                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="category">Cuisine</label>
                <select class="form-control" id="cuisine" name="cuisine">
                    <option value="">--Choose--</option>
                    @foreach ($cuisines as $cuisine)
                    <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-3">
                <label for="cuisine">Serving <span class="text-danger">*</span></label>
                <input type="number" min="1" class="form-control" id="servings" name="servings" placeholder="Serving">
            </div>
            <div class="form-group col-md-3">
                <label for="cuisine">Time required <span class="text-danger">*</span></label>
                <select class="form-control" name="prepare_time" id="prepare_time">
                    <option value="">--Choose--</option>
                    @foreach ($prepare_time as $time)
                    <option value="{{ $time->id }}">{{ $time->time }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="is_vegetarian">Vegetarian <span class="text-danger">*</span></label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="is_vegetarian" checked="checked" value="1"/> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" class="radio-inline" name="is_vegetarian" value="0"/> No
                </label>    
            </div>
            <div class="form-group col-md-12">
                <label for="description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Please provide recipe description"></textarea>
            </div>
        </div><!-- /.row -->
    </div><!-- /.box-body -->
    <div class="box-header with-border">
        <h3 class="box-title">Ingredients</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-5"><label>Ex : Olive oil</label></div>
            <div class="col-md-3"><label>Ex : 1</label></div>
            <div class="col-md-3"><label>Ex : tbsp</label></div>
        </div>
        <div id="ingredient_list">
            <div class="row" id="ingredient_row">
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" data-role="ingredient_name" id="ingredient_name" name="ingredient_name" placeholder="Ingredient name">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" data-role="quantity" id="quantity" name="quantity" placeholder="Quantity">
                </div>
                <div class="form-group col-md-3">
                    <select class="form-control" data-role="unit" id="unit" name="unit">
                        <option value="">--Choose--</option>
                        @foreach ($units as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-xs pull-right" id="add_more_ingredients"><i class="fa fa-plus"></i> Add more</button>
    </div>

    <div class="box-header with-border">
        <h3 class="box-title">Instructions</h3>
    </div>
    <div class="box-body">
        <ol id="instruction_list">
            <li class="row" id="instruction_row">
                <div class="col-md-11">     
                    <textarea class="form-control" rows="3" name="instruction" id="instruction" placeholder="Please enter instruction"></textarea>
                </div>
            </li>
        </ol>
        <button type="button" class="btn btn-primary btn-xs pull-right" id="add_more_instructions"><i class="fa fa-plus"></i> Add more</button>

    </div>    

    <div class="box-header with-border">
        <h3 class="box-title">Recipe notes</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">     
                <textarea class="form-control" rows="3" name="note" id="note" placeholder="Please enter note for this recipe with can help user under better"></textarea>
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
                <input class="form-control" name="youtube_link" id="youtube_link" placeholder="Youtube Link" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">  
                Other Link :
            </div>
            <div class="form-group col-md-10">     
                <input class="form-control" name="other_link" id="other_link" placeholder="Other Link" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">  
                Tags :
            </div>
            <div class="form-group col-md-10">     
                <input class="form-control typeahead" name="tags" id="tags"  data-role="tagsinput"  placeholder="Keyword tags" />
            </div>
        </div>
    </div>  
    <div class="box-header with-border">
        <h3 class="box-title">Image Upload</h3>
    </div>
    <div class="box-body">
        <input name="recipe_image" id="recipe_image"  type="file" onchange="loadFile(event)"/>
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
    </div>  

    <input type="hidden" id="ingredient_count" name="ingredient_count" value="0" />
    <input type="hidden" id="instruction_count" name="instruction_count" value="0" />

    <div class="box-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </div>
</div>
</form>

@stop


@section('include_js')
<script type="text/javascript" src="{{ URL::asset('plugins/custom/addRecipe.js') }}"></script>
@stop