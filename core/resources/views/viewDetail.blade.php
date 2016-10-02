@extends('pages.layout.guest')
@section('title', $recipe->name )
@section('title-info', '')

@section('meta')
<meta name="description" content='{{ $recipe->description }} {{ $recipe->note }}' />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="SavjiKitchen - {{ $recipe->recipeName() }}">
<meta itemprop="description" content='{{ $recipe->description }} {{ $recipe->note }}'>
<meta itemprop="image" content="{{ $recipe->recipeImage() }}">

<!-- Twitter Card data -->
<meta name="twitter:card" content="{{ $recipe->recipeName() }}">
<meta name="twitter:site" content="www.savjikitchen.com">
<meta name="twitter:title" content="SavjiKitchen - {{ $recipe->recipeName() }}">
<meta name="twitter:description" content='{{ $recipe->description }} {{ $recipe->note }}'>
<meta name="twitter:creator" content="Savjikitchen">
<meta name="twitter:image" content="{{ $recipe->recipeImage() }}">

<!-- Open Graph data -->
<meta property="og:title" content="SavjiKitchen - {{ $recipe->recipeName() }}" />
<meta property="og:type" content="{{ $recipe->recipeName() }}" />
<meta property="og:url" content="http://www.savjikitchen.com/" />
<meta property="og:image" content="{{ $recipe->recipeImage() }}" />
<meta property="og:description" content='{{ $recipe->description }} {{ $recipe->note }}' />
<meta property="og:site_name" content="SavjiKitchen - {{ $recipe->recipeName() }}" />
<meta property="og:price:amount" content="Free" />
<meta property="og:price:currency" content="ISD" />
@stop

@section('content')
@parent
<div class="container view-recipe">
    <section class="social-links">

        <ul>
            <li><a href="http://www.facebook.com/sharer.php?u=www.savjikitchen.com/view_recipe/{{ $recipe->id}}&t={{ $recipe->name }}"  onclick="javascript:window.open(this.href, '', 'title=Share,menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a></li>
            <li><a  target="_blank" href="https://twitter.com/intent/tweet?
url=www.savjikitchen.com/view_recipe/{{ $recipe->id}}
text=Savjikitchen - {{ $recipe->name }}
hashtags=savji,foodlovers,food"><i class="fa fa-twitter"></i></a></li>
            <li><a target="_blank"  href="https://plus.google.com/103682649455187926306"><i class="fa fa-google"></i></a></li>
            <li><a target="_blank"  href="https://www.youtube.com/channel/UCw0CIGjw96q1yKnHysKZ1NA"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </section>

    <main>
        <div class="row">
            <div class="col-md-3">
                @include('subviews.searchbox')
            </div>
            <div class="col-md-9">
                <h3 class="recipe-name">{{ $recipe->recipeName() }} <i class="fa fa-eye pull-right"> {{ $recipe->views() }}</i></h3>
                <section class="recipe-view">
                    <div class="recipe-cover" style="background:url({{ $recipe->recipeImage() }})">                                   
                    </div>    

                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="titles">Ingredients</h3>
                            <ul class="ingredients">
                                @foreach($recipe->ingredients as $i)
                                <li>{{$i->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-7">
                            <p class="desc">{{ $recipe->description }}</p>

                            <div class="steps">
                                <h4>Method</h4>
                                <ol>
                                    @foreach ($recipe->instructions as $inst)
                                    <li>{{ $inst->instruction }}</li>
                                    @endforeach
                                </ol>
                                <br><br>
                                <h5><b>Note : </b> {{ $recipe->note }}</h5>
                            </div>
                        </div>
                    </div>

                    <h4><i class="fa fa-comments"></i> Write your opinion on this recipe</h4>
                    <hr/>

                    @if(count($recipe->comments)==0)
                    <div class="no-comments">No Comments</div>
                    @endif


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">

                            @foreach ($recipe->comments as $comment)
                            <div class="comment">
                                <img src="{{ $comment->user->userImage() }}" alt="{{ $comment->user->userName() }}"/>
                                <span class="date"><i class="fa fa-clock-o"></i> {{ $comment->time_ago() }}
                                </span>
                                <a href="#"><b>{{ $comment->user->userName() }}</b></a>
                                <p>{{ $comment->comment }}</p>
                            </div>       
                            @endforeach 

                            <div class="clearfix margin10"></div>

                            <div class="row">
                                @if(!Auth::check())
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Login Password">
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Comment <span class="required">*</span></label>
                                        <textarea class="form-control" rows="4" name="recipe_comment" id="recipe_comment" placeholder="Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" id='recipe_id' name="recipe_id" value="{{$recipe->id}}"/>
                                        <button class="btn btn-primary" onclick="
                                                @if (!Auth::check())
                                                        postLogin();
                                                        @ else
                                                        saveComment();
                                                        @endif"><i class="fa fa-send"></i> Post Comment</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                </section>
            </div>

        </div>
    </main>
</div>
        <br>
@stop
@section('include_js')

<script>
    function saveComment() {
        var recipe_comment = $('#recipe_comment').val().trim();
        var recipe_id = $('#recipe_id').val();

        if (recipe_comment == '') {
            alert('Please provide comment');
        } else {
            $.post(base_url + "/save_comment", {recipe_id: recipe_id, comment: recipe_comment}, function (result) {
                window.location = base_url + "/viewDetail/" + recipe_id;
            });
        }
    }

    function checkLogin() {
        $.post(base_url + "/checkLogin", function (result) {
            if (result == 0) {
                alert("Please login to post comment");
            } else {
                return true;
            }
        });
    }

    function postLogin() {
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();

        if (email != '' && password != '') {

            var data = {
                password: password,
                email: email
            };
            $.post(base_url + "/postLogin", data, function (result) {
                if (parseInt(result) == '1') {
                    saveComment();
                } else {
                    alert("Invalid login details");
                    return false;
                }
            });
        } else {
            alert('Please provide login details');
            return false;
        }

    }

    function searchAdv(type, id) {
        $('#field_type').val(type);
        $('#field_id').val(id);
        $('#searchAdv').submit();
    }
</script>
@stop