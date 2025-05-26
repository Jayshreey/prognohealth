<div class="modal d-block pos-static">
   <form action="{{ $page_action }}" method="post" class="data-parsley-validate"  data-block_form="true">
      <input class="form-control" name="id" type="hidden" value="{{ isset($id) && $id!= '' ? $id : '' }}">
      <div class="modal-dialog modal-dialog-scrollable" role="document"> 
         <div class="modal-content">
            <div class="modal-header">
               <h6 class="modal-title">{{ $page_title }}</h6>
               <button aria-label="Close" class="btn-close close-popup" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-8">
                     <div class="form-group text-left">
                        <label>{{ translate('Name') }} <span class="tx-danger">*</span></label>
                        <input class="form-control txt-submit" name="name" placeholder="{{ translate('Enter Name') }}" type="text" tabindex="1" value="{{ isset($category['name']) && $category['name'] != '' ? $category['name'] : ''  }}" required>
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
                                 @php $selected = isset($category['is_active']) && $category['is_active'] == $key ? 'selected' : ''  @endphp
                                 <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                              @endforeach
                           @endif
                        </select>
                        <span id="error_status"></span>
                     </div>
                  </div>
                  @php
                     $country_list = ['india' => translate("India"), 'uae' => translate("UAE"), 'new-zealand' => translate("New Zealand")];
                  @endphp
                  <div class="col-md-4">
                     <div class="form-group text-left">
                        <label>{{ translate('Country') }} <span class="tx-danger">*</span></label>
                        <select name="country" class="form-control select2-modal" data-parsley-errors-container="#error_status" tabindex="2" required>
                           @if(isset($country_list) && !empty($country_list))
                              @foreach($country_list as $key => $value)
                                 @php $selected = isset($category['country']) && $category['country'] == $key ? 'selected' : ''  @endphp
                                 <option value="{{ $key }}" {{ $selected }}>{{ ucfirst($value) }}</option>
                              @endforeach
                           @endif
                        </select>
                        <span id="error_status"></span>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group text-left">
                        <label>{{ translate('Parent') }} <span class="tx-danger">*</span></label>
                        <select name="parent_id" class="form-control select2-modal" data-parsley-errors-container="#error_parent" tabindex="2" required>
                        <option value="0">{{ translate("No Parent") }}</option>
                           @if(isset($parent) && !empty($parent))
                              @foreach($parent as $key => $value)
                                 @php $selected = isset($category['parent_id']) && $category['parent_id'] == $value->id ? 'selected' : ''  @endphp
                                 <option value="{{ $value->id }}" {{ $selected }}>{{ get_category_path_name_string($value->path,$value->id) }}-{{$value->country}}</option>
                              @endforeach
                           @endif
                        </select>
                        <span id="error_parent"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn ripple btn-submit btn-primary" data-loading-text="<span aria-hidden='true' class='spinner-border spinner-border-sm'></span> {{ translate('please_wait...') }}" tabindex="7">{{ translate('Submit') }}</button>
               <button class="btn ripple close-popup btn-secondary" type="button">{{ translate('Close') }}</button>
            </div>
         </div>
      </div>
   </form>
   <script type="text/javascript">
      $(document).ready(function () {
         init_select2modal();
      });
   </script>
</div>