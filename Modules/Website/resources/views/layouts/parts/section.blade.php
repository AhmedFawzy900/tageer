    @if($section->cars()->whereHas('company', function($q) {
                            $q->where('country_id', app('country')->getCountry()->id);
                        })->count() > 0)
    <section class="home__features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home__brands_title">
                        <h3>{{$section->title}}</h3>
                        <div class="home_brands_view_all_holder">
                            <a class="home_brands_view_all" href="{{url('/')}}/s/{{$section->id}}/{{$section->slug()}}">
                                {{__('lang.View All')}}
                            </a>
                        </div>
                    </div>
                    <div class="home__brands_desc">
                        {{$section->description}}
                    </div>
                    <a href="#!" class="read-more">{{__('lang.Read More')}}</a>

                </div>

                <div class="col-lg-12">
                    <div data-stage="20" data-items-large="3" data-items-small="1"  class="home__features_content owl-carousel owl-theme">
                        
                        @foreach($section->cars()
                        ->whereHas('company', function($q) {
                            $q->where('country_id', app('country')->getCountry()->id);
                        })
                        ->orderBy('is_refresh','desc')->inRandomOrder()->limit(10)->get() as $car)
                            @include('website::layouts.parts.car', ['car' => $car])
                        @endforeach
 
                    </div>
                </div>

             
            </div>
        </div>
    </section>
    @endif