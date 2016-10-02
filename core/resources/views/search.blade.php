@extends('pages.layout.guest')
@section('title', "Search" )
@section('title-info', '')
@section('content')
@parent

<div class="row">
    <div class="col-md-3">
        @include('subviews.searchbox')
    </div>
    <div class="col-md-9">
        <h2>What would you like to cook today?</h2>
        <article class="masonry">


            @foreach($recipe as $r)
            <section class="card">
                <a href="{{ url('/viewDetail/'.$r->id) }}">
                    <img src="{{ $r->recipeImage() }}" alt=""/>
                    <div class="caption">
                        <h2>{{ $r->recipeName() }}</h2>
                        <small>{{ $r->category->name }}</small>
                        <i class="fa fa-eye pull-right"> {{ $r->views() }}</i>
                    </div>
                </a>
            </section>
            @endforeach                           
        </article>
        <div class="text-center">
            <div class="clearfix"></div>
            <?php echo $recipe->appends(['keyword' => $keyword])->render(); ?>
        </div>
    </div>

</div>
@stop
@section('include_js')
<script>

    function searchAdv(type, id) {
        $('#field_type').val(type);
        $('#field_id').val(id);
        $('#searchAdv').submit();
    }
</script>
@stop