@extends('core/base::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="wordpress-connector">
                <h1 class="page-title">Woocommerce Connector</h1>

                <form method="POST" action="{{ route('wordpress-connector') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h6>{{ trans('plugins/wordpress-connector::wordpress-connector.options') }}</h6>
                             <a class="btn btn-warning" href="{{ route('wordpress-connector.syncproducts') }}">Export products</a>
                        </div>

                        <div class="col-md-6">
                            <h6>{{ trans('plugins/wordpress-connector::wordpress-connector.upload_xml') }}</h6>
                            <div class="form-group">
                                <label for="timeout" class="control-label" data-toggle="tooltip"
                                       title="{{ trans('plugins/wordpress-connector::wordpress-connector.timeout_description') }}"
                                       data-placement="right">{{ trans('plugins/wordpress-connector::wordpress-connector.max_timeout') }}</label>
                                <input type="text" name="timeout" class="form-control" value="900" id="timeout">
                            </div>

                            <div class="form-group">
                                <label for="wpexport" class="control-label required" data-toggle="tooltip"
                                       title="{{ trans('plugins/wordpress-connector::wordpress-connector.wp_xml_file_description') }}"
                                       data-placement="right">{{ trans('plugins/wordpress-connector::wordpress-connector.wp_xml_file') }}</label><br>
                                <input type="file" name="wpexport" id="wpexport">
                            </div>
                            <div class="form-group">
                                <div class="alert alert-success success-message hidden"></div>

                                <div class="alert alert-warning error-message hidden"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary import-wordpress-data">{{ trans('plugins/wordpress-connector::wordpress-connector.import') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
