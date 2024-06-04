<!DOCTYPE html>
<html lang="en">

<head>

   @extends('header')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div class="modal fade" id="addEntryModal" tabindex="-1">
        <div class="modal-dialog" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px;">

            <div class="form-group">
                @csrf
                <label for="customerName">Customer</label>
                <input type="text" class="form-control" id="customerName" placeholder="Enter Customer Name">

                <label for="driverName">Driver Name</label>
                <input type="text" class="form-control" id="driverName" placeholder="Enter Driver Name">

                <label for="weigher">Weigher</label>
                <input type="text" class="form-control" id="weigher" placeholder="Enter Driver Name">

                <label for="gross">Gross</label>
                <input type="number" class="form-control" id="gross" placeholder="Total Gross">

                <label for="plateNumber">Place Number</label>
                <input type="text" class="form-control" id="plateNumber" placeholder="Enter Plate Number">

                <label for="plateNumber">Weigh In</label>
                <input type="number" class="form-control" id="weighIn" placeholder="Enter Weigh In">
            </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal">Close</button>
                <button type="button" class="btn btn-primary" id="submitBtn">SUBMIT</button>
            </div>
            </div>
        </div>
    </div>

    <div id="wrapper">
        @include('sidebar')
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" id="addEntry" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
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
                                <thead>
                                    <tr>
                                        <th>Date Transaction</th>
                                        <th>Customer</th>
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
                        <span>Copyright &copy; Your Website 2021</span>
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
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

<!-- DataTables Buttons extension -->
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script> -->
<script>

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
            $('#addEntryModal').modal('hide');
            $.ajax({
                type: "POST",
                url: "{{ route('postTransact') }}",
                data : {
                    _token: "{{ csrf_token() }}",
                    customer : $('#customerName').val(),
                    driver : $('#driverName').val(),
                    weigher : $('#weigher').val(),
                    gross : $('#gross').val(),
                    plate_number : $('#plateNumber').val(),
                    weigh_in : $('#weighIn').val(),
                    transaction_id : 0,
                    driver_id : 0,
                    customer_id : 0,
                    
                },
                success : function (response) {
                    console.log(response); 
                    AutoReload();
                },
                error : function(error) {
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
                        targets: [5, 6, 7] 
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
                    'length',
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        },
                        className: 'btn btn-primary',
                    },  
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4] // Set columns 0, 2, and 3 for export
                        },
                        className: 'btn btn-danger',
                    },  
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4] 
                        },
                        className: 'btn btn-warning',
                    },  
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4] 
                        },
                        className: 'btn btn-success',
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
                    { data: 'date', name: 'date' },
                    { data: 'customer', name: 'customer' },
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
    })

</script>

</html>
