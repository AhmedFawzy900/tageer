    @if(count($models) > 0)
        <div class="col-lg-12">
            <ul class="product-page__sub_categories">
                @foreach($models as $model)
                <li><a href="{{url('/')}}/{{\Request::path()}}?model_id={{$model->id}}">{{__('lang.Rent')}} {{$model->title}} ({{$model->cars()->count()}})</a></li>
                @endforeach
            </ul>
        </div>
    @endif