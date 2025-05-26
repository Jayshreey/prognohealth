@extends('backend.app')
@section('script_files')
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/darggable/jquery-ui-darggable.min.js') }}"></script>
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
            <li class="breadcrumb-item"><a href="{{ route('admin.gallery.list') }}">{{ translate('gallery') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ isset($page_title) && $page_title != '' ? translate($page_title) : '' }}</li>
        </ol>
        </div>
        <div class="btn btn-list">
        <a class="btn ripple btn-primary" href="{{ route('admin.gallery.list') }}"><i class="fe fe-list ml-2"></i>{{ translate('list') }}</a>
        </div>
    </div>
    <div class="row sidemenu-height">
        <div class="col-lg-12">
            <form action="{{ $page_action }}" class="data-parsley-validate" method="post" data-block_form="true" enctype='multipart/form-data' data-multipart='true' accept-charset="utf-8">
                <input class="form-control" name="id" type="hidden" value="{{ isset($id) && $id!= '' ? $id : '' }}">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group text-left">
                                    <?php echo app_file_manager('image', 'image', 1, isset($gallery['image']) && $gallery['image'] != '' ? $gallery['image'] : ''); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-10">
                                <div class="row">
                                    <div class="col-12 col-sm-9">
                                        <div class="form-group">
                                        <label>{{ translate('name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ translate('name') }}" tabindex="2" value="{{ isset($gallery['name']) && $gallery['name'] != '' ? $gallery['name'] : '' }}" required />
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
                                                    @php $selected = isset($gallery['is_active']) && $gallery['is_active'] == $key ? 'selected' : ''  @endphp
                                                    <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span id="error_status"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                        <label>{{ translate('SEO Title') }} </label>
                                        <input type="text" class="form-control" name="seo_title" placeholder="{{ translate('SEO Title') }}" tabindex="2" value="{{ isset($gallery['seo_title']) && $gallery['seo_title'] != '' ? $gallery['seo_title'] : '' }}"  />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                        <label>{{ translate('SEO Keywords') }}</label>
                                        <input type="text" data-role="tagsinput" class="form-control" name="seo_keywords" placeholder="{{ translate('SEO_keywords') }}" value="{{ isset($gallery['seo_keywords']) && $gallery['seo_keywords'] != '' ? $gallery['seo_keywords'] : '' }}" tabindex="7" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                <label>{{ translate('Short Description') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="short_description" placeholder="{{ translate('Short Description') }}" tabindex="4" required>{{ isset($gallery['short_description']) && $gallery['short_description'] != '' ? $gallery['short_description'] : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                <label>{{ translate('SEO Description') }}</label>
                                <textarea class="form-control" name="seo_description" placeholder="{{ translate('SEO Description') }}" tabindex="4">{{ isset($gallery['seo_description']) && $gallery['seo_description'] != '' ? $gallery['seo_description'] : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12">
                                <div class="form-group text-left">
                                <label>{{ translate('Gallery Category') }} <span class="tx-danger">*</span></label>
                                <select name="gallery_category_id" class="form-control select2"  data-parsley-errors-container="#error_gallery_category_id" required>
                                    <option value="">{{ translate("Select") }}</option>
                                    @if(isset($gallery_category) && !empty($gallery_category))
                                        @foreach($gallery_category as $key => $value)
                                            @php $selected = isset($gallery['gallery_category_id']) && $gallery['gallery_category_id'] == $value->id ? 'selected' : ''  @endphp
                                            <option value="{{ $value->id }}" {{ $selected }}>{{ $value->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span id="error_gallery_category_id"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>{{ translate('features') }} (<a href="javascript:void(0);" class="btn-add-features">{{ translate('Add New') }}</a>)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row sortable" id="f-field-row">
                            @php $f = 0; $features = json_decode(isset($gallery['features']) && $gallery['features']!= '' ? $gallery['features'] : '') @endphp
                            @if(isset($features) && !empty($features)) 
                                @foreach ($features as $key => $value)
                                    <div class="col-12 col-sm-6 card-fdraggable" id="fd{{ $f }}">
                                        <div class="card custom-card">
                                            <div class="card-body">
                                                <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="features[{{ $f }}][feature]" placeholder="{{ translate('feature') }}" tabindex="1" value="{{ isset($value->feature) && $value->feature!='' ? $value->feature : '' }}" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="features[{{ $f }}][description]" placeholder="{{ translate('description') }}" tabindex="2" required />{{ isset($value->description) && $value->description!='' ? $value->description : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-1">
                                                    <div class="form-group form-group-float">
                                                        <button type="button" class="btn ripple btn-outline-danger btn-rounded btn-sm btn-remove-f-field"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $f++ @endphp
                                @endforeach
                            @endif
                         </div>
                        </div>
                </div>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>{{ translate('images') }} (<a href="javascript:void(0);" data-url="{{ getBaseURL().'filemanager/dialog.php?type=1&field_id=multi_image_field' }}" class="btn-iframe" data-original-title="{{ translate('Click on the image to change') }}" data-placement="top" data-toggle="tooltip" title="{{ translate('Click on the image to change') }}">{{ translate('select') }}</a>)</label>
                            </div>
                            </div>
                        </div>
                        <div class="row image-sortable images_row">
                            @php $i=0; $images = json_decode(isset($gallery['images']) && $gallery['images']!= '' ? $gallery['images'] : ''); @endphp
                            @if(isset($images) && !empty($images)) 
                                @foreach ($images as $key => $value) 
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 image-draggable" id="ir{{ $i }}" style="float:left;">
                                        <div class="form-group text-left">
                                            <img class="img-thumbnail" src="{{ uploads_url($value) }}">
                                            <input type="hidden" name="images[]" value="{{$value}}">
                                            <a href="javascript:void(0);" class="btn btn-danger btn-block btn-remove-images" data-id="{{ $i }}"><i class="fa fa-times"></i>{{ translate('remove') }}</a>
                                        </div>
                                    </div>
                                @php $i++ @endphp
                                @endforeach
                            @endif
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-12 col-sm-12 text-center">              
                                <button type="submit" class="btn ripple btn-submit btn-primary" data-loading-text="<span aria-hidden='true' class='spinner-border spinner-border-sm'></span>{{ translate('please_wait...') }}" tabindex="7">{{ translate('submit') }}</button>
                                <a class="btn ripple btn-secondary" href="{{ route('admin.gallery.list') }}">{{ translate('close') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
    </div>
    <input type="hidden" id="img_cnt" value="{{ $i }}">
    <input type="hidden" id="f" value="{{ $f }}">
    <input type="hidden" id="multi_image_field" value="">
    <script>
        function responsive_filemanager_callback(field_id){
            if(field_id=='multi_image_field'){
                var img_url = $("#multi_image_field").val();$("#multi_image_field").val('');
                var img_cnt = $("#img_cnt").val();img_cnt++;$("#img_cnt").val(img_cnt);
                var html = '<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 image-draggable" id="ir'+img_cnt+'" style="float:left;">';
                    html += '   <div class="form-group text-left">';
                    html += '      <img class="img-thumbnail" src="'+img_url+'">';
                    html += '      <input type="hidden" name="images[]" value="'+img_url+'">';
                    html += '      <a href="javascript:void(0);" class="btn btn-danger btn-block btn-remove-images" data-id="'+img_cnt+'"><i class="fa fa-times"> remove</i></a>';
                    html += '   </div>';
                    html += '</div>';
                $(".images_row").append(html);
            }else{
                var url = $('#'+field_id).val();
                $('#img_'+field_id).attr('src', url);
            }
        }
        $(document).ready(function () {
            init_select2();
            $('body').on('click', '.btn-remove-images', function (e) {
                var id = $(this).data('id');
                if(confirm("Are you sure ?")){
                    $("#ir"+id).remove();
                }
            });
            $("body").on("click", ".btn-add-features", function(e) {
                e.preventDefault();
                var f = $("#f").val();
                f++;
                $("#f").val(f);
                var html  = '<div class="col-12 col-sm-6 card-fdraggable" id="fd'+f+'">';
                    html +=  '   <div class="card custom-card">';
                    html +=  '     <div class="card-body">';
                    html +=  '        <div class="row">';
                    html +=  '           <div class="col-md-5">';
                    html +=  '              <div class="form-group">';
                    html +=  '                 <input type="text" class="form-control" name="features['+f+'][feature]" placeholder="<?php echo translate('feature'); ?>" tabindex="1" required />';
                    html +=  '              </div>';
                    html +=  '           </div>';
                    html +=  '           <div class="col-md-6">';
                    html +=  '              <div class="form-group">';
                    html +=  '                 <textarea class="form-control" name="features['+f+'][description]" placeholder="<?php echo translate('description'); ?>" tabindex="2" required /></textarea>';
                    html +=  '              </div>';
                    html +=  '           </div>';
                    html +=  '           <div class="col-12 col-sm-1">';
                    html +=  '              <div class="form-group form-group-float">';
                    html +=  '                 <button type="button" class="btn ripple btn-outline-danger btn-rounded btn-sm btn-remove-f-field"><i class="fa fa-times" aria-hidden="true"></i></button>';
                    html +=  '              </div>';
                    html +=  '           </div>';
                    html +=  '        </div>';
                    html +=  '     </div>';
                    html +=  '  </div>';
                    html +=  '</div>';
                $("#f-field-row").append(html);
            });
            $('body').on('click', '.btn-remove-f-field', function () {
                var here = $(this);
                if (confirm("Are you sure ?")) {
                    here.parent().parent().parent().parent().parent().parent().remove();
                }
                return false;
            });
            $(".image-sortable").sortable({
                connectWith: '.image-sortable',
                items: '.image-draggable',
                revert: true,
                placeholder: 'image-draggable-placeholder',
                forcePlaceholderSize: true,
                opacity: 0.77,
                cursor: 'move'
            });
        });
    </script>
@endsection