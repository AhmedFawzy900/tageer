    
        <div class="product__vertical">
            
            <div class="product__vertical_top">
                <div class="product__vertical_meta">
                    @if($car->is_refresh)
                    <span class="bg-blue">{{__('lang.Featured')}}</span>
                    @endif
                    <span class="bg-orange">{{__('lang.Verified')}}</span>
                    <span class="wishlist wishlist-toggle" data-auth="{{auth()->guard('customers')->check() ? 1 : 0}}" data-id="{{$car->id}}">
                        @if(auth()->guard('customers')->check())
                            @if(!auth()->guard('customers')->user()->wishlist->contains($car->id))
                            {{__('lang.Save to wishlist')}}
                            @else
                            {{__('lang.Remove from wishlist')}}
                            @endif
                        @else
                        {{__('lang.Save to wishlist')}}
                        @endif
                       
                    </span>

                </div>
                <a aria-label="{{$car->name}}" href="{{url('/')}}/{{$car->id}}/{{$car->slug()}}">
                <img loading="lazy" alt="{{$car->name}}" src="{{url('/')}}/storage/{{$car->image}}"/>
                </a>
            </div>
            <a aria-label="{{$car->name}}" href="{{url('/')}}/{{$car->id}}/{{$car->slug()}}">
            <div class="product__vertical_bottom">
                <h2>{{$car->name}}</h2>
                <div class="product__vertical_bottom_features">
                    <ul>
                        <li>{{$car->type == "default" ? __('lang.Day') : __('lang.Hour')}} {{app('currencies')->convert($car->price_per_day)}} {{app('currencies')->getCurrency()->code}}</li>
                       
                        <li>
                            @if(!$car->price_per_week) <s> @endif
                            {{$car->type == "default" ? __('lang.Week') : "3 " . __('lang.Hours')}} {{app('currencies')->convert($car->price_per_week)}} {{app('currencies')->getCurrency()->code}}
                            @if(!$car->price_per_week) </s> @endif
                        </li>
                        
                        
                        <li>
                            @if(!$car->price_per_month) <s> @endif
                            {{$car->type == "default" ? __('lang.Month') : "8 " . __('lang.Hours')}} {{app('currencies')->convert($car->price_per_month)}} {{app('currencies')->getCurrency()->code}}
                            @if(!$car->price_per_month) </s> @endif
                        </li>
                        
                       
                        <li>{{__('lang.Deposit')}} {{app('currencies')->convert($car->security_deposit)}} {{app('currencies')->getCurrency()->code}}</li>
                        
                        <li>{{__('lang.Minimum of Days')}} {{$car->minimum_day_booking}}</li>
                        <li>
                            
                            {{__('lang.KM Limit Day')}}: {{$car->km_per_day ? $car->km_per_day : 0}}
                          
                        </li>
                        <li>
                           
                            {{__('lang.KM Limit Month')}}: {{$car->km_per_month ? $car->km_per_month : 0}}
                           
                        </li>
                    </ul>
                    <a aria-label="{{$car->name}}" href="{{url('/')}}/c/{{$car->company->id}}/{{$car->company->slug()}}" class="flex-1">
                        <div class="home__brands_item">
                                <img loading="lazy" alt="{{$car->company->name . rand(0,999)}}" src="{{url('/')}}/storage/{{$car->company->image}}"/>
                                <h3>{{$car->company->name}}</h3>
                        </div>
                    </a>
                </div>
                <div class="product__vertical_actions">
                    <ul>
                        @include('website::layouts.parts.car-actions', ['car' => $car])
                    </ul>
                </div>
            </div>
            </a>
        </div>
    