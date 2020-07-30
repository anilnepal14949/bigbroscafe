<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('logoico.png') }}" rel="icon">
    <title>BigBro's Admin</title>
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .popover-inner .popover-content {
            color: red !important;
            /* font-size: 10px; */
        }

        .collapse-item.router-link-exact-active {
            background: rgba(0, 0, 0, 0.2) !important;
        }
    </style>

    <script>
        window._asset = "{{ asset('') }}";
        window.Laravel = <?php
                            echo json_encode([
                                'csrfToken' => csrf_token(),
                            ]); ?>
    </script>
    @notifyCss
</head>

<body id="page-top">
    <div id="app">
        <div id="wrapper">
            <sidebar></sidebar>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <navbar></navbar>
                    <!-- <h1>Hello</h1> -->
                    <admin></admin>
                    <!-- <router-link to="/backend"> Go to backend </router-link> -->
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script> -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/ruang-admin.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        // $(function () {
        //     $('[data-toggle="tooltip"]').tooltip()
        // });
        $(document).ready(function() {
            $('#summernote').summernote();
        });

        function confirmDelete() {
            return confirm("Are you sure you want to delete?");
        }
    </script>

    @include('notify::messages')
    @notifyJs
    @yield('footerContent')
</body>

</html>
