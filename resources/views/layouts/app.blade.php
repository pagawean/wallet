    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>BALCONY</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="{{ @$description }}" name="description" />
        <meta content="{{ @$author }}" name="author" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/css/backend.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link href="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="{{ url('images/public/pavicon.png') }}" />
    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            @include('layouts.header')
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                @include('layouts.side')
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        @include('layouts.breadcrump')
                        @include('layouts.error')
                        @include('toast::messages')
                        @yield('content')
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            @include('layouts.footer')
        </div>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script> -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- <script src="{{ url('/metronic/theme') }}/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script> -->
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
      
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="{{ url('/metronic/theme') }}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="{{ url('') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script src="{{ url('') }}/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
        <script>
        </script>
        <script>
          var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
          };
           $('.content').ckeditor(options);
        </script>
       
        <script>
            $('select').select2();
            function getProvince(countryID) {
                if (countryID) {
                    $.ajax({
                        type: "GET",
                        url: "{{url('admin/get-province-list')}}?country_id=" + countryID,
                        success: function (res) {
                            if (res) {
                                $("#province").empty();
                                $("#province").append('<option>- Pilih Provinsi -</option>');
                                $.each(res, function (key, value) {
                                    $("#province").append('<option value="' + key + '">' + value + '</option>');
                                });
                            } else {
                                $("#province").empty();
                            }
                            $("#province").val($("#province").data("id"));
                            getCity($("#province").data("id"));
                            $('#province').trigger("change");
                        }
                    });
                } else {
                    $("#province").empty();
                }
            }

            function getCity(provinceID){
                if (provinceID) {
                        $.ajax({
                            type: "GET",
                            url: "{{url('admin/get-city-list')}}?province_id=" + provinceID,
                            success: function (res) {
                                if (res) {
                                    $("#city").empty();
                                    $("#city").append('<option>- Pilih Kota -</option>');
                                    $.each(res, function (key, value) {
                                        $("#city").append('<option value="' + key + '">' + value + '</option>');
                                    });
                
                                } else {
                                    $("#city").empty();
                                }
                                $("#city option[value='"+$("#city").data("id")+"']").prop("selected", true);
                                @stack('city')
                                $('#city').change();
                            }
                        });
                    } else {
                        $("#city").empty();
                    }
            }
            
            $(document).ready(function()
            {
                $('#country').change(function () {
                    var countryID = $(this).val();
                    getProvince(countryID);
                });
                $('#country').trigger("change");
                $('#province').change(function () {
                    var provinceID = $(this).val();
                    getCity(provinceID);
                });

                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });

                

                @if(!empty($columns))
                $('#datatable tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                } );
                var table = $('#datatable').DataTable({
                    processing: true,
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ],
                    serverSide: true,
                    ajax: '{{ url()->current() }}',
                    columns: {!! General::columnDatatable($columns) !!}
                });
                // Apply the search
                table.columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
                @endif
                $('[data-toggle="tooltip"]').tooltip(); 
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            })
                 
        </script>

        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        @if(!empty($validator))
        {!! $validator->render() !!}
        @endif
        @yield('js')
    </body>

</html>
