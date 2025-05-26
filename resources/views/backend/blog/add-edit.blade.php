@extends('backend.app')
@section('style_files')
<link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/summernote/summernote-lite.min.css') }}">
@endsection
@section('script_files')
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/inputtags/inputtags.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/summernote/summernote-lite.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/summernote/init.js') }}"></script>
@endsection
@section('page_title'){{ translate('Basic Settings') }}@endsection
@section('content')
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{ isset($page_title) && $page_title != '' ? translate($page_title) : '' }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ translate('dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.blog.list') }}">{{ translate('blog') }} </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ isset($page_title) && $page_title != '' ? translate($page_title) : '' }}</li>
            </ol>
        </div>
        <div class="btn btn-list">
            <a class="btn ripple btn-primary" href="{{ route('admin.blog.list') }}"><i class="fe fe-list ml-2"></i>{{ translate('list') }}</a>
        </div>
    </div>
    <div class="row sidemenu-height">
        <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">
                <form action="{{ $page_action }}" class="data-parsley-validate" method="post" data-block_form="true" enctype='multipart/form-data' data-multipart='true' accept-charset="utf-8">
                    <input class="form-control" name="id" type="hidden" value="{{ isset($id) && $id!= '' ? $id : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label><?php echo translate('Image'); ?> </label>
                            <div class="form-group text-left">
                                <?php echo app_file_manager('image', 'image', 1, isset($blog['image']) && $blog['image'] != '' ? $blog['image'] : ''); ?>
                            </div>
                            <label><?php echo translate('Backgorund Banner'); ?> </label>
                            <div class="form-group text-left">
                                <?php echo app_file_manager('background_banner', 'background_banner', 1, isset($blog['background_banner']) && $blog['background_banner'] != '' ? $blog['background_banner'] : '',false,true); ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-10">
                            <div class="row">
                                <div class="col-12 col-sm-9">
                                    <div class="form-group">
                                    <label>{{ translate('name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="{{ translate('name') }}" tabindex="2" value="{{ isset($blog['name']) && $blog['name'] != '' ? $blog['name'] : '' }}" required />
                                    </div>
                                </div>
                                @php
                                $status_list = ['' => translate("Select"), '1' => translate("Active"), '0' => translate("Inactive")];
                                @endphp
                                <div class="col-12 col-sm-3">
                                    <div class="form-group text-left">
                                        <label>{{ translate('Status') }} <span class="tx-danger">*</span></label>
                                        <select name="is_active" class="form-control select2" data-parsley-errors-container="#error_status" tabindex="2" required>
                                            @if(isset($status_list) && !empty($status_list))
                                                @foreach($status_list as $key => $value)
                                                @php $selected = isset($blog['is_active']) && $blog['is_active'] == $key ? 'selected' : ''  @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span id="error_status"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label>{{ translate('Short Description') }} <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="short_description" placeholder="{{ translate('Short Description') }}" tabindex="4" required>{{ isset($blog['short_description']) && $blog['short_description'] != '' ? $blog['short_description'] : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label>{{ translate('SEO Description') }}</label>
                                    <textarea class="form-control" name="seo_description" placeholder="{{ translate('SEO Description') }}" tabindex="4">{{ isset($blog['seo_description']) && $blog['seo_description'] != '' ? $blog['seo_description'] : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                    <label>{{ translate('SEO Keywords') }}</label>
                                    <input type="text" data-role="tagsinput" class="form-control" name="seo_keywords" placeholder="{{ translate('SEO_keywords') }}" value="{{ isset($blog['seo_keywords']) && $blog['seo_keywords'] != '' ? $blog['seo_keywords'] : '' }}" tabindex="7" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                    <label>{{ translate('SEO Title') }} </label>
                                    <input type="text" class="form-control" name="seo_title" placeholder="{{ translate('SEO Title') }}" tabindex="5" value="{{ isset($blog['seo_title']) && $blog['seo_title'] != '' ? $blog['seo_title'] : '' }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-2">
                                    <div class="form-group text-left">
                                       <label>{{ translate('Blog Category') }} <span class="tx-danger">*</span></label>
                                       <select name="blog_category_id" class="form-control select2"  data-parsley-errors-container="#error_blog_category_id" required>
                                          <option value="">{{ translate("Select") }}</option>
                                          @if(isset($blog_category) && !empty($blog_category))
                                             @foreach($blog_category as $key => $value)
                                                @php $selected = isset($blog['blog_category_id']) && $blog['blog_category_id'] == $value->id ? 'selected' : ''  @endphp
                                                <option value="{{ $value->id }}" {{ $selected }}>{{ $value->name }}</option>
                                             @endforeach
                                          @endif
                                       </select>
                                       <span id="error_blog_category_id"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                    <label>{{ translate('Tags') }}</label>
                                    <input type="text" data-role="tagsinput" class="form-control" name="tags" placeholder="{{ translate('Tags') }}" value="{{ isset($blog['tags']) && $blog['tags'] != '' ? $blog['tags'] : '' }}" tabindex="9" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>{{ translate('description') }}<span class="text-danger">*</span></label>
                                <textarea name="description" class="html_editor" placeholder="Add Description..." required>{{ isset($blog['description']) && $blog['description'] != '' ? $blog['description'] : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12 col-sm-12 text-center">              
                        <button type="submit" class="btn ripple btn-submit btn-primary" data-loading-text="<span aria-hidden='true' class='spinner-border spinner-border-sm'></span>{{ translate('please_wait...') }}" tabindex="7">{{ translate('submit') }}</button>
                        <a class="btn ripple btn-secondary" href="{{ route('admin.blog.list') }}">{{ translate('close') }}</a>
                    </div>
                    </div>
                </form>  
            </div>
        </div>
        </div>
    </div>
    <script>
         function responsive_filemanager_callback(field_id){
         var url = $('#'+field_id).val();
            $('#img_'+field_id).attr('src', url);
        }
        $(document).ready(function () {
            init_select2();
        });
    </script>
@endsection