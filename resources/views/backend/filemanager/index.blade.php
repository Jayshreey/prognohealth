@extends('backend.app')
@section('page_title'){{ translate('Filemanager') }}@endsection
@section('content')
	<div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{ translate('Filemanager') }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ translate('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ isset($page_title) && $page_title != '' ? translate($page_title) : '' }}</a></li>
            </ol>
        </div>
    </div>
	<div class="row sidemenu-height">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card custom-card">
				<div class="card-body">
                    <iframe src="{{ getBaseURL() . 'filemanager/dialog.php' }}" title="{{ isset($page_title) && $page_title != '' ? translate($page_title) : '' }}" style="width: 100%;height: 400px;"></iframe>
				</div>
			</div>
		</div>
	</div>
@endsection