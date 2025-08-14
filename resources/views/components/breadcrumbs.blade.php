@yield('breadcrumbs')

@ifsectionempty('breadcrumbs')
    {{ Breadcrumbs::render( request()->route()->getName(),) }}
    @push('head')
        {{ Breadcrumbs::view('breadcrumbs::json-ld', request()->route()->getName(),) }}
    @endpush
@endifsectionempty
