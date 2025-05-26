@extends('backend.app')
@section('page_title'){{ translate('Dashboard') }}@stop
@section('content')
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{ translate('Welcome To Dashboard') }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{ translate('Dashboard') }}</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Number Of Products</p>
                        <div class="ms-auto">
                            <i class="fa fa-cubes fs-20 text-primary"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">568</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                            class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex">
                        <span class="text-muted">Last Month</span>
                        <span class="ms-auto"><i class="fa fa-caret-up me-1 text-success"></i>0.7%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Total Category</p>
                        <div class="ms-auto">
                            <i class="fa fa-list fs-20 text-secondary"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">19</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                            class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar">
                        </div>
                    </div>
                    <div class="expansion-label d-flex">
                        <span class="text-muted">Last Month</span>
                        <span class="ms-auto"><i class="fa fa-caret-down me-1 text-danger"></i>0.43%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Total Enquiry</p>
                        <div class="ms-auto">
                            <i class="fa fa-users fs-20 text-success"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">234</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                            class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex text-muted">
                        <span class="text-muted">Last Month</span>
                        <span class="ms-auto"><i class="fa fa-caret-down me-1 text-danger"></i>1.44%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Other</p>
                        <div class="ms-auto">
                            <i class="fa fa-signal fs-20 text-info"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">89</h3>
                    </div>
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                            class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex text-muted">
                        <span class="text-muted">Last Month</span>
                        <span class="ms-auto"><i class="fa fa-caret-up me-1 text-success"></i>0.9%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row sidemenu-height">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    {{ translate('Dashboard Content Here') }}
                </div>
            </div>
        </div>
    </div>
@endsection