    <div class="col-lg-12">
        <div class="product-page__header">
            <h1>{{$title}}</h1>
            @if($description)
            <p>{!!$description!!}</p>
            <a href="#!" class="read-more-page">{{__('lang.Read More')}}</a>
            @endif

        </div>
    </div>