<!DOCTYPE html>
<html>

<head>
    <title>Rating Personal File</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--version 2.2.1 11/19/2021-->

    <style>
        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Ensure proper width distribution */
        .full-width {
            width: 100%;
        }

        h2 {
            text-align: center;
            font-size: 30px
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 30px
        }
    </style>
</head>

<body>

    <h2>AZ Shipping Services</h2>
    <p>{{ $item->name }}</p>

    <table>

        <tr>
            <th class="fs-5">Rating Type</th>

            <td>
                @if ($item->rating_type == 'deak')
                    <span>Deck Rating</span>
                @elseif ($item->rating_type == 'salon')
                    <span>Salon Rating</span>
                @elseif ($item->rating_type == 'engine')
                    <span>Engine Rating</span>
                @endif
            </td>

        </tr>
        

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
            <th class="fs-5">Remarks</th>
            <td>{{ $item->remarks }}
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
            <th class="fs-5">Other Two</th>
            <td>
                @if ($item->other_two)
                    {{-- {{ \Carbon\Carbon::parse($item->other_two)->format('F j, Y') }} --}}
                    {{ $item->other_two }}
                @else
                @endif
            </td>
        </tr>
        <tr>
            <th class="fs-5">Other Three</th>
            <td>
                @if ($item->other_three)
                    {{-- {{ \Carbon\Carbon::parse($item->other_three)->format('F j, Y') }} --}}
                    {{ $item->other_three }}
                @else
                @endif
            </td>
        </tr>
        <tr>
            <th class="fs-5">Other Four</th>
            <td>
                @if ($item->other_four)
                    {{-- {{ \Carbon\Carbon::parse($item->other_four)->format('F j, Y') }} --}}
                    {{ $item->other_four }}
                @else
                @endif
            </td>
        </tr>

    </table>

</body>

</html>
