<div class="box-footer clearfix">
    <div class="pull-left">
        <div class="btn-group">
            <a href="{{ $moduleAdmin->currentUrl('create') }}" class="btn btn-success" type="button">
                <i class="fa fa-file-o"></i>
                Add Page
            </a>
            <button data-toggle="dropdown" class="btn btn-success dropdown-toggle" type="button" aria-expanded="true">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul role="menu" class="dropdown-menu">
                <li>
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i>
                        Add News Article
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-photo"></i>
                        Add Gallery
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-map"></i>
                        Add Map
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        Add Shop
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @if (false && $pages->hasPages())
        <div class="pull-right" style="margin-top: -20px; margin-bottom: -20px;">
            {!! $pages->render() !!}
        </div>
    @endif
</div>