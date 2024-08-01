    <title>
        @if($seo && $seo->meta_title)
        {{$seo->meta_title}}
        @else
        {{$title}}
        @endif
    </title>
    <meta property="og:title" content="{{$title}}"/>
    <meta name="twitter:title" content="{{$title}}" />
    <meta name="twitter:card" content="{{$title}}" />
    <meta name="twitter:site" content="{{$title}}">
    @if($seo && $seo->description)
    <meta name="description" content="{{$seo->description}}">
    <meta property="og:description" content="{{$seo->description}}" />
    <meta name="twitter:description" content="{{$seo->description}}" />
    @endif
    
    @if($seo && $seo->keywords)
    <meta name="keywords" content="{{$seo->keywords}}" />
    @endif
    
    
    @if($image)
    <meta property="og:image" content="{{$image}}"/>
    <meta property="og:image:secure_url" content="{{$image}}"/>
    <meta name="twitter:image" content="{{$image}}">
    <meta name="thumbnail" content="{{$image}}">

    <meta property="og:image:height" content="600"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:alt" content=""/>
    <meta property="og:image:type" content="image/webp"/>
    @endif
    