@extends('website::layouts.master')
@section('seo')
    @include('website::layouts.parts.seo', [
        'seo' => \App\Models\SEO::where('type','home')->first(),
        "title" => app('settings')->get('blog_title'),
        "image" => url('/') . '/storage/'. app('settings')->get('header_logo')
    ])
@endsection
@section("content")


    @include('website::layouts.parts.page-banner',[
        "title" => app('settings')->get('blog_title')
    ])

    @include('website::layouts.parts.suggested-cars', ['suggested_cars' => $suggested_cars])


    <section class="home__about list__item">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    @foreach($blogs as $blog)
                    <div class="home__about_content blog-item">
                        @if($blog->image)
                        <img alt="{{$blog->title}}" src="/storage/{{$blog->image}}" />
                        @endif
                        <h2>{{$blog->title}}</h2>
                        {!!$blog->content!!}
                        
                      
                    </div>
                    @endforeach
             
                    
                </div>
                <div class="col-lg-12">
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
    </section>





@endsection