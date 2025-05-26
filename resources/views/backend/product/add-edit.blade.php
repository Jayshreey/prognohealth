@extends('backend.app')
@section('style_files')
<link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/summernote/summernote-lite.min.css') }}">
<link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/filepond/filepond.css') }}">
@endsection
@section('script_files')
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/darggable/jquery-ui-darggable.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/inputtags/inputtags.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/summernote/summernote-lite.min.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/summernote/init.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/filepond/filepond-plugin-file-validate-size.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/filepond/filepond.min.js') }}"></script>
@endsection
@section('page_title'){{ translate('Basic Settings') }}@endsection
@section('content')
    <div class="page-header">
        <div>
        <h2 class="main-content-title tx-24 mg-b-5">{{ isset($page_title) && $page_title != '' ? translate($page_title) : '' }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ translate('dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.list') }}">{{ translate('product') }} </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ isset($page_title) && $page_title != '' ? translate($page_title) : '' }}</li>
        </ol>
        </div>
        <div class="btn btn-list">
        <a class="btn ripple btn-primary" href="{{ route('admin.product.list') }}"><i class="fe fe-list ml-2"></i>{{ translate('list') }}</a>
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
                                    <?php echo app_file_manager('image', 'image', 1, isset($product['image']) && $product['image'] != '' ? $product['image'] : ''); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-10">
                                <div class="row">
                                    <div class="col-12 col-sm-9">
                                        <div class="form-group">
                                        <label>{{ translate('name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ translate('name') }}" tabindex="2" value="{{ isset($product['name']) && $product['name'] != '' ? $product['name'] : '' }}" required />
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
                                                    @php $selected = isset($product['is_active']) && $product['is_active'] == $key ? 'selected' : ''  @endphp
                                                    <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span id="error_status"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                        <label>{{ translate('SEO Title') }} </label>
                                        <input type="text" class="form-control" name="seo_title" placeholder="{{ translate('SEO Title') }}" tabindex="2" value="{{ isset($product['seo_title']) && $product['seo_title'] != '' ? $product['seo_title'] : '' }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                        <label>{{ translate('Short Description') }} <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="short_description" placeholder="{{ translate('Short Description') }}" tabindex="4" required>{{ isset($product['short_description']) && $product['short_description'] != '' ? $product['short_description'] : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                        <label>{{ translate('SEO Description') }}</label>
                                        <textarea class="form-control" name="seo_description" placeholder="{{ translate('SEO Description') }}" tabindex="4">{{ isset($product['seo_description']) && $product['seo_description'] != '' ? $product['seo_description'] : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label>{{ translate('SEO Keywords') }}</label>
                                <input type="text" data-role="tagsinput" class="form-control" name="seo_keywords" placeholder="{{ translate('SEO_keywords') }}" value="{{ isset($product['seo_keywords']) && $product['seo_keywords'] != '' ? $product['seo_keywords'] : '' }}" tabindex="7" />
                                </div>
                            </div>
                             
                            <div class="col-sm-6 col-12">
                                <div class="form-group text-left">
                                <label>{{ translate('Category')  }}  <span class="tx-danger">*</span></label>
                                <select name="category_id" class="form-control select2"  data-parsley-errors-container="#error_category_id" required>
                                    @if(isset($category) && !empty($category))
                                        <option value="">{{ translate('Select') }}</option>
                                        @foreach($category as $key => $value)
                                            @php $selected = isset($product['category_id']) && $product['category_id'] == $value->id ? 'selected' : ''  @endphp
                                            <option value="{{ $value->id }}" {{ $selected }}>{{ $value->name }}- {{ $value->country && trim($value->country) != '' ? $value->country : 'india' }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span id="error_category_id"></span>
                                </div>
                            </div>
                            @php $attac =  isset($product['attachments']) && $product['attachments'] != '' ? json_decode($product['attachments']) : array(); @endphp
                            <div class="col-md-6">
                                <label>{{ translate('Attachments') }}</span>
                                    @if(isset($attac) && !empty($attac))
                                       <small class="text-center">(<i>Upload new file the old file will be removed.</i>)</small>
                                    @endif  
                                </label>
                                <div class="form-group">
                                    @if(isset($attac) && !empty($attac))
                                        <a href="{{ getBaseURL().'public'.$attac->path }}" target="_blank" class="btn ripple btn-outline-primary btn-block">
                                        {!! file_type_icon($attac->type) !!} {{ $attac->name  }}  
                                        </a><hr/>
                                    @endif  
                                    <input type="file" class="filepond" name="filepond"/>
                                </div>
                            </div>
                            @php $raw_cert = $product['certification_id'] ?? '[]';
                                // Always fallback to empty array on failure
                                $decoded = json_decode($raw_cert, true);
                                $selected_certificate = is_array($decoded) ? $decoded : []; @endphp            
                                <div class="col-sm-6 col-12">
                                    <div class="form-group text-left">
                                    <label>{{ translate('Certification')  }} </label>
                                    <select name="certification_id[]" class="form-control select2"  data-parsley-errors-container="#error_certification_id" multiple="true">
                                        @if(isset($certification) && !empty($certification))
                                            @foreach($certification as $ckey => $cvalue)
                                            <option value="{{ $cvalue->id }}" {{ in_array((string)$cvalue->id, array_map('strval', $selected_certificate)) ? 'selected' : '' }}>
                                                {{ $cvalue->name }}
                                            </option>
                                            @endforeach
                                         @endif
                                    </select>
                                    <span id="error_certification_id"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>{{ translate('description') }}<span class="text-danger">*</span></label>
                                    @php echo app_html_editor("description","description",translate('description'),isset($product['description']) && $product['description'] != '' ? $product['description'] : '') @endphp
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>{{ translate('about') }}</label>
                                    @php echo app_html_editor("about","about",translate('about'),isset($product['about']) && $product['about'] != '' ? $product['about'] : '',false) @endphp
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Product Details</label>
                                    @php echo app_html_editor("product_details","product_details",translate('Product Details'),isset($product['product_details']) && $product['product_details'] != '' ? $product['product_details'] : '',false) @endphp
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
                                    <label>{{ translate('Section') }} (<a href="javascript:void(0);" class="btn-add-section text-danger">{{ translate('Add New') }}</a>)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row sortable" id="sf-field-row">
                            @php $sf = 0; $section = json_decode(isset($product['section']) && $product['section']!= '' ? $product['section'] : '') @endphp
                            @if(isset($section) && !empty($section)) 
                                @foreach ($section as $skey => $svalue)
                                    <div class="col-12 col-sm-12 card-fdraggable" id="sf{{ $sf }}">
                                        <div class="card custom-card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="section[{{ $sf }}][name]" placeholder="{{ translate('name') }}" tabindex="1" value="{{ isset($svalue->name) && $svalue->name!='' ? $svalue->name : '' }}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-1">
                                                        <div class="form-group form-group-float">
                                                            <button type="button" class="btn ripple btn-outline-danger btn-rounded btn-sm btn-remove-sf-field"><i class="ri-delete-bin-line" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control html_editor" name="section[{{ $sf }}][description]" placeholder="{{ translate('description') }}" tabindex="2" required />{{ isset($svalue->description) && $svalue->description!='' ? $svalue->description : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                               <!-- Image Picker -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>
                                                                {{ translate('Section Images') }} 
                                                            <a href="javascript:void(0);"
                                                                data-url="{{ getBaseURL().'filemanager/dialog.php?type=1&field_id=section_image_field_'.$sf }}"
                                                                class="btn-iframe text-danger"
                                                                title="{{ translate('Click on the image to change') }}">
                                                                {{ translate('select') }}
                                                                </a>

                                                                <input type="hidden" id="section_image_field_{{ $sf }}">


  
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                    <!-- Images Display -->
                                                    <div class="row image-sortable images_row" id="section_images_{{ $sf }}">
                                                        @php $si=0; @endphp
                                                        @if (!empty($svalue->images))
                                                            @foreach ($svalue->images as $i => $image)
                                                                <div class="col-lg-2 col-md-2 col-sm-12 image-draggable" id="ir{{ $sf }}_{{ $i }}">
                                                                    <div class="form-group text-left">
                                                                        <img class="img-thumbnail" src="{{ uploads_url($image) }}">
                                                                        <input type="hidden" name="section[{{ $sf }}][images][]" value="{{ $image }}">
                                                                        <a href="javascript:void(0);" class="btn btn-danger btn-block btn-remove-section-images" data-id="{{ $i }}">
                                                                                        <i class="fa fa-times"></i> {{ translate('remove') }}
                                                                                    </a>
                                                                      
                                                                    </div>
                                                                </div>
                                                                
                                                            @endforeach
                                                        @endif
                                                    @php $si++ @endphp
                                                    </div>


                                                    <div class="">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>{{ translate('features') }} (<a href="javascript:void(0);" class="btn-add-feature" data-section="{{ $sf }}">{{ translate('Add New') }}</a>)</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row sortable features-wrapper" id="f-field-row-{{ $sf }}" data-section="{{ $sf }}">
                                                           @php $features = isset($svalue->features) ? $svalue->features : [] @endphp
                                                                @if (!empty($features))
                                                                    @foreach ($features as $key => $value)
                                                                        <div class="col-12 col-sm-6 card-fdraggable" id="fd{{ $sf }}_{{ $key }}">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-5">
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control" name="section[{{ $sf }}][features][{{ $key }}][feature]" placeholder="{{ translate('feature') }}" value="{{ $value->feature ?? '' }}" required />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="form-group">
                                                                                                <textarea class="form-control html_editor" name="section[{{ $sf }}][features][{{ $key }}][description]" placeholder="{{ translate('description') }}" required>{{ $value->description ?? '' }}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-1">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn ripple btn-outline-danger btn-rounded btn-sm btn-remove-f-field"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $sf++ @endphp
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
                                    <label>Section Count (<a href="javascript:void(0);" class="btn-add-section_count">{{ translate('Add New') }}</a>)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row sortable" id="f-field-row">
                            @php $f = 0; $section_count = json_decode(isset($product['section_count']) && $product['section_count']!= '' ? $product['section_count'] : '') @endphp
                            @if(isset($section_count) && !empty($section_count)) 
                                @foreach ($section_count as $key => $value)
                                    <div class="col-12 col-sm-6 card-fdraggable" id="fd{{ $f }}">
                                        <div class="card custom-card">
                                            <div class="card-body">
                                                <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="section_count[{{ $f }}][count]" placeholder="{{ translate('count') }}" tabindex="1" value="{{ isset($value->count) && $value->count!='' ? $value->count : '' }}" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="section_count[{{ $f }}][description]" placeholder="{{ translate('description') }}" tabindex="2" required />{{ isset($value->description) && $value->description!='' ? $value->description : '' }}</textarea>
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
                                <label>{{ translate('images') }} (<a href="javascript:void(0);" data-url="{{ getBaseURL().'filemanager/dialog.php?type=1&field_id=multi_image_field' }}" class="btn-iframe text-danger" data-original-title="{{ translate('Click on the image to change') }}" data-placement="top" data-toggle="tooltip" title="{{ translate('Click on the image to change') }}">{{ translate('select') }}</a>)</label>
                            </div>
                            </div>
                        </div>
                        <div class="row image-sortable images_row">
                            @php $i=0; $images = json_decode(isset($product['images']) && $product['images']!= '' ? $product['images'] : ''); @endphp
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
                                <a class="btn ripple btn-secondary" href="{{ route('admin.product.list') }}">{{ translate('close') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
    </div>
    <input type="hidden" id="section_img_cnt{{ $sf }}" value="{{ count($svalue->images ?? []) }}">
    <input type="hidden" id="img_cnt" value="{{ $i }}">
    <input type="hidden" id="sf" value="{{ $sf }}">
    <input type="hidden" id="f" value="{{ $f }}">
    <input type="hidden" id="multi_image_field" value="">
    <input type="hidden" id="section_image_field_{{ $sf }}" value="">
    <script>
        function responsive_filemanager_callback(field_id){
           
       var sf = parseInt($("#sf").val()) || 0;
      
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
            }
             else if (field_id.startsWith('section_image_field_')) {
                var sectionIndex = field_id.replace('section_image_field_', '');
                var img_url = $("#" + field_id).val();
                
                $("#" + field_id).val('');

                var section_img_cnt = parseInt($("#section_img_cnt" + sectionIndex).val()) || 0;
                section_img_cnt++;
                $("#section_img_cnt" + sectionIndex).val(section_img_cnt);

                var html = '<div class="col-lg-2 col-md-2 col-sm-12 image-draggable" id="ir_sec' + sectionIndex + '_' + section_img_cnt + '" style="float:left;">';
                html += '   <div class="form-group text-left">';
                html += '      <img class="img-thumbnail" src="' + img_url + '">';
                html += '      <input type="hidden" name="section[' + sectionIndex + '][images][]" value="' + img_url + '">';
                html += '      <a href="javascript:void(0);" class="btn btn-danger btn-block btn-remove-images" data-id="' + section_img_cnt + '"><i class="fa fa-times"> remove</i></a>';
                html += '   </div>';
                html += '</div>';

                $("#section_images_" + sectionIndex).append(html);
            }
            else{
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
            // $("body").on("click", ".btn-add-section", function(e) {
            //     e.preventDefault();
            //     // alert("New Section Added");
            //     var sf = $("#sf").val();
            //     sf++;
            //     $("#sf").val(sf);
            //     var html  = '<div class="col-12 col-sm-12 card-fdraggable" id="sf'+sf+'">';
            //         html +=  '   <div class="card custom-card">';
            //         html +=  '     <div class="card-body">';
            //         html +=  '        <div class="row">';
            //         html +=  '           <div class="col-md-11">';
            //         html +=  '              <div class="form-group">';
            //         html +=  '                 <input type="text" class="form-control" name="section['+sf+'][name]" placeholder="{{ translate('name') }}" required />';
            //         html +=  '              </div>';
            //         html +=  '           </div>';
            //         html +=  '           <div class="col-12 col-md-1">';
            //         html +=  '              <div class="form-group form-group-float text-center">';
            //         html +=  '                 <button type="button" class="btn ripple btn-outline-danger btn-rounded btn-sm btn-remove-sf-field"><i class="ri-delete-bin-line" aria-hidden="true"></i></button>';
            //         html +=  '              </div>';
            //         html +=  '           </div>';
            //         html +=  '        </div>';
            //         html +=  '        <div class="row">';
            //         html +=  '           <div class="col-md-12">';
            //         html +=  '              <div class="form-group">';
            //         html +=  '                  <textarea class="form-control html_editor" id="descript-'+sf+'" name="section['+sf+'][description]" placeholder="{{ translate('description') }}" required data-height="150" /></textarea>';
            //         html +=  '              </div>';
            //         html +=  '           </div>';
            //         html +=  '        </div>';
            //         html +=  '     </div>';
            //         html +=  '  </div>';
            //         html +=  '</div>';
            //     $("#sf-field-row").append(html);
            //     $("#descript-"+sf).summernote(); 
            // });
            $('body').on('click', '.btn-remove-sf-field', function () {
                var here = $(this);
                if (confirm("Are you sure ?")) {
                    here.parent().parent().parent().parent().parent().parent().remove();
                }
                return false;
            });
            $(document).on('click', '.btn-remove-f-field', function () {
                $(this).closest('.card-fdraggable').remove();
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
            $('body').on('click', '.btn-remove-images', function (e) {
                var id = $(this).data('id');
                if(confirm("Are you sure ?")){
                    $("#ir"+id).remove();
                }
            });
            // $("body").on("click", ".btn-add-features", function(e) {
            //     e.preventDefault();
            //     var f = $("#f").val();
            //     f++;
            //     $("#f").val(f);
            //     var html  = '<div class="col-12 col-sm-6 card-fdraggable" id="fd'+f+'">';
            //         html +=  '   <div class="card custom-card">';
            //         html +=  '     <div class="card-body">';
            //         html +=  '        <div class="row">';
            //         html +=  '           <div class="col-md-5">';
            //         html +=  '              <div class="form-group">';
            //         html +=  '                 <input type="text" class="form-control" name="features['+f+'][feature]" placeholder="<?php echo translate('feature'); ?>" tabindex="1" required />';
            //         html +=  '              </div>';
            //         html +=  '           </div>';
            //         html +=  '           <div class="col-md-8">';
            //         html +=  '              <div class="form-group">';
            //         html +=  '                 <textarea class="form-control html_editor" id="f-description-'+f+'" name="features['+f+'][description]" placeholder="<?php echo translate('description'); ?>" tabindex="2" required data-height="150"/></textarea>';
            //         html +=  '              </div>';
            //         html +=  '           </div>';
            //         html +=  '           <div class="col-12 col-sm-1">';
            //         html +=  '              <div class="form-group form-group-float">';
            //         html +=  '                 <button type="button" class="btn ripple btn-outline-danger btn-rounded btn-sm btn-remove-f-field"><i class="fa fa-times" aria-hidden="true"></i></button>';
            //         html +=  '              </div>';
            //         html +=  '           </div>';
            //         html +=  '        </div>';
            //         html +=  '     </div>';
            //         html +=  '  </div>';
            //         html +=  '</div>';
            //     $("#f-field-row").append(html);
            //     $("#f-description-"+f).summernote(); 
            // });
            // $('body').on('click', '.btn-remove-f-field', function () {
            //     var here = $(this);
            //     if (confirm("Are you sure ?")) {
            //         here.parent().parent().parent().parent().parent().parent().remove();
            //     }
            //     return false;
            // });
            $("body").on("click", ".btn-add-section", function(e) {
                alert('hi');
    e.preventDefault();
    var sf = parseInt($("#sf").val()) || 0;
    sf++;
    $("#sf").val(sf);
    var baseUrl = "{{ getBaseURL() }}";

    var html  = '<div class="col-12 col-sm-12 card-fdraggable" id="sf'+sf+'">';
        html +=  '   <div class="card custom-card">';
        html +=  '     <div class="card-body">';
        html +=  '        <div class="row">';
        html +=  '           <div class="col-md-11">';
        html +=  '              <div class="form-group">';
        html +=  '                 <input type="text" class="form-control" name="section['+sf+'][name]" placeholder="Section Name" required />';
        html +=  '              </div>';
        html +=  '           </div>';
        html +=  '           <div class="col-12 col-md-1">';
        html +=  '              <button type="button" class="btn ripple btn-outline-danger btn-sm btn-remove-sf-field"><i class="ri-delete-bin-line"></i></button>';
        html +=  '           </div>';
        html +=  '        </div>';

        html +=  '        <div class="row">';
        html +=  '           <div class="col-md-12">';
        html +=  '              <div class="form-group">';
        html +=  '                 <textarea class="form-control html_editor" id="descript-'+sf+'" name="section['+sf+'][description]" placeholder="Section Description" required data-height="150"></textarea>';
        html +=  '              </div>';
        html +=  '           </div>';
        html +=  '        </div>';

           // Image select button + preview wrapper
        html +=  '<label>Section Images <small>(Click to select)</small></label>';
        html +=  '<div class="mb-2">';
        //html +=  '  <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-select-section-images" data-section="'+sf+'" data-toggle="tooltip" title="Select Images">Select Images</a>';
        html += ' <a href="javascript:void(0);" data-url="' + baseUrl + 'filemanager/dialog.php?type=1&field_id=section_image_field_' + sf + '" class="btn-iframe text-danger" data-original-title="{{ translate("Click on the image to change") }}" data-placement="top" data-toggle="tooltip" title="{{ translate("Click on the image to change") }}">{{ translate("select") }}</a>';
        html +=  '</div>';
        html +=  '<div class="row image-sortable section-images-wrapper" id="section_images_'+sf+'"></div>';
        html += '<input type="hidden" id="section_image_field_' + sf + '" name="section[' + sf + '][image_field]" value="">';

        // FEATURES WRAPPER AND ADD FEATURE BUTTON
        html +=  '        <div class="features-wrapper" data-section="'+sf+'"></div>';
        html +=  '        <button type="button" class="btn btn-sm btn-info btn-add-feature" data-section="'+sf+'">Add Feature</button>';

        html +=  '     </div>';
        html +=  '  </div>';
        html +=  '</div>';

    $("#sf-field-row").append(html);
    $("#descript-"+sf).summernote();
});
// $("body").on("click", ".btn-add-feature", function(e) {
//     e.preventDefault();
//     var sectionId = $(this).data('section');
//     var wrapper = $('.features-wrapper[data-section="'+sectionId+'"]');
//     var featureCount = wrapper.children('.feature-item').length;

//     var html  = '<div class="feature-item border rounded p-2 mb-2">';
//         html += '   <div class="form-group">';
//         html += '       <label>Feature Name</label>';
//         html += '       <input type="text" class="form-control" name="section['+sectionId+'][features]['+featureCount+'][feature]" required />';
//         html += '   </div>';
//         html += '   <div class="form-group">';
//         html += '       <label>Feature Description</label>';
//         html += '       <textarea class="form-control" name="section['+sectionId+'][features]['+featureCount+'][description]" required></textarea>';
//         html += '   </div>';
        
//         html += '   <button type="button" class="btn btn-danger btn-sm btn-remove-feature">Remove Feature</button>';
//         html += '</div>';

//     wrapper.append(html);
// });
$("body").on("click", ".btn-add-feature", function(e) {
    e.preventDefault();

    var sectionId = $(this).data('section');
    var wrapper = $('.features-wrapper[data-section="' + sectionId + '"]');
    var featureCount = wrapper.find('.card-fdraggable').length;

    var html  = '<div class="col-12 col-sm-6 card-fdraggable" id="fd' + sectionId + '_' + featureCount + '">';
        html += '  <div class="card">';
        html += '    <div class="card-body">';
        html += '      <div class="row">';
        html += '        <div class="col-md-5">';
        html += '          <div class="form-group">';
        html += '            <input type="text" class="form-control" name="section[' + sectionId + '][features][' + featureCount + '][feature]" placeholder="Feature" required />';
        html += '          </div>';
        html += '        </div>';
        
      
        html +=  '           <div class="col-md-8">';
        html +=  '              <div class="form-group">';
        html +=  '                 <textarea class="form-control html_editor" id="fdescript-'+featureCount+'" name="section[' + sectionId + '][features][' + featureCount + '][description]" placeholder="Section Description" required data-height="150"></textarea>';
        html +=  '              </div>';
        html +=  '           </div>';
     

        html += '        <div class="col-12 col-sm-1">';
        html += '          <div class="form-group">';
        html += '            <button type="button" class="btn ripple btn-outline-danger btn-rounded btn-sm btn-remove-f-field"><i class="fa fa-times"></i></button>';
        html += '          </div>';
        html += '        </div>';
        html += '      </div>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

    wrapper.append(html);
     $("#fdescript-"+featureCount).summernote();
});
$("body").on("click", ".btn-add-section_count", function(e) {
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
                    html +=  '                 <input type="text" class="form-control" name="section_count['+f+'][count]" placeholder="<?php echo translate('Count'); ?>" tabindex="1" required />';
                    html +=  '              </div>';
                    html +=  '           </div>';
                    html +=  '           <div class="col-md-6">';
                    html +=  '              <div class="form-group">';
                    html +=  '                 <textarea class="form-control" name="section_count['+f+'][description]" placeholder="<?php echo translate('description'); ?>" tabindex="2" required /></textarea>';
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
$(document).on('click', '.btn-remove-section-images', function () {
   
        $(this).closest('.image-draggable').remove();
     
});
$("body").on("click", ".btn-remove-sf-field", function() {
     if(confirm("Are you sure ?")){
         $(this).closest(".card-fdraggable").remove();
     }
});

            // Register plugins
            FilePond.registerPlugin(FilePondPluginFileValidateSize, FilePondPluginFileValidateType);

            // Initialize FilePond
            const inputElement = document.querySelector('input[type="file"]');
            FilePond.create(inputElement, {
                //allowMultiple: true, // Allow multiple files
                //maxFiles: null, // Unlimited files can be uploaded
                maxFileSize: '3MB', // Maximum file size
                acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'], // Accepted file types
                server: {
                    url: '{{ route('admin.product.upload') }}',// Laravel route for handling file uploads
                    timeout: 7000, 
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        ondata: (formData) => {
                            // Add additional data to formData if needed
                            formData.append('action', 'upload_id_card');
                            return formData;
                        },
                        onaddfile: (error, file) => {
                            if (!error) {
                                alert('File added: ' + file.name);
                            } else {
                                console.error('Error adding file:', error);
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection