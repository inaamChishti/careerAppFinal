@extends('layouts.admin')

@section('content')

    <head>
        <title>DataTables Example</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <style>
        /* Custom styles for the table */
        #example_wrapper {
            width: 80%;
            /* Set the desired width for the entire DataTable wrapper */
            margin: auto;
            /* Center the table */
        }

        #example_filter input,
        #example_length select {
            width: 150px;
            /* Set the desired width for the search input and page length select */
            display: inline-block;
            /* Maintain inline display for proper alignment */
        }

        #example thead th {
            background-color: #D361B3;
            color: black;
            padding: 10px;
        }

        #example tbody td {
            background-color: #fff;
            color: #333;
            padding: 10px;
        }

        #example tbody tr:hover {
            background-color: #f8f8f8;
        }

        /* Interactive heading styles */
        .interactive-heading {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin-right: 20px;
        }

        .interactive-heading::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #007bff;
            transform: scaleX(0);
            transition: transform 0.3s ease-in-out;
        }

        .interactive-heading:hover::after {
            transform: scaleX(1);
        }

        .heading-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .interactive-heading {
            display: inline-block;
            cursor: pointer;
            margin-right: 20px;
        }
    </style>

    <div class="container">

        <div class="row justify-content-center">


            <!-- Your table code -->
            @if (session('success'))
                <!-- Success message -->
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <div class="heading-container">
                <h3 class="interactive-heading">List Requests</h3>
            </div>
            <div class="table-responsive">


                <table id="example" class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Is Submit</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $user)
                            {{-- {{dd($$user)}} --}}
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_submit == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <select class="form-control action-dropdown" data-user-id="{{ $user->id }}">
                                        <option value=""
                                            {{ $user->application_status !== 1 && $user->application_status !== 0 ? 'selected' : '' }}
                                            disabled>choose status</option>
                                        <option value="accept" {{ $user->application_status === 1 ? 'selected' : '' }}>
                                            Accept</option>
                                        <option value="reject" {{ $user->application_status === 0 ? 'selected' : '' }}>
                                            Reject</option>
                                    </select>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            // Function to show Swal loader
            function showLoader() {
                Swal.fire({
                    title: 'Please wait...',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                    showConfirmButton: false, // Hide the "OK" button
                    showCancelButton: false, // Hide the "Cancel" button
                });
            }

            // Function to hide Swal loader
            function hideLoader() {
                Swal.close();
            }

            // Add change event listener to action-dropdown
            $('.action-dropdown').change(function() {
                // Show Swal loader when making the AJAX request
                showLoader();

                // Get the selected value and user_id from the data attribute
                var selectedAction = $(this).val();
                var userId = $(this).data('user-id');

                // Get CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Use jQuery AJAX to submit the form data
                $.ajax({
                    url: '{{ url('execute-application') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        user_id: userId,
                        action: selectedAction
                    },
                    success: function(response) {
                        // Hide Swal loader when AJAX request is complete
                        hideLoader();

                        // Display success message using SweetAlert without any buttons
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Application Status Changed',
                            showConfirmButton: false,
                            showCancelButton: false,
                        });

                        // Automatically close the success Swal after 500 milliseconds (half a second)
                        setTimeout(function() {
                            Swal.close();
                        }, 800);
                    },

                    error: function(error) {
                        // Hide Swal loader when AJAX request is complete
                        hideLoader();

                        // Display error message using SweetAlert without any buttons
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error submitting form',
                            showConfirmButton: false,
                            showCancelButton: false,
                        });
                    }
                });
            });
        });
    </script>
@endsection
