@extends('admin.main-layout')
@section('header-links')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
@endsection


@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">User</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    @endsection

    @section('content')
        <div class="container-fluid">

            @if ($errors->any())

            <div class="alert alert-warning alert-dismissible fade show" role="alert"  >
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>


        @endif

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form method="POST" action="{{ route('update-agent',$agent->id) }}">
                        @csrf

                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- first-name --}}
                                <label>First name</label>
                                <input class="form-control" type="text" placeholder="" name="firstname" id="firstname" value="{{$agent->firstname}}" required>
                            </div>
                            <!-- /.form-group -->

                        </div>
                        <!-- /.col -->


                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- first-name --}}
                                <label>Last name</label>
                                <input class="form-control" type="text" placeholder="" name="lastname" id="lastname" value="{{$agent->lastname}}" required>
                            </div>



                        </div>
                        <!-- /.col -->


                        <div class="col-md-4">

                            <div class="form-group">
                                {{-- first-name --}}
                                <label>Username</label>
                                <input class="form-control" type="text" placeholder="" name="username" id="username" value="{{$agent->username}}" required>
                            </div>
                        </div>
                        <!-- /.col -->

                         </div>
                    <!-- /.row -->


                    <div class="row">


                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- first-name --}}
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="" name="email" value="{{$agent->email}}" id="email" required>
                            </div>
                            <!-- /.form-group -->

                        </div>
                        <!-- /.col -->


                        <div class="col-md-4">
                            <div class="form-group">
                                {{-- first-name --}}
                                <label>Phone number</label>
                                <input class="form-control" type="number" placeholder="" name="phonenumber" value="{{$agent->phonenumber}}" id="phonenumber" required>
                            </div>



                        </div>
                        <!-- /.col -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Assign Queue</label>
                                <select class="form-control select2" style="width: 100%;" name="queue" id="queue" required>
                                    @if ($queues != null)

                                    @foreach ($queues as $queue)

                                    <option value="{{$queue->id}}" {{$agent->queues->id == $queue->id  ? 'selected' : ''}} >{{$queue->name}}</option>

                                    @endforeach
                                    @else

                                    @endif

                                </select>
                            </div>
                        </div>




                    </div>
                    <!-- /.row -->




                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" style="width: 100%;" name="is_active" required>

                                  <option  value="0" {{$agent->is_active == 0  ? 'selected' : ''}}>Inactive</option>
                                  <option value="1" {{$agent->is_active == 1  ? 'selected' : ''}}>Active</option>

                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Assign Role</label>
                                <select class="form-control select2" style="width: 100%;" name="role" id="role" required>

                                    @if ($roles != null)
                                    @foreach ($roles as $roles)
                                    <option value="{{$roles->id}}" {{$agent->roles->first()->id == $roles['id']  ? 'selected' : ''}}>{{$roles->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->



                        <!-- /.col -->


                    </div>
                    <!-- /.row -->

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                    </form>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <!-- /.card -->




        </div>
    @endsection




    @section('javascript-links')
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Select2 -->
        <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
        <!-- InputMask -->
        <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- bootstrap color picker -->
        <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- BS-Stepper -->
        <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
        <!-- dropzonejs -->
        <script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
        <!-- Page specific script -->
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'L'
                });

                //Date and time picker
                $('#reservationdatetime').datetimepicker({
                    icons: {
                        time: 'far fa-clock'
                    }
                });

                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker({
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                                'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                            'MMMM D, YYYY'))
                    }
                )

                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                })
            })
            // BS-Stepper Init
            document.addEventListener('DOMContentLoaded', function() {
                window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                url: "/target-url", // Set the url
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function() {
                    myDropzone.enqueueFile(file)
                }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        </script>
    @endsection
