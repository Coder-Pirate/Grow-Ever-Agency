<!doctype html>
<html lang="en">
@php
    $siteinfo = App\Models\Siteinfo::find(1);
@endphp

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <link rel="icon" href="{{ asset($siteinfo->fabicon) }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}" />
    <!-- Toster CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Flora Editor CSS -->
    {{-- <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' /> --}}
    {{-- <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' /> --}}

        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <title>Grow Ever - Digital Agency</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('admin.body.header')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('admin')
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('admin.body.footer')
    </div>
    <!--end wrapper-->


    <!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search">
                        <span
                            class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <!-- end search modal -->




    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/chartjs/js/chart.js') }}"></script>
    <script src="{{ asset('backend/assets/js/index.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>
    <!--Tostet JS-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--Validition JS-->
    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>





    <!--Floara Editor-->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.6/js/froala_editor.pkgd.min.js"></script> --}}
    {{-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script> --}}

    {{-- <script>
        new FroalaEditor('#editor', {
            imageUploadURL: '{{ route('images.upload') }}',
            imageUploadParams: {
                _token: '{{ csrf_token() }}'
            },
            imageManagerLoadURL: '{{ route('images.load') }}',
            imageManagerDeleteURL: '{{ route('images.delete') }}',
            imageManagerDeleteMethod: 'POST',
            imageManagerDeleteParams: {
                _token: '{{ csrf_token() }}'
            },
            events: {
                'image.removed': function($img) {
                    var src = $img.attr('src');
                    $.ajax({
                        method: 'POST',
                        url: '{{ route('images.delete') }}',
                        data: {
                            src: src,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Image deleted');
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting image:', error);
                        }
                    });
                }
            }
        });
    </script> --}}


    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor-container', {
            modules: {
    toolbar: [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean'],                                         // remove formatting button

    ['link', 'image', 'video']   

    ],
  },
  placeholder: 'Compose an epic...',
  theme: 'snow', // or 'bubble'
            
            
        });

        document.getElementById('submit-button').addEventListener('click', function() {
            document.getElementById('content').value = quill.root.innerHTML;
        });

        // Image upload handler
    quill.getModule('toolbar').addHandler('image', function() {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = function() {
            var file = input.files[0];
            if (file) {
                var formData = new FormData();
                formData.append('image', file);

                fetch('{{ route('upload.image') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(result => {
                    if (result.url) {
                        var range = quill.getSelection();
                        quill.insertEmbed(range.index, 'image', result.url);
                    }
                });
            }
        };
    });

    // Image delete handler
    quill.root.addEventListener('click', function(event) {
        if (event.target.tagName === 'IMG') {
            var imageUrl = event.target.src;
            if (confirm('Are you sure you want to delete this image?')) {
                fetch('{{ route('delete.image') }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ path: imageUrl })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        event.target.remove();
                        console.log('Image deleted successfully');
                    } else {
                        console.error('Error deleting image:', result.error);
                    }
                });
            }
        }
    });
    </script>




    <!-- Add Sweetalert-->




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>






    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>


</body>

</html>
