
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
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                <div class="form-group text-left">
                                    <label><?php echo translate('image'); ?> <span class="tx-danger">*</span></label>
                                    <?php echo app_file_manager('image','image',1,isset($review['image']) && $review['image'] != '' ? $review['image'] : ''); ?>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group text-left">
                                        <label>{{ translate('Name') }} <span class="tx-danger">*</span></label>
                                        <input class="form-control txt-submit" name="name" placeholder="{{ translate('Enter Name') }}" type="text" tabindex="1" value="{{ isset($review['name']) && $review['name'] != '' ? $review['name'] : ''  }}" required>
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
                                                @php $selected = isset($review['is_active']) && $review['is_active'] == $key ? 'selected' : ''  @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span id="error_status"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group text-left">
                                        <label>{{ translate('Position') }} <span class="tx-danger">*</span></label>
                                        <input class="form-control txt-submit" name="position" placeholder="{{ translate('Enter Position') }}" type="text" tabindex="3" value="{{ isset($review['position']) && $review['position'] != '' ? $review['position'] : ''  }}" required>
                                    </div>
                                </div>
                                @php
                                    $rating_list = ['' => translate("Select"), '1' => translate("1 Star"), '2' => translate("2 Star"), '3' => translate("3 Star"), '4' => translate("4 Star"), '5' => translate("5 Star"),];
                                @endphp
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label>{{ translate('Rating') }} <span class="tx-danger">*</span></label>
                                        <select name="rating" class="form-control select2-modal" data-parsley-errors-container="#error_rating" tabindex="4" required>
                                            @if(isset($rating_list) && !empty($rating_list))
                                                @foreach($rating_list as $key => $value)
                                                @php $selected = isset($review['rating']) && $review['rating'] == $key ? 'selected' : ''  @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span id="error_rating"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @php $selected_review_cat =  isset($review['review_category_id']) && $review['review_category_id'] != '' ? json_decode($review['review_category_id']) : array(); @endphp
                                <div class="col-sm-12 col-12">
                                    <div class="form-group text-left">
                                    <label>{{ translate('Review Category')  }} <span class="tx-danger">*</span></label>
                                    <select name="review_category_id[]" class="form-control select2-modal"  data-parsley-errors-container="#error_review_category_id" multiple="true" required>
                                        @if(isset($review_category) && !empty($review_category))
                                            @foreach($review_category as $rkey => $rvalue)
                                                @php $selected = ''; @endphp
                                                @if (in_array($rvalue->id, $selected_review_cat)) @php $selected = 'selected'; @endphp @endif
                                                <option value="{{ $rvalue->id }}" {{ $selected }}>{{ $rvalue->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span id="error_review_category_id"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-left">
                                        <label>{{ translate('description title') }} <span class="tx-danger">*</span></label>
                                        <input class="form-control txt-submit" name="description_title" placeholder="{{ translate('Enter Description Title') }}" type="text" tabindex="1" value="{{ isset($review['description_title']) && $review['description_title'] != '' ? $review['description_title'] : ''  }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-left">
                                    <label>{{ translate('description') }}<span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="description" placeholder="{{ translate('Enter Description') }} " tabindex="1" required>{{ isset($review['description']) && $review['description'] != '' ? $review['description'] : ''  }}</textarea>
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
        });
    </script>
 </div>