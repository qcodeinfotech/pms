@aware(['component'])
@props(['rows'])

@if ($component->hasConfigurableAreaFor('before-pagination'))
    @include(
        $component->getConfigurableAreaFor('before-pagination'),
        $component->getParametersForConfigurableArea('before-pagination'))
@endif

@if ($component->isBootstrap4())
    <div>
        @if ($component->paginationVisibilityIsEnabled())
            @if ($component->paginationIsEnabled() && $component->isPaginationMethod('standard') && $rows->lastPage() > 1)
                <div class="row mt-3">
                    <div class="col-12 col-md-6 text-center text-md-left text-muted d-flex ">
                        @if ($component->paginationIsEnabled() && $component->perPageVisibilityIsEnabled())
                            <x-livewire-tables::tools.toolbar.items.pagination-dropdown />
                        @endif
                        <div clas="align-items-center" style="padding:10px">
                            @if ($component->showPaginationDetails())
                                <span>@lang('Showing')</span>
                                <strong>{{ $rows->count() ? $rows->firstItem() : 0 }}</strong>
                                <span>@lang('to')</span>
                                <strong>{{ $rows->count() ? $rows->lastItem() : 0 }}</strong>
                                <span>@lang('of')</span>
                                <strong><span x-text="paginationTotalItemCount"></span></strong>
                                <span>@lang('results')</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md-6 overflow-auto">
                        {{ $rows->links('livewire-tables::specific.bootstrap-4.pagination') }}
                    </div>
                </div>
            @elseif ($component->paginationIsEnabled() && $component->isPaginationMethod('simple'))
                <div class="row mt-3">
                    <div class="col-12 col-md-6 overflow-auto">
                        {{ $rows->links('livewire-tables::specific.bootstrap-4.simple-pagination') }}
                    </div>

                    <div class="col-12 col-md-6 text-center text-md-right text-muted">
                        @if ($component->showPaginationDetails())
                            <span>@lang('Showing')</span>
                            <strong>{{ $rows->count() ? $rows->firstItem() : 0 }}</strong>
                            <span>@lang('to')</span>
                            <strong>{{ $rows->count() ? $rows->lastItem() : 0 }}</strong>
                        @endif
                    </div>
                </div>
            @elseif ($component->paginationIsEnabled() && $component->isPaginationMethod('cursor'))
                <div class="row mt-3">
                    <div class="col-12 col-md-6 overflow-auto">
                        {{ $rows->links('livewire-tables::specific.bootstrap-4.simple-pagination') }}
                    </div>
                </div>
            @else
                <div class="row mt-3">
                    <div class="col-12 text-muted">
                        @lang('Showing')
                        <strong>{{ $rows->count() }}</strong>
                        @lang('results')
                    </div>
                </div>
            @endif
        @endif
    </div>
@endif

@if ($component->hasConfigurableAreaFor('after-pagination'))
    @include(
        $component->getConfigurableAreaFor('after-pagination'),
        $component->getParametersForConfigurableArea('after-pagination'))
@endif
