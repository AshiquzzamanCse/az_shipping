<x-admin-app-layout :title="'Rating All'">

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        .custom-table th {
            background: #9DBDFF;
            color: #fff;
            padding: 10px;
        }

        .custom-table td {
            padding: 10px;
            border: 1px solid #dee2e6;
        }

        .custom-table tr:hover {
            background-color: #f1f1f1;
        }

        .custom-table {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .custom-table th {
            width: 35%;
        }

        .form-check-label {
            font-weight: bold;
            /* Make the label text bold */
            color: #333;
            /* Change label color */
        }

        .form-check-input:checked {
            background-color: #D92027;
            /* Customize checked background */
            border-color: #D92027;
            /* Customize border color when checked */
        }
    </style>

    <div class="card card-flash">
        <div class="card-header align-items-center mt-6">

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="shouldBeRed">
                <label class="form-check-label" for="shouldBeRed">
                    Expired Document
                </label>
            </div>

            <div class="form-check form-switch mb-3">

                <div class="d-flex align-items-center">
                    <input type="checkbox" id="deak" class="form-check-input" onchange="filterOfficers()">
                    <label for="deak" class="form-check-label me-3 ms-2">Deck Rating</label>

                    <input type="checkbox" id="engine" class="form-check-input ms-3" onchange="filterOfficers()">
                    <label for="engine" class="form-check-label ms-2">Engine Rating</label>

                    <input type="checkbox" id="salon" class="form-check-input ms-3" onchange="filterOfficers()">
                    <label for="salon" class="form-check-label ms-2">Saloon Rating</label>
                </div>

            </div>

            {{-- <div class="card-title"></div> --}}
            <div class="card-toolbar">

                <a href="{{ route('admin.rating.create') }}" class="btn btn-light-primary">
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
                    Create
                </a>

            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_datatable_example_5" class="table table-row-bordered gy-5 gs-7 border rounded">
                <thead class="bg-dark text-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="9%">Rating Type</th>
                        <th width="10%">Name</th>
                        <th width="10%">Rank</th>
                        <th width="10%">CDC NO</th>
                        <th width="8%">Joining/Discharge</th>
                        <th width="8%">End Of Contract</th>
                        <th width="10%">Contact</th>
                        <th width="10%">Status</th>
                        <th width="12%">Remarks</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">

                    @foreach ($items as $key => $item)
                        @php

                            $fieldsToCheck2 = [$item->end_of_contract];

                            $fieldsToCheck3 = [
                                $item->ship_cook,
                                $item->sid,
                                $item->ph,
                                $item->pst,
                                $item->fpff,
                                $item->efa,
                                $item->pssr,
                                $item->sat,
                                $item->dsd,
                                $item->pscrb,
                                $item->aff,
                                $item->nwr,
                                $item->rasd,
                                $item->ecdis,
                                $item->atoto,
                            ];

                            $fieldsToCheck6 = [$item->cdc, $item->passport];

                            $shouldBe2 = collect($fieldsToCheck2)->contains(function ($date) {
                                return $date &&
                                    \Carbon\Carbon::now()->greaterThanOrEqualTo(
                                        \Carbon\Carbon::parse($date)->subMonths(2),
                                    );
                            });

                            $shouldBe3 = collect($fieldsToCheck3)->contains(function ($date) {
                                return $date &&
                                    \Carbon\Carbon::now()->greaterThanOrEqualTo(
                                        \Carbon\Carbon::parse($date)->subMonths(3),
                                    );
                            });

                            $shouldBe6 = collect($fieldsToCheck6)->contains(function ($date) {
                                return $date &&
                                    \Carbon\Carbon::now()->greaterThanOrEqualTo(
                                        \Carbon\Carbon::parse($date)->subMonths(6),
                                    );
                            });

                            $shouldBeRed = $shouldBe2 || $shouldBe3 || $shouldBe6;

                            // $shouldBeRed = collect($fieldsToCheck)->contains(function ($date) {
                            //     return $date &&
                            //         \Carbon\Carbon::now()->greaterThanOrEqualTo(
                            //             \Carbon\Carbon::parse($date)->subMonths(3),
                            //         );
                            // });

                        @endphp

                        <tr class="staff-row {{ $shouldBeRed ? 'expired' : '' }} officer-row {{ $item->rating_type }}"
                            style="{{ $shouldBeRed ? 'background-color: #FF7777; color: white;' : '' }}">

                            <td>{{ $key + 1 }}</td>

                            <td>
                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">
                                    @if ($item->rating_type == 'deak')
                                        <span>Deck Rating</span>
                                    @elseif ($item->rating_type == 'engine')
                                        <span>Engine Rating</span>
                                    @elseif ($item->rating_type == 'salon')
                                        <span>Saloon Rating</span>
                                    @else
                                    @endif
                                </h6>
                            </td>

                            <td>
                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">{{ $item->name }}</h6>
                            </td>
                            <td>
                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">{{ $item->rank }}</h6>
                            </td>
                            <td>
                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">{{ $item->cdc_no }}</h6>
                            </td>

                            <td>
                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">
                                    @if ($item->discharge_date)
                                        {{ \Carbon\Carbon::parse($item->discharge_date)->format('F j, Y') }}
                                    @else
                                    @endif
                                </h6>
                            </td>
                            <td>


                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">

                                    @if ($item->end_of_contract)
                                        {{ \Carbon\Carbon::parse($item->end_of_contract)->format('F j, Y') }}
                                    @else
                                    @endif
                                </h6>

                            </td>


                            <td>
                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">{{ $item->contact }}</h6>
                            </td>

                            <td>
                                @if ($item->status == 'board')
                                    <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">On Board
                                        ({{ $item->ship_name }})
                                    </h6>
                                @elseif($item->status == 'leave')
                                    <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">On Leave
                                        ({{ $item->ship_name }})</h6>
                                @elseif($item->status == 'fleet')
                                    <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">Not in Fleet Yet</h6>
                                @endif
                            </td>

                            <td>
                                <h6 style="{{ $shouldBeRed ? 'color: white;' : '' }}">{{ $item->remarks }}</h6>
                            </td>

                            <td>

                                <a href="" data-bs-toggle="modal" data-bs-target="#showModal{{ $item->id }}"
                                    class="text-primary">
                                    <i class="fa-solid fa-eye text-success fs-5"></i>
                                </a>

                                <!-- showModal -->
                                <div class="modal fade" id="showModal{{ $item->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="showModalLabel"
                                    aria-hidden="true">

                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">

                                            <div class="modal-header bg-secondary">
                                                <h1 class="modal-title fs-3" id="staticBackdropLabel">Rating Details
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row">

                                                    <div
                                                        class="col-12 mb-3 d-flex justify-content-between align-items-center">
                                                        <h3 class="mb-0">Name: <span>{{ $item->name }}</span></h3>

                                                        <a href="{{ route('admin.rating.edit', $item->id) }}"
                                                            class="btn btn-light-primary">
                                                            <i class="fa-solid fa-pencil fs-5"></i>Edit
                                                        </a>

                                                    </div>


                                                    <div class="col-6">

                                                        <table
                                                            class="table table-striped table-hover table-row-bordered custom-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="fs-5">Rank</th>
                                                                    <td>{{ $item->rank }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">CDC NO</th>
                                                                    <td>{{ $item->cdc_no }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">Contact</th>
                                                                    <td>{{ $item->contact }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">Academy</th>
                                                                    <td>{{ $item->academy }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">Batch</th>
                                                                    <td>{{ $item->batch }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">Passport Number</th>
                                                                    <td>{{ $item->passport_number }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">Passport</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->passport)->subMonths(6)) ? 'color: red;' : '' }}">

                                                                        @if ($item->passport)
                                                                            {{ \Carbon\Carbon::parse($item->passport)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">CDC</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->cdc)->subMonths(6)) ? 'color: red;' : '' }}">

                                                                        @if ($item->cdc)
                                                                            {{ \Carbon\Carbon::parse($item->cdc)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">SID</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->sid)->subMonths(3)) ? 'color: red;' : '' }}">

                                                                        @if ($item->sid)
                                                                            {{ \Carbon\Carbon::parse($item->sid)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">PH</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->ph)->subMonths(3)) ? 'color: red;' : '' }}">

                                                                        @if ($item->ph)
                                                                            {{ \Carbon\Carbon::parse($item->ph)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">PST</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->pst)->subMonths(3)) ? 'color: red;' : '' }}">

                                                                        @if ($item->pst)
                                                                            {{ \Carbon\Carbon::parse($item->pst)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">FPFF</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->fpff)->subMonths(3)) ? 'color: red;' : '' }}">

                                                                        @if ($item->fpff)
                                                                            {{ \Carbon\Carbon::parse($item->fpff)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">EFA</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->efa)->subMonths(3)) ? 'color: red;' : '' }}">

                                                                        @if ($item->efa)
                                                                            {{ \Carbon\Carbon::parse($item->efa)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">Ship Cook</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->ship_cook)->subMonths(3)) ? 'color: red;' : '' }}">

                                                                        @if ($item->ship_cook)
                                                                            {{ \Carbon\Carbon::parse($item->ship_cook)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">PSCRB</th>

                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->pscrb)->subMonths(3)) ? 'color: red;' : '' }}">

                                                                        @if ($item->pscrb)
                                                                            {{ \Carbon\Carbon::parse($item->pscrb)->format('F j, Y') }}
                                                                        @else
                                                                        @endif

                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">AFF</th>

                                                                    <td
                                                                        style="{{ $item->aff && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->aff)->subMonths(3)) ? 'color: red;' : '' }}">
                                                                        @if ($item->aff)
                                                                            {{ \Carbon\Carbon::parse($item->aff)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>

                                                                </tr>


                                                            </tbody>
                                                        </table>

                                                    </div>

                                                    <div class="col-6">

                                                        <table
                                                            class="table table-striped table-hover table-row-bordered custom-table">
                                                            <tbody>


                                                                <tr>
                                                                    <th class="fs-5">PSSR</th>
                                                                    <td
                                                                        style="{{ $item->pssr && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->pssr)->subMonths(3)) ? 'color: red;' : '' }}">
                                                                        @if ($item->pssr)
                                                                            {{ \Carbon\Carbon::parse($item->pssr)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">SAT</th>
                                                                    <td
                                                                        style="{{ $item->sat && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->sat)->subMonths(3)) ? 'color: red;' : '' }}">
                                                                        @if ($item->sat)
                                                                            {{ \Carbon\Carbon::parse($item->sat)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">DSD</th>
                                                                    <td
                                                                        style="{{ $item->dsd && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->dsd)->subMonths(3)) ? 'color: red;' : '' }}">
                                                                        @if ($item->dsd)
                                                                            {{ \Carbon\Carbon::parse($item->dsd)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">NWR/EWR</th>
                                                                    <td
                                                                        style="{{ $item->nwr && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->nwr)->subMonths(3)) ? 'color: red;' : '' }}">
                                                                        @if ($item->nwr)
                                                                            {{ \Carbon\Carbon::parse($item->nwr)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">RASD</th>
                                                                    <td
                                                                        style="{{ $item->rasd && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->rasd)->subMonths(3)) ? 'color: red;' : '' }}">
                                                                        @if ($item->rasd)
                                                                            {{ \Carbon\Carbon::parse($item->rasd)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">ATOTO</th>
                                                                    <td
                                                                        style="{{ $item->atoto && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->atoto)->subMonths(3)) ? 'color: red;' : '' }}">
                                                                        @if ($item->atoto)
                                                                            {{ \Carbon\Carbon::parse($item->atoto)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th class="fs-5">Covid Vaccination</th>
                                                                    <td>{{ $item->covid }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">Status</th>
                                                                    <td>
                                                                        @if ($item->status == 'board')
                                                                            <h6>On Board ({{ $item->ship_name }})</h6>
                                                                        @elseif($item->status == 'leave')
                                                                            <h6>On Leave ({{ $item->ship_name }})</h6>
                                                                        @elseif($item->status == 'fleet')
                                                                            <h6>Not in Fleet Yet</h6>
                                                                        @endif
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th class="fs-5">Joining/Discharge</th>
                                                                    <td>
                                                                        @if ($item->discharge_date)
                                                                            {{ \Carbon\Carbon::parse($item->discharge_date)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">End Of Contract</th>
                                                                    <td
                                                                        style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->end_of_contract)->subMonths(2)) ? 'color: red;' : '' }}">

                                                                        @if ($item->end_of_contract)
                                                                            {{ \Carbon\Carbon::parse($item->end_of_contract)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">Readiness</th>
                                                                    <td>
                                                                        @if ($item->readiness)
                                                                            {{ \Carbon\Carbon::parse($item->readiness)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th class="fs-5">Value Added Course</th>
                                                                    <td>
                                                                        {{ $item->other_one }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">Mental Health</th>
                                                                    <td>
                                                                        {{-- @if ($item->other_two)
                                                                            {{ \Carbon\Carbon::parse($item->other_two)->format('F j, Y') }}
                                                                        @else
                                                                        @endif --}}
                                                                        {{ $item->other_two }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">Other Three</th>
                                                                    <td>
                                                                        @if ($item->other_three)
                                                                            {{ \Carbon\Carbon::parse($item->other_three)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="fs-5">Other Four</th>
                                                                    <td>
                                                                        @if ($item->other_four)
                                                                            {{ \Carbon\Carbon::parse($item->other_four)->format('F j, Y') }}
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @if (Auth::guard('admin')->user()->can('edit.rating'))
                                    <a href="{{ route('rating.user.pdf', $item->id) }}" title="Download"
                                        class="">
                                        <i class="fa-solid fa-download text-dark"></i>
                                    </a>

                                    <a href="{{ route('admin.rating.edit', $item->id) }}" class="text-primary">
                                        <i class="fa-solid fa-pencil text-primary fs-5"></i>
                                    </a>
                                @endif

                                @if (Auth::guard('admin')->user()->can('delete.rating'))
                                    <a href="{{ route('admin.rating.destroy', $item->id) }}" class="delete">
                                        <i class="fa-solid fa-trash text-danger fs-5"></i>
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

    @push('scripts')
        <script>
            $("#kt_datatable_example_5").DataTable({

                "pageLength": 50, // Set default number of entries to show
                "lengthMenu": [50, 100, 150, 200, 500, 700, 1000],

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

            document.getElementById('shouldBeRed').addEventListener('change', function() {
                const rows = document.querySelectorAll('.staff-row');
                rows.forEach(row => {
                    if (this.checked) {
                        // Show only expired staff
                        if (!row.classList.contains('expired')) {
                            row.style.display = 'none';
                        } else {
                            row.style.display = '';
                        }
                    } else {
                        // Show all staff
                        row.style.display = '';
                    }
                });
            });

            // function filterOfficers() {
            //     const deakChecked = document.getElementById('deak').checked;
            //     const engineChecked = document.getElementById('engine').checked;
            //     const salonChecked = document.getElementById('salon').checked;
            //     const rows = document.querySelectorAll('.officer-row');

            //     rows.forEach(row => {
            //         const isDeak = row.classList.contains('deak');
            //         const isEngine = row.classList.contains('engine');
            //         const issalon = row.classList.contains('salon');

            //         if ((deakChecked && isDeak) || (engineChecked && isEngine) || (salonChecked && issalon)) {
            //             row.style.display = ''; // Show the row
            //         } else {
            //             row.style.display = 'none'; // Hide the row
            //         }
            //     });
            // }

            function filterOfficers() {
                const deakChecked = document.getElementById('deak').checked;
                const engineChecked = document.getElementById('engine').checked;
                const salonChecked = document.getElementById('salon').checked;
                const rows = document.querySelectorAll('.officer-row');

                // If "deak" is unchecked, show all rows
                if (!deakChecked && !engineChecked && !salonChecked) {
                    rows.forEach(row => {
                        row.style.display = ''; // Show all rows
                    });
                    return; // Exit the function early
                }

                rows.forEach(row => {
                    const isDeak = row.classList.contains('deak');
                    const isEngine = row.classList.contains('engine');
                    const isSalon = row.classList.contains('salon');

                    if ((deakChecked && isDeak) || (engineChecked && isEngine) || (salonChecked && isSalon)) {
                        row.style.display = ''; // Show the row
                    } else {
                        row.style.display = 'none'; // Hide the row
                    }
                });
            }
        </script>
    @endpush

</x-admin-app-layout>
