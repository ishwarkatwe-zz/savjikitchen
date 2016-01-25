@extends('pages.layout.master')
@section('title', $userName.'\'s Connection\'s')
@section('title-info', 'Connecting people')
@section('content')
@parent


<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li @if($strType == 'F')class="active" @endif ><a href="#tab_1" data-toggle="tab"><i class="fa fa-hand-o-up"></i> Follower</a></li>
        <li @if($strType == 'I')class="active" @endif><a href="#tab_2" data-toggle="tab"><i class="fa fa-hand-o-right"></i> Following</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane @if($strType == 'F') active @endif" id="tab_1">
            <div class="row">
                @if(count($follower)==0)<h4 class="text-center"><i class="fa fa-hand-o-up"></i> No Followers yet!</h4>@endif
                @foreach ($follower as $follow)
                <div class="col-md-4">
                    <a href="{{ url('profile/'.$follow->userInfo->id) }}">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username">{{ $follow->userInfo->userName() }}</h3>
                                <h5 class="widget-user-desc">Since {{ $follow->userInfo->getSinceDate() }}</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="{{ $follow->userInfo->userImage() }}" alt="{{ $follow->userInfo->userName() }}">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ count($follow->userInfo->followers) }}</h5>
                                            <span class="description-text">Followers</span>
                                        </div><!-- /.description-block -->
                                    </div><!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ count($follow->userInfo->following) }}</h5>
                                            <span class="description-text">Following</span>
                                        </div><!-- /.description-block -->
                                    </div><!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ count($follow->userInfo->myRecipes()) }}</h5>
                                            <span class="description-text">Recipes</span>
                                        </div><!-- /.description-block -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div><!-- /.tab-pane -->
        <div class="tab-pane @if($strType == 'I') active @endif" id="tab_2">
            <div class="row">
                @if(count($following)==0)<h4 class="text-center"><i class="fa fa-hand-o-right"></i> No Following made yet!</h4>@endif
                @foreach ($following as $followings)
                <div class="col-md-4">
                    <a href="{{ url('profile/'.$followings->userInfo->id) }}">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username">{{ $followings->userInfo->userName() }}</h3>
                                <h5 class="widget-user-desc">Since {{ $followings->userInfo->getSinceDate() }}</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="{{ $followings->userInfo->userImage() }}" alt="{{ $followings->userInfo->userName() }}">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ count($followings->userInfo->followers) }}</h5>
                                            <span class="description-text">Followers</span>
                                        </div><!-- /.description-block -->
                                    </div><!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ count($followings->userInfo->following) }}</h5>
                                            <span class="description-text">Following</span>
                                        </div><!-- /.description-block -->
                                    </div><!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ count($followings->userInfo->myRecipes()) }}</h5>
                                            <span class="description-text">Recipes</span>
                                        </div><!-- /.description-block -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->


@stop