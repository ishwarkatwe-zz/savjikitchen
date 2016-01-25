@extends('pages.layout.master')
@section('title', $userName.'\'s Recipe')
@section('title-info', 'Manage your posted recipes here')
@section('content')
@parent

<div class="row">

    @foreach ($recipes as $recipe)
    <div class="col-md-4">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">{{ $recipe->name }}</h4>
                <h6 class="card-subtitle text-muted">{{ $recipe->category->name.', '.$recipe->cuisine->name.', '.$recipe->cooking_method->name}}</h6>
            </div>
            @if ($recipe->user->id == Auth::user()->id)
            <div class="portfolio-item" > 
                <img class="img-responsive" src="{{ $recipe->recipeImage() }}" alt="{{ $recipe->name }}">
                <div class="portfolio-item-content text-center">
                    <a href="{{ url('view_recipe') }}/{{ $recipe->id }}" class="btn btn-primary btn-nav"><i class="fa fa-eye"></i> View </a>
                    <a href="{{ url('edit_recipe') }}/{{ $recipe->id }}"  class="btn btn-info btn-nav"><i class="fa fa-edit"></i> Edit </a>
                    <button class="btn btn-danger btn-nav" onclick="deleteRecipe({{ $recipe->id }})"><i class="fa fa-trash-o"></i> Delete </button>
                </div>
            </div>
            @else
            <a href="{{ url('view_recipe') }}/{{ $recipe->id }}"> 
                <img class="img-responsive" style="width: 350px; height: 200px" src="{{ url("img/".$recipe->image) }}" alt="{{ $recipe->name }}">
            </a>
            @endif

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
        <?php
        if (count($recipes) > 0) {
            echo $recipes->appends(['userId' => $userId])->render();
        }
        ?>
    </div>
    @section('include_js')

    <script type="text/javascript" src="{{ URL::asset('plugins/custom/viewRecipe.js') }}"></script>
    @stop

</div>
@stop