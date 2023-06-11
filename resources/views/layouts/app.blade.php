<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        rel="shortcut icon"
        href="{{asset('assets/backend/images/np.png')}}"
        type="image/x-icon"
    />
    <title>{{config('app.name')}}</title>
    @livewireStyles
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/lineicons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/materialdesignicons.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/fullcalendar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/fullcalendar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/main.css')}}"/>
    {{-- summernote text editor css --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/backend/css/sweetalert2.min.css')}}">

    <!-- Nepali Date Picker Css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/nepali.datepicker.v3.7.min.css')}}">
    @stack('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0-1/css/all.min.css" integrity="sha512-xEGx3E22YcUzfX525T3KV7SqNexb09E2CckB6lBB/dT930VlbSX9JnQlLiogtSLAl9yGAJGKDu7O1ZanrqljGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

@include('backend.partials.sidebar')
<div class="overlay"></div>

<main class="main-wrapper">

@include('backend.partials.header')

    <section class="section">
        <div class="container-fluid">
            @yield('content')
        </div>

    </section>

@include('backend.partials.footer')

</main>

<!-- ========= All Javascript files linkup ======== -->
<script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backend/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/backend/js/dynamic-pie-chart.js')}}"></script>
<script src="{{asset('assets/backend/js/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/js/fullcalendar.js')}}"></script>
<script src="{{asset('assets/backend/js/jvectormap.min.js')}}"></script>
<script src="{{asset('assets/backend/js/world-merc.js')}}"></script>
<script src="{{asset('assets/backend/js/polyfill.js')}}"></script>
<script src="{{asset('assets/backend/js/main.js')}}"></script>
<script src="{{asset('assets/backend/js/sweetalert2.min.js')}}"></script>

@include('sweetalert::alert')

@stack('modals')
@stack('script')

<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();

        swal.fire({

            title: "Are You Sure to Delete ? ",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: 'red',
            confirmButtonText: "Delete",
            dangerMode: true,

        })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    form.submit();
                }
            });
    });
</script>

@livewireScripts

</body>
</html>
