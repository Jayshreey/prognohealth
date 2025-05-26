<div class="modal d-block pos-static">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h6 class="modal-title">{{ translate('Review Category Details') }}</h6>
             <button aria-label="Close" class="btn-close close-popup" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
             <div class="row">
                <div class="col-md-12">
                   <div class="table-responsive">
                      <table class="table table-bordered table-hover mg-b-0">
                         <tbody>
                            <tr>
                               <th>{{ translate('name') }}</th>
                               <td>{{ $name }}</td>
                            </tr>
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