<x-admin-app-layout :title="'General Setting'">
    <div class="card shadow-sm">
        <!--begin::Form-->
        <form class="form" action="{{ route('admin.settings.updateOrCreate') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h3 class="card-title">General Settings</h3>
                {{-- <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-light">
                        Action
                    </button>
                </div> --}}
            </div>
            <div class="card-body">
                <!--begin::Alerts-->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!--end::Alerts-->
                <!--begin::Input group-->
                <div class="row">
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="site_name" class="col-form-label fw-bold fs-6 ">{{ __('Site Name') }}
                        </x-metronic.label>

                        <x-metronic.input id="site_name" type="text" name="site_name" :value="old('site_name', optional($setting->first())->site_name)"
                            placeholder="Enter the Site Name"></x-metronic.input>
                    </div>

                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="site_logo" class="col-form-label fw-bold fs-6 ">{{ __('Site Logo') }}
                        </x-metronic.label>

                        <x-metronic.input id="site_logo" type="file" name="site_logo"
                            :value="old('site_logo', optional($setting->first())->site_logo)"></x-metronic.input>

                        <img src="{{ !empty(optional($setting->first())->site_logo) && file_exists(public_path('storage/' . optional($setting->first())->site_logo)) ? asset('storage/' . optional($setting->first())->site_logo) : asset('frontend/images/no-logo(217-55).jpg') }}"
                            style="width: 80px;height:80px" class="mt-3" alt="">

                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="site_favicon"
                            class="col-form-label fw-bold fs-6 ">{{ __('Site Favicon') }}
                        </x-metronic.label>

                        <x-metronic.input id="site_favicon" type="file" name="site_favicon"
                            :value="old('site_favicon', optional($setting->first())->site_favicon)"></x-metronic.input>

                        <img src="{{ !empty(optional($setting->first())->site_favicon) && file_exists(public_path('storage/' . optional($setting->first())->site_favicon)) ? asset('storage/' . optional($setting->first())->site_favicon) : asset('frontend/images/no-logo(217-55).jpg') }}"
                            style="width: 80px;height:80px" class="mt-3" alt="">

                    </div>

                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="primary_email"
                            class="col-form-label fw-bold fs-6 ">{{ __('primary_email') }}
                        </x-metronic.label>

                        <x-metronic.input id="primary_email" type="primary_email" name="primary_email" :value="old('primary_email', optional($setting->first())->primary_email)"
                            placeholder="Enter the primary_email address"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="support_email"
                            class="col-form-label fw-bold fs-6 ">{{ __('support_email') }}
                        </x-metronic.label>

                        <x-metronic.input id="support_email" type="support_email" name="support_email" :value="old('support_email', optional($setting->first())->support_email)"
                            placeholder="Enter the support_email address"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="sales_email"
                            class="col-form-label fw-bold fs-6 ">{{ __('sales_email') }}
                        </x-metronic.label>

                        <x-metronic.input id="sales_email" type="sales_email" name="sales_email" :value="old('sales_email', optional($setting->first())->sales_email)"
                            placeholder="Enter the sales_email address"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="primary_phone"
                            class="col-form-label fw-bold fs-6 ">{{ __('Primary primary_phone') }}
                        </x-metronic.label>

                        <x-metronic.input id="primary_phone" type="number" name="primary_phone" :value="old('primary_phone', optional($setting->first())->primary_phone)"
                            placeholder="Enter the primary_phone"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="secondary_phone"
                            class="col-form-label fw-bold fs-6 ">{{ __('Secondary phone') }}
                        </x-metronic.label>

                        <x-metronic.input id="secondary_phone" type="number" name="secondary_phone" :value="old('secondary_phone', optional($setting->first())->secondary_phone)"
                            placeholder="Enter the secondary_phone"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="whatsapp" class="col-form-label fw-bold fs-6 ">{{ __('Whatsapp') }}
                        </x-metronic.label>

                        <x-metronic.input id="whatsapp" type="number" name="whatsapp" :value="old('whatsapp', optional($setting->first())->whatsapp)"
                            placeholder="Enter the whatsapp"></x-metronic.input>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="address_line_one"
                            class="col-form-label fw-bold fs-6 ">{{ __('Address Line One') }}
                        </x-metronic.label>

                        <x-metronic.input id="address_line_one" type="text" name="address_line_one"
                            :value="old('address_line_one', optional($setting->first())->address_line_one)" placeholder="Enter the Phone"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="address_line_two"
                            class="col-form-label fw-bold fs-6 ">{{ __('Address Line Two') }}
                        </x-metronic.label>

                        <x-metronic.input id="address_line_two" type="text" name="address_line_two"
                            :value="old('address_line_two', optional($setting->first())->address_line_two)" placeholder="Enter the Phone"></x-metronic.input>
                    </div>

                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="seo_keywords"
                            class="col-form-label fw-bold fs-6 ">{{ __('Seo Keyword') }}
                        </x-metronic.label>

                        <x-metronic.input id="seo_keywords" type="text" name="seo_keywords" :value="old('seo_keywords', optional($setting->first())->seo_keywords)"
                            placeholder="Enter the Seo Keyword"></x-metronic.input>
                    </div>

                    {{-- Maintenance Mode --}}

                    {{-- @if (Auth::guard('admin')->user()->can('delete.banner'))

                    @endif --}}

                    <div class="col-lg-3 mb-7">

                        <x-metronic.label for="maintenance_mode" class="col-form-label fw-bold fs-6">
                            {{ __('Select a maintenance mode ') }}</x-metronic.label>

                        <x-metronic.select-option id="maintenance_mode" name="maintenance_mode"
                            data-hide-search="true" data-placeholder="Select an option">

                            <option></option>

                            <option value="1"
                                {{ optional($setting->first())->maintenance_mode == 1 ? 'selected' : '' }}>Active
                            </option>

                            <option value="0"
                                {{ optional($setting->first())->maintenance_mode == 0 ? 'selected' : '' }}>
                                Inactive</option>

                        </x-metronic.select-option>

                    </div>

                    {{-- Maintenance Mode --}}


                </div>

                <div class="row">
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="seo_description"
                            class="col-form-label fw-bold fs-6 ">{{ __('Seo Description') }}
                        </x-metronic.label>

                        <x-metronic.input id="seo_description" type="text" name="seo_description"
                            :value="old('seo_description', optional($setting->first())->seo_description)" placeholder="Enter the Seo Description"></x-metronic.input>
                    </div>

                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="social_facebook"
                            class="col-form-label fw-bold fs-6 ">{{ __('Social Facebook') }}
                        </x-metronic.label>

                        <x-metronic.input id="social_facebook" type="text" name="social_facebook"
                            :value="old('social_facebook', optional($setting->first())->social_facebook)" placeholder="Enter the Facebook Url"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="social_twitter"
                            class="col-form-label fw-bold fs-6 ">{{ __('Social Twitter') }}
                        </x-metronic.label>

                        <x-metronic.input id="social_twitter" type="text" name="social_twitter" :value="old('social_twitter', optional($setting->first())->social_twitter)"
                            placeholder="Enter the Twitter Url"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="social_instagram"
                            class="col-form-label fw-bold fs-6 ">{{ __('Social Instagram') }}
                        </x-metronic.label>

                        <x-metronic.input id="social_instagram" type="text" name="social_instagram"
                            :value="old('social_instagram', optional($setting->first())->social_instagram)" placeholder="Enter the Instagram Url"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="social_linkedin"
                            class="col-form-label fw-bold fs-6 ">{{ __('Social Linkedin') }}
                        </x-metronic.label>

                        <x-metronic.input id="social_linkedin" type="text" name="social_linkedin"
                            :value="old('social_linkedin', optional($setting->first())->social_linkedin)" placeholder="Enter the Linkedin Url"></x-metronic.input>
                    </div>
                    <div class="col-lg-3 mb-7">
                        <x-metronic.label for="social_youtube"
                            class="col-form-label fw-bold fs-6 ">{{ __('Social Youtube') }}
                        </x-metronic.label>

                        <x-metronic.input id="social_youtube" type="text" name="social_youtube" :value="old('social_youtube', optional($setting->first())->social_youtube)"
                            placeholder="Enter the Youtube Url"></x-metronic.input>
                    </div>
                </div>
                <!--end::Form-->
            </div>
            <div class="card-footer">
                <div class="text-end">
                    <x-metronic.button type="submit" class="primary">
                        {{ __('Submit') }}
                    </x-metronic.button>
                </div>
                <!--end::Actions-->
            </div>
        </form>
    </div>
</x-admin-app-layout>
