<div class="modal d-block pos-static">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h6 class="modal-title">{{ translate('Product Details') }}</h6>
             <button aria-label="Close" class="btn-close close-popup" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
             <div class="row">
                <div class="col-md-12">
                   <div class="table-responsive">      
                      <table class="table table-bordered table-hover mg-b-0">
                         <tbody>
                           <tr>
                              <th><?php echo translate('image'); ?></th>
                              <td class="text-center" colspan="3">
                                 <?php
                                    echo '<img alt="'.$name.'" class="radius img-thumbnail image-delay" src="'.uploads_url('loader.gif').'" data-src="'.uploads_url($image).'" style="width:150px;">';
                                 ?>
                              </td>
                           </tr>
                            <tr>
                               <th>{{ translate('Name') }}</th>
                               <td>{{ $name }}</td>
                            </tr>
                            <tr>
                                <th>{{ translate('Short Description') }}</th>
                                <td>{{ $short_description }}</td>
                            </tr>
                            <tr>
                                <th>{{ translate('Category') }}</th>
                                <td>
                                    <span class="tag tag-primary tag-pill mt-1 mb-1">@php echo getColumnValue('category',['id'=> $category_id],'name') @endphp</span>
                                </td>
                            </tr>
                            <tr>
                              <th>{{ translate('Certificate') }}</th>
                              <td>
                                  @php
                                    $certification = array();
                                    $certificate = json_decode($certification_id); 
                                  @endphp
                                  @if(!empty($certificate))
                                      @foreach ($certificate as $key => $value) 
                                          @php $certification[] = '<span class="tag tag-secondary tag-pill mt-1 mb-1">'.getColumnValue('certification',['id'=> $value],'name').'</span>'; @endphp
                                    @endforeach
                                  @endif
                                  @php echo implode(" ",$certification) @endphp
                              </td>
                          </tr>
                            @php $section = json_decode($section); @endphp
                            @if(!empty($section))
                                <tr>
                                    <th>{{ translate('Section') }}</th>
                                    <td>
                                        <table class="table table-bordered table-hover mg-b-0">
                                        <thead>
                                            <tr>
                                                <th>{{ translate('name') }}</th>
                                                <th>{{ translate('description') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($section as $skey => $svalue)
                                                <tr>
                                                    <td>@php echo isset($svalue->name) ? $svalue->name : '' @endphp</td>
                                                    <td>@php echo isset($svalue->description) ? $svalue->description : '' @endphp</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endif
                            @php $images = json_decode($images); @endphp
                            @if(!empty($images))
                              <tr>
                                 <th>{{ translate('Images') }}</th>
                                 <td colspan="3">
                                    @foreach ($images as $key => $value) 
                                       <img class="img-thumbnail" src="@php echo uploads_url($value); @endphp" style="width:100px;">
                                    @endforeach
                                 </td>
                              </tr>
                            @endif  
                            <tr>
                               <th>{{ translate('Status') }}</th>
                               <td><span class="badge bg-{{ $is_active==='1' ? 'success' : 'danger' }}">{{ $is_active==='1' ? translate('Active') : translate('Inactive') }}</span></td>
                            </tr>
                            <tr>
                               <th>{{ translate('Created By') }}</th>
                               <td>{{ get_crud_user_details($created_by,'name') }}</td>
                            </tr>
                            <tr>
                               <th>{{ translate('Created On') }}</th>
                               <td>{{ $created_at }}</td>
                            </tr>
                            <tr>
                               <th>{{ translate('Updated By') }}</th>
                               <td>{{ get_crud_user_details($updated_by,'name') }}</td>
                            </tr>
                            <tr>
                               <th>{{ translate('Updated On') }}</th>
                               <td>{{ $updated_at }}</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
          <div class="modal-footer">
             <button class="btn ripple close-popup btn-secondary" type="button">{{ translate('Close') }}</button>
          </div>
       </div>
    </div>
 </div>