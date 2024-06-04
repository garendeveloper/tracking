<!DOCTYPE html>
<html lang="en">

<head>

   @extends('header')
   <style>
    .styleFonts{
        font-family: 'Century Gothic', sans-serif;
    }

   </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div class="modal fade" id="addEntryModal" tabindex="-1">
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD TRANSACTION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: auto;">

            <form class="formData">
                @csrf
                <input type="hidden" id = "customer_id" value = "0">
                <input type="hidden" id = "driver_id" value = "0">
                <input type="hidden" id = "weigher_id" value = "0">
                <input type="hidden" id = "transaction_id" value = "0">
               
                <label for="plateNumber"  class="styleFonts">Weigh In</label>
                <input type="number" class="form-control styleFonts" id="weighIn" autocomplete="off" placeholder="Enter Weigh In"  required>

                <label for="plateNumber"  class="styleFonts">Place Number</label>
                <input type="text" class="form-control styleFonts" id="plateNumber" autocomplete="off" placeholder="Enter Plate Number"  required>

                <label for="customerName" class="styleFonts">Customer</label>
                <input type="text" class="form-control styleFonts" id="customerName" autocomplete="off" placeholder="Enter Customer Name" required>

                <label for="item">Item</label>
                <input type="text" class="form-control" id="item" autocomplete="off" placeholder="What Item">

                <label for="driverName" class="styleFonts">Driver Name</label>
                <input type="text" class="form-control styleFonts" id="driverName" autocomplete="off" placeholder="Enter Driver Name"  required>

                <label for="weigher" class="styleFonts">Weigher</label>
                <input type="text" class="form-control styleFonts" id="weigher" autocomplete="off" placeholder="Enter Weigher Name" required>

                <label for="weigher" class="styleFonts">Date</label>
                <input type="date" class="form-control styleFonts" id="date" autocomplete="off" required>
                
                <label for="weigher" class="styleFonts">Time</label>
                <input type="time" class="form-control styleFonts" id="time" autocomplete="off" required>

                <label for="gross" class="styleFonts">Gross</label>
                <input type="number" class="form-control styleFonts" id="gross" autocomplete="off" placeholder="Total Gross"  required>     
            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal">Close</button>
                <button type="button" class="btn btn-success" id="submitBtn">SAVE & PRINT</button>
            </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="companyModal" tabindex="-1">
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD COMPANY NAME</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: auto;">

            <form class="companyData">
                @csrf
                <input type ="hidden" id = "company_id" value = "0">
                <label for="customerName">Company Name</label>
                <input type="text" class="form-control" id="company_name" autocomplete="off" placeholder="Company name">

                <label for="item">Address</label>
                <input type="text" class="form-control" id="address" autocomplete="off" placeholder="Comopany address">

            </form>
               
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModal">CLOSE</button>
                    <button type="button" class="btn btn-primary" id="saveCompany">SAVE CHANGES</button>
                </div>
            </div>
        </div>
    </div>

    <div id="wrapper">
        {{-- @include('sidebar') --}}
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>


                                <a class="dropdown-item" onclick="setCompanyName()">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>


                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
                        <a href="#" id="addEntry" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> ADD TRANSACTION</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL CUSTOMERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard_data['total_customers'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                TOTAL DRIVERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard_data['total_drivers'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL WEIGHER
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dashboard_data['total_weigher'] }}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="{{ $dashboard_data['total_weigher'] }}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fas fa-balance-scale fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                TOTAL TRANSACTIONS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dashboard_data['total_transactions'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->


                    <!-- Content Row -->
                   <div class="card">
                        <div class="card-header">
                           
                        </div>
                        <div class="card-body">
                        <div id="export_buttons">

</div>
                        <table id="tbl_transactions" class="display" style="width:100%">
                                <thead >
                                    <tr>
                                        <th>Date Transaction</th>
                                        <th>Customer</th>
                                        <th>Item</th>
                                        <th>Driver</th>
                                        <th>Plate Number</th>
                                        <th>Weigher</th>
                                        <th>Weigh In</th>
                                        <th>Gross</th>
                                        <th>Action</th>
                                        <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                            </table>
                        </div>
                   </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://www.facebook.com/TinkerProHQ/" target="_blank">TinkerPro 2024</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>
@include('ft_scripts')



<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

<!-- DataTables Buttons extension -->
<script src="{{ asset('assets/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/datatables/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/datatables/dataTables1.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/datatables/buttons1.print.min.js') }}"></script>
<!-- <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script> -->
<script>

    function setCompanyName() {
        $('#companyModal').modal('show')

        $.ajax({
            type: "GET",
            url: "{{ route('getCompany') }}",
            success : function(res) {
               if(res.success) {
                $('#company_name').val(res.data.company_name);
                $('#address').val(res.data.address);   
                $('#company_id').val(res.data.id);      
               } 

               $('#saveCompany').off('click').on('click', function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('saveCompany') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            company_id: $("#company_id").val(),
                            company_name: $('#company_name').val(),
                            address: $('#address').val(),
                        },
                        success: function(response) {
                            console.log('Success:', response);
                            $('#companyModal').modal('hide')
                        },
                        error: function(error) {
                            console.log('Error:', error);
                        }
                    });
                });
            },
            error : function() {
                console.log(error);
            }
        });


       

    }


    $(document).ready(function() {



     
        $('#addEntry').off('click').on('click', function() {
            $('#addEntryModal').modal({
                backdrop : 'static',
                keyboard : false,
            });
            $('#closeModal').click(function() {
                $('#addEntryModal').modal('hide');
            })
        })
        $('#submitBtn').off('click').on('click', function() {
            var timeFormat = $("#time").val();
            var dateFormat = $("#date").val();

            var formattedTime = new Date("1970-01-01T" + timeFormat + "Z").toLocaleTimeString([], { hour: 'numeric', minute: '2-digit', hour12: true });

            var date = new Date(dateFormat); 
            var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Get month (adding 1 since January is 0) 
            var day = date.getDate().toString().padStart(2, '0'); // Get day 
            var year = date.getFullYear().toString().slice(-2); // Get last two digits of year 
            var formattedDate = month + '/' + day + '/' + year; console.log(formattedDate); // Output will be like "05/27/24"


            var dateAndTime =  formattedTime + ' ' + formattedDate
           
            $('#addEntryModal').modal('hide');
            $.ajax({
                type: "POST",
                url: "{{ route('postTransact') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    customer: $('#customerName').val(),
                    item: $('#item').val(),
                    driver: $('#driverName').val(),
                    weigher: $('#weigher').val(),
                    gross: $('#gross').val(),
                    plate_number: $('#plateNumber').val(),
                    weigh_in: $('#weighIn').val(),
                    transaction_id: $("#transaction_id").val(),
                    driver_id: $("#driver_id").val(),
                    customer_id : $("#customer_id").val(),
                    customer_id: $("#weigher_id").val(),
                    date: $("#date").val(),
                    time: $("#time").val(),
                    
                },
                success: function(response) {
                    // AutoReload();
                    var customer = $('#customerName').val();
                    var driver = $('#driverName').val();
                    var weigher = $('#weigher').val();
                    var gross = $('#gross').val();
                    var plateNum = $('#plateNumber').val();
                    var weightIn = $('#weighIn').val();
                    var item = $('#item').val();

                    var currentDate = new Date();
                    var options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour12: true,
                        hour: 'numeric',
                        minute: 'numeric',
                        second: 'numeric',
                        timeZone: 'Asia/Manila' 
                    };

                    var formattedDateTime = currentDate.toLocaleString('en-US', options);
                    $.ajax({
                        type: "GET",
                        url: "{{ route('getCompany') }}",
                        success : function(res) {
                           
                            var printWindow = window.open('', '', 'height=400,width=600');
                            var escpCommands = '\x1B\x6B\x01'; 
                            var escpEnd = '\x0C';            

                            printWindow.document.write('<html><head><title>Print Data</title>');
                            printWindow.document.write('<style>');
                            printWindow.document.write('body { font-family: "Epson2"; font-size: 8pt;line-height: 1; font-weight: 1;}');
                            printWindow.document.write('h2 { font-family: "Epson2"; font-size: 14pt; font-weight: bold; }');
                            printWindow.document.write('p { font-family: "Epson2"; font-size: 12pt; margin: 0;}');
                            printWindow.document.write('</style>');
                            printWindow.document.write('</head><body>');
                            // printWindow.document.write('<pre>');  
                            // printWindow.document.write(escpCommands); 
                            printWindow.document.write('<p>' + res.data.company_name + '</p>')
                            printWindow.document.write('<p>' + res.data.address + '</p> <br>')
                           
                           
                            printWindow.document.write('<p>Weigh-In: ' + weightIn + '</p>');
                            printWindow.document.write('<p style="text-transform: uppercase">Plate<span style="font-size: 20px">#</span>: ' + plateNum + '</p>');
                            printWindow.document.write('<p style="text-transform: uppercase">Customer: ' + customer + '</p>');
                            printWindow.document.write('<p style="text-transform: uppercase">Item: ' + item + '</p>');
                            printWindow.document.write('<p style="text-transform: uppercase">Driver: ' + driver + '</p>');
                            printWindow.document.write('<p style="text-transform: uppercase">Weigher: ' + weigher + '</p>');
                            printWindow.document.write('<p style="text-transform: lowercase">' + dateAndTime + '</p>');
                            printWindow.document.write('<p><span style="text-transform: uppercase">Gross/TARE: </span>' + (' ' + gross + ' kg') + '</p>');
                            // printWindow.document.write(escpEnd);  // Insert form feed at the end
                            // printWindow.document.write('</pre>');
                            printWindow.document.write('</body></html>');
                            printWindow.document.close();
                            printWindow.print();
                        
                        },
                        error : function() {
                            console.log(error);
                        }
                    });
                    $('.formData')[0].reset();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        show_datatable();
        function show_datatable()
        {
            
            $('#tbl_transactions').DataTable({
                ajax: {
                    type: 'get',
                    url: '{{ route("get_transactions") }}',
                    dataType: 'json',
                },
                serverSide: true,
                processing: true,
                order: [[0, "desc"]],
                columnDefs: [
                    {
                        className: "text-center", 
                        targets: [6, 7, 8] 
                    },
                    {
                        "targets": 0,
                        "render": function(data, type, row, meta) {
                            var dateStr = data;
                            var dateObj = new Date(dateStr);
                            
                            var options = { year: 'numeric', month: 'long', day: 'numeric' };
                            var formattedDate = dateObj.toLocaleDateString('en-US', options);
                            return formattedDate;
                        }
                    }
                ],
                dom: 'lBftrip',
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5 ,6, 7] // Set columns 0, 2, and 3 for export
                        },
                        className: 'btn btn-danger',
                    },  
                ],
                responsive: true,
        //         initComplete: function () {
        //     this.api().buttons().container().appendTo('#export_buttons');
        // }
                initComplete: function () {
                    this.api().buttons().container().appendTo('#export_buttons');
                },
                columns: [
                    { data: 'date_transact', name: 'date_transact' },
                    { data: 'customer', name: 'customer' },
                    { data: 'item', name: 'item' },
                    { data: 'driver', name: 'driver' },
                    { data: 'plate_number', name: 'plate_number' },
                    { data: 'weigher', name: 'weigher' },
                    { data: 'weigh_in', name: 'weigh_in' },
                    { data: 'gross', name: 'gross' },
                    { data: 'action', name: 'action'},
                ]
            });
        }

        function RefreshTable(tableId, urlData) {
            $.getJSON(urlData)
                .done(function(json) {
                    var table = $(tableId).DataTable(); 
                    var oSettings = table.settings()[0];

                    table.clear().draw();

                    if (json && json.data && json.data.length > 0) {
                        table.rows.add(json.data).draw(); 
                    }
                })
                .fail(function(jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.error("Request Failed: " + err);
                });
        }

        function AutoReload() {
            RefreshTable('#tbl_transactions', '{{ route("get_transactions") }}');
        }

        $("#tbl_transactions tbody").on("click", '#btn_edit', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                url: '{{ route("transaction.show") }}',
                data: {
                    id: id,
                },
                success: function(response)
                {
                    $("#addEntryModal").find(".modal-title").text("Edit Transaction")
                    $("#transaction_id").val(id);
                    $("#customer_id").val(response[0].customer_id);
                    $("#driver_id").val(response[0].driver_id);
                    $("#weigher_id").val(response[0].weigher_id);
                    $("#customerName").val(response[0].customer);
                    $("#driverName").val(response[0].driver);
                    $("#weigher").val(response[0].weigher);
                    $("#gross").val(response[0].gross);
                    $("#plateNumber").val(response[0].plate_number);
                    $("#weighIn").val(response[0].weigh_in);
                    $("#item").val(response[0].item);
                    $("#date").val(response[0].date_transact);
                    $("#time").val(response[0].time);
                    $("#addEntryModal").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    AutoReload();
                },
            })
        })
    })

</script>

</html>
