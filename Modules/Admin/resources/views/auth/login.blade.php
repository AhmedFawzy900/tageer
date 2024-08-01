@extends("admin::layouts.auth-master")
@section("content")
    
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    @include('admin::layouts.parts.auth-logo')
                    <h1 class="">الدخول الي <span>حسابك</span>
                    </h1>
                    <form class="text-left" action="{{url('/')}}/admin/login" method="post">
                        @csrf
                        <div class="form">

                            
                                @include('admin::layouts.parts.auth-alerts')
                            

                                <div class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input required name="username" type="text" class="form-control" placeholder="{{__('admin.name')}} المستخدم">
                                </div>

                                <div class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" required class="form-control" placeholder="{{__('admin.password')}}">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">عرض {{__('admin.password')}}</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">الدخول</button>
                                    </div>
                                    
                                </div>

                           

                        </div>
                    </form>      
                  
                    <p class="terms-conditions">جميع الحقوق محفوظة @ {{date('Y')}}</p>

                </div>                    
            </div>
        </div>
    </div>

@endsection