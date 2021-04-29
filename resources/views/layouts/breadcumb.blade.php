<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">

            <div class="page-title-icon">
                <i class="{{$breadcumb['icon'] ?? 'pe-7s-refresh-2'}} icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>{{strtoupper($breadcumb['title']) ?? ''}}

                <div class="page-title-subheading">{{ucfirst($breadcumb['desc']) ?? ''}}
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            {{-- <button type="button" data-toggle="tooltip" title="Example Tooltip"
                data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button> --}}
            <div class="d-inline-block">
                @empty($breadcumb['create'])
                @else
                <a href="{{ route((strtolower($breadcumb["create"]) ?? '').'.create') }}">
                    <button type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow  btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-plus fa-w-20"></i>
                        </span>
                        Tambah {{(ucwords($breadcumb["create"]) ?? '')}}
                    </button>
                </a>
                @endempty
            </div>
        </div>
    </div>
</div>
