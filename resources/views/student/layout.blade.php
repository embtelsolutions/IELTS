<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<title>{{$bs->website_title}}</title>
	<link rel="icon" href="{{asset('assets/front/img/'.$bs->favicon)}}">
	@includeif('admin.partials.styles')
    @php
        $selLang = \App\Language::where('code', request()->input('language'))->first();
    @endphp
    @if (!empty($selLang) && $selLang->rtl == 1)
    <style>
    #editModal form input,
    #editModal form textarea,
    #editModal form select {
        direction: rtl;
    }
    #editModal form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
    </style>
    @endif

    @yield('styles')

</head>
<body data-background-color="dark">
	<div class="">

    {{-- top navbar area start --}}
    @includeif('student.partials.top-navbar')
    {{-- top navbar area end --}}


    {{-- side navbar area start --}}
    @includeif('student.partials.side-navbar')
    {{-- side navbar area end --}}


		<div class="main-panel">
			<div class="content">
        <div class="page-inner">
          @yield('student-content')
        </div>
			</div>
      @includeif('student.partials.footer')
		</div>

	</div>

    <script>
        var imggur = "{{route('admin.imggur.upload')}}";
    </script>

	@includeif('admin.partials.scripts')

    {{-- Loader --}}
    <div class="request-loader">
        <img src="{{asset('assets/admin/img/loader.gif')}}" alt="">
    </div>
    {{-- Loader --}}
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vquery/5.0.1/v.min.js"></script>

</html>
