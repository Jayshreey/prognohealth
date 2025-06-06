@extends('backend.app')
@section('page_title'){{ translate('Journey List') }}@endsection
@section('style_files')
<link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/summernote/summernote-lite.min.css') }}">
@endsection
@section('script_files')
	<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/datatable/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/datatable/dataTables.responsive.min.js') }}"></script>
	<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
	<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/summernote/summernote-lite.min.js') }}"></script>
	<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/summernote/init.js') }}"></script>
@endsection
@section('content')
	<div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{ translate('Journey List') }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ translate('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ translate('List') }}</a></li>
            </ol>
        </div>
		<div class="btn btn-list">
			@if(valid_session('journey','add',false))
				<a class="btn ripple popup-page btn-primary" href="{{ route('admin.journey.new') }}"><i class="fe fe-plus-circle ml-2"></i> {{ translate('Add New') }}</a>
			@endif
		</div>
    </div>
	<div class="row sidemenu-height">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card custom-card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table data-list-table">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ translate('Journey') }}</th>
									<th>{{ translate('Created On') }}</th>
									<th>{{ translate('Status') }}</th>
									<th>{{ translate('Actions') }}</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#</th>
									<th>{{ translate('title') }}</th>
									<th>{{ translate('Created_on') }}</th>
									<th>{{ translate('Status') }}</th>
									<th>{{ translate('Actions') }}</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		$(document).ready(function () {
			$('.data-list-table').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "{{ route('admin.journey.list') }}",
					"dataType": "json",
					"type": "POST",
					"data": {action : 'list'},
					"headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					"error": function(){ $(".data-list-table").css("display","none"); },
					"beforeSend": function () { },
					"complete": function () {
						initDatatableOptions();
					}
				},
				"columns": [
					{"data": "id", orderable: false, searchable: false, className: 'text-center'},
					{"data": "title", orderable: false, className: 'text-center'},
					{"data": "created_at", searchable: false, className: 'text-center'},
					{"data": "status", orderable: false, searchable: false, className: 'text-center'},
					{"data": "actions", orderable: false, searchable: false, className: 'text-center'}
				],
				bAutoWidth: false,
				responsive: true,
				searchDelay: 1500,
				columnDefs: [{
					orderable: false,
					targets: 0
				}],
				fixedHeader: {
					header: true,
					footer: true
				},
				oLanguage: {
					sZeroRecords: "{{ translate('No Results Available') }}",
					sSearch: "{{ translate('Search') }}",
					sProcessing: "{{ translate('Please Wait...') }}",
					oPaginate: {
						sFirst: "{{ translate('First') }}",
						sPrevious: "{{ translate('Previous') }}",
						sNext: "{{ translate('Next') }}",
						sLast: "{{ translate('Last') }}"
					}
				},
				aLengthMenu: {{ create_dt_length_menu(app_setting('records_per_page','10')) }},
				order: [[2, "desc"]],
				bInfo: true,
				pageLength: {{ app_setting('records_per_page','10') }},
				buttons: [],
				initComplete: function () {
					initDatatableOptions();
				}
			}).on( 'responsive-display', function ( e, datatable, row, showHide, update ) {
				initDatatableOptions();
			});
		});
	</script>
@endsection