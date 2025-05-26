
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
                                <?php echo app_file_manager('image','image',1,isset($slider['image']) && $slider['image'] != '' ? $slider['image'] : ''); ?>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group text-left">
                                    <label>{{ translate('Name') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control txt-submit" name="name" placeholder="{{ translate('Enter Name') }}" type="text" tabindex="1" value="{{ isset($slider['name']) && $slider['name'] != '' ? $slider['name'] : ''  }}" required>
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
                                            @php $selected = isset($slider['is_active']) && $slider['is_active'] == $key ? 'selected' : ''  @endphp
                                            <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span id="error_status"></span>
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