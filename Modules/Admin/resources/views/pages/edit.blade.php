@extends('admin::layouts.master')

@section('content')

            <div class="layout-px-spacing">
                <form action="{{url('/')}}/admin/pages/{{$item->id}}" method="post" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="page__header_title custom__page_header_title">
                        <h4>{{__('admin.edit')}} {{__('admin.page')}}</h4>
                        <button class="btn btn-primary btn-rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            {{__('admin.save')}} 

                        </button>
                    </div>



                    <div class="row layout-spacing">
                        @include("admin::layouts.parts.app.alerts")
                        <div class="col-lg-8">
                            <div class="statbox widget box box-shadow mb-20">

                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        
                                        @foreach(\Config::get("app.languages") as $key => $value)
                                        <div class="form-group row mb-4">
                                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.name')}} {{__('admin.page')}} {{$value}}</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <input value="{{$item->getTranslation('name', $key)}}"  type="text" required class="form-control" name="name_{{$key}}" >
                                            </div>
                                        </div>
                                        @endforeach

                                        @foreach(\Config::get("app.languages") as $key => $value)
                                        <div class="form-group row mb-4">
                                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.content')}} {{__('admin.page')}} {{$value}}</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <textarea  class="form-control body" name="content_{{$key}}" >{!!$item->getTranslation('content', $key)!!}</textarea>
                                            </div>
                                        </div>
                                        @endforeach

                                                         
                                        <div class="form-group row mb-4">
                                            <label for="hPassword" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.image')}}</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file"  class="custom-file-input" accept="image/*" name="image" id="customFile">
                                                    <label class="custom-file-label" for="customFile">{{__('admin.choose_file')}}</label>
                                                </div>
                                                @if($item->image)
                                                <img src="{{url('/')}}/storage/{{$item->image}}" style="width: 100px; margin-top: 10px;">
                                                @endif
                                            
                                            </div>

                                        </div>   

                                        <div class="form-group row mb-4">
                                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.cars')}}</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <select name="car_id[]" multiple class="form-control">
                                                    @foreach(\App\Models\Car::get() as $c)
                                                        <option @if(in_array($c->id, $item->cars()->pluck('cars.id')->toArray())) selected @endif value="{{$c->id}}" >{{$c->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

  

                                        
                                        
                                        </div>
                                    </div>

                                </div>
                            </div>
                     
                        </div>
                        <div class="col-lg-4">
                            <div class="statbox widget box box-shadow ">

                                <div class="widget-content widget-content-area ">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        
                                    

    
                                        <div class="form-group row mb-4">
                                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.link')}}</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <input value="{{$item->slug}}"  type="text" required  class="form-control" name="slug" >
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.show_in')}} {{__('admin.header')}}</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <select class="form-control" name="show_header">
                                                    <option @if($item->show_header) selected @endif value="1">{{__('admin.yes')}}</option>
                                                    <option @if(!$item->show_header) selected @endif value="0">{{__('admin.no')}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.show_in')}} {{__('admin.footer')}}</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <select class="form-control" name="show_footer">
                                                    <option @if($item->show_footer) selected @endif value="1">{{__('admin.yes')}}</option>
                                                    <option @if(!$item->show_footer) selected @endif value="0">{{__('admin.no')}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{__('admin.show_in')}} rent car</label>
                                            <div class="col-xl-9 col-lg-9 col-sm-10">
                                                <select class="form-control" name="show_rent_car">
                                                    <option @if($item->show_rent_car) selected @endif value="1">{{__('admin.yes')}}</option>
                                                    <option @if(!$item->show_rent_car) selected @endif value="0">{{__('admin.no')}}</option>
                                                </select>
                                            </div>
                                        </div>

     
                                        
    

  
                                                               
    

                                        
                                        
                                        </div>
                                    </div>

                                </div>
                            </div>

                            
                        </div>

                        <div class="col-lg-12">
                            @include("admin::layouts.parts.content", [
                                "content" => \App\Models\Content::where([["type", "page"],["resource_id", $item->id]])->first(),
                                "seo" => \App\Models\SEO::where([["type", "page"],["resource_id", $item->id]])->first(),
                                "faq" => \App\Models\Faq::where([["type", "page"],["resource_id", $item->id]])->get()
                            ])  
                        </div> 
              
              
                    </div>

                </form>



            </div>

@endsection
@section('js')
<script>
  tinymce.init({
    selector: 'textarea.body',
    directionality: "rtl",
    plugins: 'autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>
@endsection