@extends('website::layouts.master')
@section('seo')
    @include('website::layouts.parts.seo', [
        'seo' => \App\Models\SEO::where('type','company')->where('resource_id', $company->id)->first(),
        "title" => $company->name,
        "image" => url('/') . '/storage/'. $company->image
    ])
@endsection

@section("content")

<section class="products-page">
        <div class="container">
            <div class="row">

                @include('website::cars.parts.breadcrumb',[
                    "title_1" => $company->name,
                    "title_2" => ""
                ])

                @include('website::layouts.parts.page-title',[
                    "title"       => $company->name,
                    "description" => $company->description
                ])

                @include('website::cars.parts.types', ["types" => $company->types, "company_id" => $company->id])


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

                    </div>

                    <div class="col-12">
                        {{$cars->appends(request()->input())->links()}}
                    </div>

                    <div class="col-lg-12">
                        <div class="iframe">
                            {!!$company->address!!}
                        </div>

                    </div>

                </div>
          
   
        </div>
    </section>


    @include('website::layouts.parts.content', [
        "content" => \App\Models\Content::where('type','company')->where('resource_id', $company->id)->first()    
    ])

    @include('website::layouts.parts.faq', [
        "faq" => \App\Models\Faq::where('type','company')->where('resource_id', $company->id)->get()   
    ])


@endsection
