    <div class="col-lg-12">
        <ul class="breadcrumb-list">
            <li>
                <a href="{{url('/')}}">{{__('lang.Home')}}</a>
            </li>
            @if($title_1)
            <li>
                @if(app()->getLocale() == 'ar')
                <i class="fa fa-angle-left"></i>
                @else
                <i class="fa fa-angle-right"></i>
                @endif
            </li>
            <li>
                <a href="#!" class="active">{{$title_1}}</a>
            </li>
            @endif

            @if($title_2)
            <li>
                @if(app()->getLocale() == 'ar')
                <i class="fa fa-angle-left"></i>
                @else
                <i class="fa fa-angle-right"></i>
                @endif  
              
            </li>
            <li>
                <a href="#!" class="active">{{$title_2}}</a>
            </li>
            @endif
        </ul>
    </div>