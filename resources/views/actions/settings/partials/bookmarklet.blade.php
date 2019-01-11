<div class="card">
    <div class="card-header">
        @lang('settings.bookmarklet')
    </div>
    <div class="card-body">

        <p>@lang('settings.bookmarklet_help')</p>

        <a href="{{ $bookmarklet_code }}" class="btn btn-primary">
            <i class="fa fa-bookmark fa-mr"></i> @lang('settings.bookmarklet')
        </a>

        <p class="small">@lang('settings.bookmarklet_button')</p>

    </div>
</div>
