@extends('users.layout')

@section('content')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <div>
        <header
            style="position: fixed; top: 0; left: 0; right: 0; background-color: #0d6efd; color: #fff; text-align: center; padding: 10px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <span style="font-size: 24px; font-weight: bold;">RD Management App</span>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('users.create') }}" class="btn btn-success">New Customer</a>
                        <a href="{{ route('export') }}" class="btn btn-info">Export File</a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="col" style="margin-top: 60px; text-align: center;">
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <img src="{{ asset('icon/post.png') }}" alt="Logo" width="100" height="75">
            <b><p>Welcome to Shivam Agency</p></b>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <div>
        <h3 style="color: #706e6e;">Upcoming Dates</h3>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#upcomingDates"
            aria-expanded="false" aria-controls="upcomingDates">
            Show Upcoming Dates
        </button>
        <div class="collapse" id="upcomingDates">
            <div id="reminder-scrollable" class="mb-3">
                <div id="reminder-container">
                    @foreach ($data as $da)
                        @php
                            $now = \Carbon\Carbon::now()->startOfDay();
                            $matuDate = \Carbon\Carbon::parse($da->matu_date);
                            $diff = $now->diffInDays($matuDate, false);

                            // Skip iteration if maturity date is in the past
                            if ($diff < 0) {
                                continue;
                            }

                            if ($diff < 6) {
                                $today = \Carbon\Carbon::now()->startOfDay();
                                $diff = $matuDate->diffInDays($today);
                                $isToday = $diff === 0;
                            } else {
                                continue; // Skip iteration if maturity date is more than 5 days away
                            }
                        @endphp

                        <div class="reminder {{ $isToday ? 'today' : 'upcoming' }}">
                            <div class="account-holder">
                                {{ $da->acc_holder_name_1 }}
                            </div>
                            <div class="maturity-date">
                                @if ($isToday)
                                    Maturity date is today!
                                @elseif ($diff === 1)
                                    Maturity date is tomorrow!
                                @else
                                    Maturity date is in {{ $diff }} days.
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('users.show', $da->id) }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="display nowrap" width="100%">
        <table id="user-table" class="table table-bordered table-striped">
            <!-- Table Header -->
            <thead style="background-color: #0d6efd; color: #fff;">
                <!-- Table Header Rows -->
                <tr>
                    <!-- Table Header Columns -->
                    <th>Serial No</th>
                    <th>Account No</th>
                    <th>First Account Holder Name</th>
                    <th>First Account Holder CIF</th>
                    <th>Second Account Holder Name</th>
                    <th>Second Account Holder CIF</th>
                    <th>Amount</th>
                    <th>Mobile No.</th>
                    <th style="width: 100px;">Open date Date</th>
                    <th style="width: 100px;">Maturity Date</th>
                    <th>Family Id</th>
                    <th>Payment Received By</th>
                    <th>Payment Date</th>
                    <th>Payment Type</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <!-- Iterate over each user -->
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->account_number }}</td>
                        <td class="acc-holder-name">{{ $user->acc_holder_name_1 }}</td>
                        <td>{{ $user->acc_holder_cif_1 }}</td>
                        <td>{{ $user->acc_holder_name_2 }}</td>
                        <td>{{ $user->acc_holder_cif_2 }}</td>
                        <td>{{ $user->amount }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->open_date }}</td>
                        <td class="matu-date">{{ $user->matu_date }}</td>
                        <td>{{ $user->family_id }}</td>
                        <td>{{ $user->payment_reciver_name }}</td>
                        <td>{{ $user->payment_date }}</td>
                        <td>{{ $user->payment_type }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <!-- Form for deletion -->
                            <form id="delete-form" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <!-- Show User Details Button -->
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-eye"></i></a>
                                <!-- Edit User Details Button -->
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <br>
                                <!-- CSRF Token -->
                                @csrf
                                <!-- HTTP Method Spoofing for DELETE Request -->
                                @method('DELETE')
                                <!-- Delete User Button -->
                                <button type="button" class="btn btn-danger btn-sm delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- Table Footer -->
            <tfoot>
                <!-- Table Footer Rows -->
                <tr>
                    <!-- Table Footer Columns -->
                    <th colspan="6"></th>
                    <th></th>
                    <th colspan="7"></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- jQuery -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('js/min.js') }}"></script> --}}

    <!-- Dropdown -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('js/dropdown.js') }}"></script>

    <!-- SweetAlert2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="{{ asset('js/swal.js') }}"></script>


    <!-- DataTables -->
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('js/datatable.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}
    <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- DataTables Buttons extension -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

    <!-- Script Section -->
    <script>
        // Wait for the DOM to be fully loaded
        $(document).ready(function() {
            // Initialize DataTable
            $('#user-table').DataTable({
                "dom": 'lBfrtip',
                "buttons": [{
                    "extend": 'excelHtml5',
                    "footer": true,
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                        "modifier": {
                            "page": 'current' // Export current page data
                        },
                        // Filter the data based on search input
                        "orthogonal": 'export'
                    }
                }],
                "order": [], // Disable initial sorting
                "pageLength": 5, // Number of rows per page
                "lengthMenu": [5, 10, 20, 50, 100, 200, 500, 1000], // Rows per page dropdown
                "language": {
                    "search": "Search: ",
                    "searchPlaceholder": "Search",
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [14] // Disable sorting on the action column
                }],
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    var totalAmount = api.column(6, {
                        page: 'current'
                    }).data().reduce(function(acc, val) {
                        return acc + parseFloat(val.replace(/[^\d.-]/g, ''));
                    }, 0);
                    $(api.column(6).footer()).html('<strong>Total ' + totalAmount.toFixed(2) +
                        '</strong>');
                }
            });
            // Add click event listener to the delete button
            $('.delete-btn').on('click', function() {
                // Display the SweetAlert confirm dialog
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    // If user confirms deletion
                    if (result.isConfirmed) {
                        // Submit the form
                        $('#delete-form').submit();
                    }
                });
            });
            // Display success message using SweetAlert if present in session
            @if (Session::has('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ Session::get('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
@endsection
