
<div class="box-footer">
    <form action="#" method="post">
        <img class="img-responsive img-circle img-sm" src="{{ Auth::User()->userImage() }}" alt="alt text">
        <!-- .img-push is used to add margin to elements next to floating images -->
        <div class="img-push">
            <input type="hidden" id="recipe_id" name="recipe_id" value="{{ $recipe->id }}"/>
            <textarea maxlength="300" type="text" id="recipe_comment" onkeyup="getCountText();" name="recipe_comment" class="form-control input-sm" placeholder="Write a comment"></textarea>
            <span id="text_count">0</span>/300 characters
            <button id="add_comment" onclick="saveComment()" disabled="disabled" type="button" class="margin-top-10 btn btn-xs btn-primary pull-right"><i class="fa fa-send-o"></i> Post</button>
        </div>
    </form>
</div>
<div class="box-footer box-comments white-bg">
    {{ count($recipe->comments)==0?'No comments':'' }}
    @foreach ($recipe->comments as $comment)
    <div class="box-comment" id="comment_{{ $comment->id }}">
        <!-- User image -->
        <img class="img-circle img-sm" src="{{ $comment->user->userImage() }}" alt="user image">
        <div class="comment-text">
            <span class="username">
                {{ $comment->user->userName() }}
                <span class="text-muted pull-right"> {{ $comment->time_ago() }}</span>
            </span><!-- /.username -->
            {{ $comment->comment }}

            @if ($comment->user->id == Auth::user()->id)
            <a href="javascript:void(0)" data-toggle="tooltip" onclick="deleteCommnt({{ $comment->id }})" title="Delete this post" class="pull-right text-danger"><i class="fa fa-times"></i></a>
            @endif
        </div><!-- /.comment-text -->
    </div><!-- /.box-comment -->
    @endforeach
</div>





