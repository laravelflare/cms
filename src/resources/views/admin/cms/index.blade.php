@extends('flare::admin.sections.wrapper')
@section('page_title', 'Pages')
@section('content')

    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="btn-group">
                            <a href="{{ $moduleAdmin->currentUrl() }}" class="btn btn-default btn-flat">
                                All Pages
                                <span class="badge bg-green" style="margin-left: 15px">

                                </span>
                            </a>
                            <button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul role="menu" class="dropdown-menu">
                                <li>
                                    <a href="{{ $moduleAdmin->currentUrl('all') }}">
                                        With Trashed
                                        <span class="badge bg-yellow">

                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $moduleAdmin->currentUrl('trashed') }}">
                                        Trashed Only
                                        <span class="badge bg-red">

                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    @include('flare::admin.pages.includes.page-list')
                    
                    @include('flare::admin.pages.includes.page-list-footer')
                </div>
            </div>
        </div>
    </div>

@stop
