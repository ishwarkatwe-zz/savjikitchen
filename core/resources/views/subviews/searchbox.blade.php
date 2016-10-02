<div class="searchbox">
    <form method="POST" action="{{ url('/search') }}">
        {!! csrf_field() !!}
        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword" value="{{ $keyword }}">
        <button class="btn btn-black"><i class="fa fa-search"></i></button>
    </form>
    
    <form method="POST" action="{{ url('/search') }}" id="searchAdv">
        {!! csrf_field() !!}
        <input type="hidden" class="form-control" name="field_id" id="field_id">
        <input type="hidden" class="form-control" name="field_type" id="field_type">
    </form>
</div>

<aside class="side-menu">
    <h3 class="titles">Categories</h3>
    <ul>
        @foreach($categories as $catagory)
        <li><a href="#" onclick="searchAdv('C',{{ $catagory->id }})">{{ $catagory->name }}<label class="badge">{{$catagory->countRecipes($catagory->id)}}</label></a></li>
        @endforeach
    </ul>
</aside>

<aside class="side-menu">
    <h3 class="titles">Tags</h3>
    <div class="tags">
        @foreach($tags as $t)
        <a class="btn btn-default btn-xs" onclick="searchAdv('T','{{$t['id']}}')">{{$t['name']}}</a>
        @endforeach
    </div>  
</aside>

<aside class="recent-box">
    <h4>Recent Recipes</h4>
    @foreach($recent as $r)
    <a href="{{ url('/viewDetail/'.$r->id) }}">
        <div class="recipe-row">
            <img src="{{ $r->recipeImage() }}" alt="{{ $r->recipeName() }}"/>
            <h5>{{ $r->recipeName() }}</h5>
            <span><i class="fa fa-clock-o"></i> {{ $r->addedOn() }}</span>
        </div>
    </a>
    @endforeach

</aside>