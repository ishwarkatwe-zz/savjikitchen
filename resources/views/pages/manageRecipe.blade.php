@extends('pages.layout.master')
@section('title', 'Search Recipe')
@section('title-info', 'What would you like to cook today')
@section('content')
@parent
<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ (!empty($searchFor))? $count.' recipes found for '.$searchFor:'Find your recipe' }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(array('method' => 'POST','class'=>'form-horizontal')) !!}
            <div class="box-body">
                <div class="input-group">
                    {!! Form::text('searchFor',Input::old('searchFor',$searchFor), array("id"=>"searchFor","class"=>"form-control", "placeholder"=>"What would you like to cook today?" )) !!}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary-outline" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </div>
</div>

<div class="row">

    @foreach ($recipes as $recipe)
    <div class="col-md-4">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">{{ $recipe->name }}</h4>
                <h6 class="card-subtitle text-muted">{{ $recipe->catagoryNames(80) }}</h6>
            </div>
            <a href="{{ url('view_recipe') }}/{{ $recipe->id }}"> 
                <img class="img-responsive"  src="{{ $recipe->recipeImage() }}" alt="{{ $recipe->name }}">
            </a>
            <div class="card-block">
                <h6 class="card-subtitle text-muted pointer" onclick="comments({{ $recipe->id }})"><span id="like_count_{{ $recipe->id }}">{{ count($recipe->like_count) }}</span> likes &nbsp;&nbsp; <span id="comment_count">{{ count($recipe->comments) }}</span> comments</h6>
                <hr class="divider"/>
                <div class="row">
                    <div class="col-md-4 col-xs-4 text-center">
                        @if (!empty($recipe->like->like) && $recipe->like->like == 1)
                        <a href="javascript:void(0)" class="likeLink like" id="likeRecipeBtn_{{ $recipe->id }}" onclick="cardlike({{ $recipe->id }})" class="text-muted like"><i class="fa fa-thumbs-up"></i> Like</a>
                        @else
                        <a href="javascript:void(0)" class="likeLink" id="likeRecipeBtn_{{ $recipe->id }}" onclick="cardlike({{ $recipe->id }})" class="text-muted"><i class="fa fa-thumbs-o-up"></i> Like</a>
                        @endif
                    </div>
                    <div class="col-md-4 col-xs-4 text-center"><a href="javascript:void(0)" class="likeLink" class="text-muted" onclick="comments({{ $recipe->id }})"><i class="fa fa-comment"></i> Comment</a></div>
                    <div class="col-md-4 col-xs-4 text-center"><a href="javascript:void(0)" class="likeLink" class="text-muted"><i class="fa fa-share"></i> Share</a></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    <div class="clearfix"></div>
    <div class="text-center">
    <?php if(count($recipes)>0) { echo $recipes->appends(['searchFor' => Request::input('searchFor')])->render(); } ?>
    </div>
    @section('include_js')

    <script type="text/javascript" src="{{ URL::asset('plugins/custom/viewRecipe.js') }}"></script>
    @stop

</div>
@stop