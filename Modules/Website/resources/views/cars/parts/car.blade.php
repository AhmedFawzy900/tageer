    <div class="product__vertical product__horizontal">
   
        <div class="product__vertical_top">
      
            <div class="product__vertical_meta">
                @if($car->is_refresh)
                    <span class="bg-blue">{{__('lang.Featured')}}</span>
                @endif
                <span class="bg-orange">{{__('lang.Verified')}}</span>
                <span class="wishlist wishlist-toggle" data-auth="{{auth()->guard('customers')->check() ? 1 : 0}}" data-id="{{$car->id}}">{{__('lang.Save to wishlist')}}</span>

            </div>
            <a aria-label="{{$car->name}}" href="{{url('/')}}/{{$car->id}}/{{$car->slug()}}">
            <img alt="{{$car->name}}" src="/storage/{{$car->image}}"/>
            </a>
        </div>
        <div class="product__vertical_bottom">
        <a aria-label="{{$car->name}}" href="{{url('/')}}/{{$car->id}}/{{$car->slug()}}">
            <h2>{{$car->name}} </h2>
            <div class="product__vertical_bottom_features">
                <ul>
                    <!-- <li>{{__('lang.Doors')}}: {{$car->doors}}</li>
                    <li>{{__('lang.Engine')}}: {{$car->engine_capacity}}</li> -->
                    <li>{{__('lang.Minimum of Days')}}: {{$car->minimum_day_booking}}</li>
                    <li>{{__('lang.Deposit')}}: {{app('currencies')->convert($car->security_deposit)}} {{app('currencies')->getCurrency()->code}}</li>
                    <li>
                        
                        {{__('lang.KM Limit Day')}}: {{$car->km_per_day ? $car->km_per_day : 0}}
                       
                    </li>
                    <li>
                        
                        {{__('lang.KM Limit Month')}}: {{$car->km_per_month ? $car->km_per_month : 0}}
                        
                    </li>
                </ul>
                <div class="product__horizontal_right">
                    <div class="home__brands_item product__horizontal_fees">
                    
                        @if($car->price_per_day)
                        <h3>
                            <span>{{$car->type == "default" ? __('lang.Day') : __('lang.Hour')}}</span>
                            <span>{{app('currencies')->convert($car->price_per_day)}} {{app('currencies')->getCurrency()->code}}</span>
                        </h3>
                        @endif
                     
                       @if(!$car->price_per_week) <s> @endif
                            <h3>
                                <span>{{$car->type == "default" ? __('lang.Week') : "3 " . __('lang.Hours')}}</span>
                                <span>
                                
                                        {{app('currencies')->convert($car->price_per_week)}} {{app('currencies')->getCurrency()->code}}
                                
                                </span>
                            </h3>
                        @if(!$car->price_per_week) </s> @endif
                      

                        @if(!$car->price_per_month) <s> @endif
                        <h3>
                            <span>{{$car->type == "default" ? __('lang.Month') : "8 " . __('lang.Hours')}}</span>
                            <span>
                               
                                {{app('currencies')->convert($car->price_per_month)}} {{app('currencies')->getCurrency()->code}}
                                
                            </span>
                        </h3>
                        @if(!$car->price_per_month) </s> @endif
                       
                    </div>

                </div>
                
            </div>
            <div class="product__vertical_actions">
                <ul>
                    @include('website::layouts.parts.car-actions', ['car' => $car])
                    <li>
                        <div class="home__brands_item">
                            <a href="{{url('/')}}/c/{{$car->company->id}}/{{$car->company->slug()}}">
                                <img alt="{{$car->company->name}}" src="/storage/{{$car->company->image}}"/>
                            </a>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </a>
        </div>

    </div>  