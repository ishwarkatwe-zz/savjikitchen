@extends('pages.layout.master')
@section('title', $recipe->name )
@section('title-info', '')
@section('content')
@parent
<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img src="{{ $recipe->recipeImage() }}" class=" img-responsive"/>
                <h3 class="profile-username text-center">{{ $recipe->name }}</h3>
                <p class="text-muted text-center">{{ $recipe->category->name }}, {{ $recipe->cuisine->name }}, {{ $recipe->cooking_method->name }} </p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-users"></i> Serving's <a class="pull-right">{{ $recipe->servings }}</a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-clock-o"></i> Preparation Time <a class="pull-right">{{ $recipe->time->time }}</a>
                    </li>
                    <li class="list-group-item">
                        @if ($recipe->is_vegetarian == 1)
                        <span class="label label-success"><i class="fa fa-spoon"></i> Vegetarian</span>
                        @else
                        <span class="label label-danger"><i class="fa fa-spoon"></i> Non-Vegetarian</span>
                        @endif
                    </li>
                </ul>

                <button type="button" id="likeRecipeBtn" onclick="like({{ $recipe->id }})" data-loading-text="Please wait..." class="btn btn-primary btn-block" autocomplete="off">
                    <i class="fa fa-thumbs-up"></i> 
                    @if (!empty($recipe->like->like) && $recipe->like->like == 1)
                    You liked this recipe
                    @else
                    Like
                    @endif
                    <span class="badge bg-warning">{{ count($recipe->like_count) }}</span>
                </button>


            </div><!-- /.box-body -->
        </div>



        <a href="{{ url('profile/'.$recipe->user->id) }}">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image profile-username">
                        <img class="img-circle" src="{{ $recipe->user->userImage() }}" alt="User Avatar">
                    </div><!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{ $recipe->user->userName() }}</h3>
                    <h5 class="widget-user-desc">Since {{ $recipe->user->getSinceDate() }}</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="{{ url('followers/F/'.$recipe->user->id) }}">Followers <span class="pull-right badge bg-orange"> {{ count($recipe->user->followers) }}</span></a></li>
                        <li><a href="{{ url('followers/I/'.$recipe->user->id) }}">Following <span class="pull-right badge bg-blue"> {{ count($recipe->user->following) }}</span></a></li>
                        <li><a href="http://www.facebook.com/sharer.php?u=www.savjikitchen.com/view_recipe/{{ $recipe->id}}&t={{ $recipe->name }}">Recipes <span class="pull-right badge bg-green">{{ $recipe->myRecipes(1,$recipe->user->id) }}</span></a></li>
                    </ul>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <p class="text-muted text-center"><b>Ingredient's Table</b></p>
                        <table class="table table-hover">
                            <tr>
                                <th>Ingredient</th>
                                <th>Measure</th>
                            </tr>
                            @foreach ($recipe->ingredients as $ing)
                            <tr>
                                <td>{{ $ing->name }}</td>
                                <td>{{ $ing->quantity }} {{ $ing->measure->name }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $recipe->name }}, {{ $recipe->category->name }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-info margin-r-5"></i>  About the recipe</strong>
                        <p class="text-muted margin-top-10">
                            {{ $recipe->description }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-list-ul margin-r-5"></i> Instructions</strong>
                        <ol class="margin-top-10">
                            @foreach ($recipe->instructions as $inst)
                            <li><p class="text-muted">{{ $inst->instruction }}</p></li>
                            @endforeach
                        </ol>


                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Note</strong>
                        <p class="margin-top-10">{{ $recipe->note }}</p>

                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i> Tags</strong>
                        <p class="margin-top-10">
                            @foreach ($recipe->tags as $tag)
                            <span class="label label-warning">{{ $tag->name }}</span>
                            @endforeach
                        </p>

                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i> Social Network</strong>
                        <br>
                        <br>
                        @if(!empty($recipe->youtube_url))
                        <a href="{{ $recipe->youtube_url }}" class="btn btn-social-icon btn-google"><i class="fa fa-youtube"></i></a>
                        @endif
                        @if(!empty($recipe->links))
                        <a href="{{ $recipe->links }}" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-link"></i></a>
                        @endif
                    </div><!-- /.box-body -->
                </div>

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <a href="javascript:void(0)" class="pull-left text-muted" onclick="commentInLine({{ $recipe->id }})"><span id="like_count_{{ $recipe->id }}">{{ count($recipe->like_count) }}</span> likes &nbsp;&nbsp; <span id="comment_count">{{ count($recipe->comments) }}</span> comments</a>
                <div class="clearfix"></div>
                <hr class="divider"/>
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if (!empty($recipe->like->like) && $recipe->like->like == 1)
                        <a href="javascript:void(0)" class="likeLink like" id="likeRecipeBtn_{{ $recipe->id }}" onclick="cardlike({{ $recipe->id }})" class="text-muted like"><i class="fa fa-thumbs-up"></i> Like</a>
                        @else
                        <a href="javascript:void(0)" class="likeLink" id="likeRecipeBtn_{{ $recipe->id }}" onclick="cardlike({{ $recipe->id }})" class="text-muted"><i class="fa fa-thumbs-o-up"></i> Like</a>
                        @endif
                    </div>
                    <div class="col-md-4 text-center"><a href="javascript:void(0)" class="likeLink" class="text-muted" onclick="commentInLine({{ $recipe->id }})"><i class="fa fa-comment"></i> Add Comment</a></div>
                    <div class="col-md-4 text-center"><a href="http://www.facebook.com/sharer.php?u=www.savjikitchen.com/view_recipe/{{ $recipe->id}}&t={{ $recipe->name }}"  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="likeLink" class="text-muted"><i class="fa fa-share"></i> Share</a></div>
                </div>
            </div>
            <div class="box-footer box-comments">
                <div id="comment_people"></div>
                <div id="comment_list" class="margin-top-10"></div>
            </div>
        </div>
    </div>

</div>

@stop

@section('include_js')
<script type="text/javascript" src="{{ URL::asset('plugins/custom/viewRecipe.js') }}"></script>
@stop