                                 
	@include('layouts.header')


	@include('layouts.top-Header-menu')

	@include('layouts.search')
	@include('layouts.sidebar')


	<!--main-container-part-->
	@include('layouts.breadcrumbs')
	@yield('content')

	<!--end-main-container-part-->

	<!--Footer-part-->
	@include('layouts.developer_content')
	@stack('custom-scripts')
	@include('layouts.foter')
                               