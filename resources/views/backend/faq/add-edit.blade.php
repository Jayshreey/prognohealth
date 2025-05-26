
<div class="modal d-block pos-static">
    <form action="{{ $page_action }}" method="post" class="data-parsley-validate"  data-block_form="true" enctype='multipart/form-data' data-multipart='true'>
       <input class="form-control" name="id" type="hidden" value="{{ isset($id) && $id!= '' ? $id : '' }}">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">{{ $page_title }}</h6>
                    <button aria-label="Close" class="btn-close close-popup" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group text-left">
                                        <label>{{ translate('Question') }} <span class="tx-danger">*</span></label>
                                        <input class="form-control txt-submit" name="question" placeholder="{{ translate('Enter Question') }}" type="text" tabindex="1" value="{{ isset($faq['question']) && $faq['question'] != '' ? $faq['question'] : ''  }}" required>
                                    </div>
                                </div>
                                    @php
                                        $status_list = ['' => translate("Select"), '1' => translate("Active"), '0' => translate("Inactive")];
                                    @endphp
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label>{{ translate('Status') }} <span class="tx-danger">*</span></label>
                                        <select name="is_active" class="form-control select2-modal" data-parsley-errors-container="#error_status" tabindex="2" required>
                                            @if(isset($status_list) && !empty($status_list))
                                                @foreach($status_list as $key => $value)
                                                @php $selected = isset($faq['is_active']) && $faq['is_active'] == $key ? 'selected' : ''  @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span id="error_status"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group text-left">
                                    <label>{{ translate('Faq Category') }} <span class="tx-danger">*</span></label>
                                    <select name="faq_category_id" class="form-control select2-modal"  data-parsley-errors-container="#error_faq_category_id" required>
                                        <option value="">{{ translate("Select") }}</option>
                                        @if(isset($faq_category) && !empty($faq_category))
                                            @foreach($faq_category as $key => $value)
                                                @php $selected = isset($faq['faq_category_id']) && $faq['faq_category_id'] == $value->id ? 'selected' : ''  @endphp
                                                <option value="{{ $value->id }}" {{ $selected }}>{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span id="error_faq_category_id"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-left">
                                    <label>{{ translate('description') }}<span class="tx-danger">*</span></label>
                                    <textarea class="form-control html_editor" id="descript" name="description" placeholder="{{ translate('description') }}" tabindex="4" required />{{ isset($faq['description']) && $faq['description']!='' ? $faq['description'] : '' }}</textarea>
                                    {{-- @php echo app_html_editor("description","description",translate('description'),isset($faq['description']) && $faq['description'] != '' ? $faq['description'] : '') @endphp --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn ripple btn-submit btn-primary" data-loading-text="<span aria-hidden='true' class='spinner-border spinner-border-sm'></span> {{ translate('please_wait...') }}" tabindex="7">{{ translate('submit') }}</button>
                    <button class="btn ripple close-popup btn-secondary" type="button">{{ translate('Close') }}</button>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        function responsive_filemanager_callback(field_id){
         var url = $('#'+field_id).val();
            $('#img_'+field_id).attr('src', url);
        }
        $(document).ready(function () {
            init_select2modal();
            $("#descript").summernote(); 
        });
    </script>
 </div>