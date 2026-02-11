<x-admin-app-layout :title="'Apply Post'">

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Configure Toastr
        toastr.options = {
            "closeButton": true, // Add a close button
            "debug": false,
            "newestOnTop": false,
            "progressBar": true, // Show a progress bar
            "positionClass": "toast-top-right", // Position of the toast
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300", // Show duration in milliseconds
            "hideDuration": "1000", // Hide duration in milliseconds
            "timeOut": "5000", // Time to show the notification (5000ms = 5 seconds)
            "extendedTimeOut": "1000", // Time to extend the notification on hover
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>


    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        /* The slider before it is checked */
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        /* Change background color when checked */
        input:checked+.slider {
            background-color: #49c464;
            /* Green color for active */
        }

        /* Move the slider handle when checked */
        input:checked+.slider:before {
            transform: translateX(26px);
        }

        /* When the switch is inactive (danger color) */
        input:not(:checked)+.slider {
            background-color: #f44336;
            /* Red color for inactive */
        }

        /* Rounded slider */
        .slider.round {
            border-radius: 34px;
        }

        /* Rounded slider handle */
        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <div class="card card-flash">
        <div class="card-header mt-6">
            <div class="card-title"></div>
            <div class="card-toolbar">

                {{-- <a href="{{ route('admin.banner.create') }}" class="btn btn-light-primary">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span>
                    Add Banner
                </a> --}}

            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead class="bg-dark text-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="5%">Rank Name</th>
                        <th width="10%">Name</th>
                        <th width="10%">Email</th>
                        <th width="10%">Phone</th>
                        <th width="10%">Passport Number</th>
                        <th width="10%">Nationality</th>
                        <th width="10%">CV</th>
                        <th width="5%">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">

                    @foreach ($items as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>
                                {{-- <h6>{{ $item->jobName->rank }}</h6> --}}
                                @if ($item->job_id == null)
                                    <span class="text-danger">No Rank</span>
                                @else
                                    {{ optional($item->jobName)->rank }}
                                @endif
                            </td>

                            <td>
                                <h6>{{ $item->name }}</h6>
                            </td>

                            <td>
                                <h6>{{ $item->email }}</h6>
                            </td>

                            <td>
                                <h6>{{ $item->phone }}</h6>
                            </td>
                            <td>
                                <h6>{{ $item->passport_number }}</h6>
                            </td>

                            <td>
                                <h6>{{ $item->nationality }}</h6>
                            </td>

                            <td>
                                @if ($item->attachment == null)
                                    <p>No File</p>
                                @else
                                    <a href="{{ route('download.attachment', $item->id) }}" class="text-danger">Download
                                        CV</a>
                                @endif
                            </td>

                            @if (Auth::guard('admin')->user()->can('delete.job_apply'))
                                <td>

                                    <form action="{{ route('admin.apply.post.delete', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=""
                                            style="border: none; background: none; cursor: pointer;">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                        </button>
                                    </form>

                                </td>
                            @endif



                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

    @push('scripts')
        <script>
            $("#kt_datatable_example_5").DataTable({
                "language": {
                    "lengthMenu": "Show _MENU_",
                },
                "dom": "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.status-toggle').change(function() {
                    var bannerId = $(this).data('id');
                    var newStatus = $(this).is(':checked') ? 'active' : 'inactive';

                    $.ajax({
                        url: '/admin/banner/status/' + bannerId,
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: newStatus
                        },
                        success: function(response) {
                            if (newStatus === 'active') {
                                toastr.success('Banner has been activated successfully.');
                            } else {
                                toastr.error('Banner has been deactivated successfully.');
                            }
                        },
                        error: function(xhr) {
                            toastr.warning('An error occurred while updating the status.');
                        }
                    });
                });
            });
        </script>
    @endpush

</x-admin-app-layout>
