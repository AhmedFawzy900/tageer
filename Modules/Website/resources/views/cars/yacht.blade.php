@extends('website::layouts.master')
@section('seo')
    @include('website::layouts.parts.seo', [
        'seo' => \App\Models\SEO::where('type','yacht')->first(),
        "title" => app('settings')->get('yacht_title'),
        "image" => url('/') . '/storage/'. app('settings')->get('header_logo')
    ])
@endsection
@section("content")

<section class="products-page">
        <div class="container">
            <div class="row">

                @include('website::cars.parts.breadcrumb',[
                    "title_1" => app('settings')->get('yacht_title'),
                    "title_2" => ""
                ])

                @include('website::layouts.parts.page-title',[
                    "title"       => app('settings')->get('yacht_title'),
                    "description" => app('settings')->get('yacht_description')
                ])


            </div>

            
                <div class="row mt-50">

                    <div class="col-lg-12">


                        <div class="products-page__content">
                            <div class="row">
                                @foreach($cars as $car)
                                    <div class="col-lg-4">
                                        @include('website::layouts.parts.car', ['car' => $car])
                                    </div>
                                    @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        {{$cars->appends(request()->input())->links()}}
                    </div>

                </div>
          
   
        </div>
    </section>


    @include('website::layouts.parts.content', [
        "content" => \App\Models\Content::where('type','yacht')->first()    
    ])

    @include('website::layouts.parts.faq', [
        "faq" => \App\Models\Faq::where('type','yacht')->get()   
    ])


@endsection
