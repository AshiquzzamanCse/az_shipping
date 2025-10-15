<!DOCTYPE html>
<html>

<head>
    <title>Officer Personal File</title>
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
            <th style="width:45%;">Office Type</th>
            
            <td>
                @if ($item->officer_type == 'deak')
                    <span>Deck Officer</span>
                @elseif ($item->officer_type == 'engine')
                    <span>Engine Officer</span>
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">Rank</th>
            <td>{{ $item->rank }}</td>
        </tr>

        <tr>
            <th style="width:45%;">CDC NO</th>
            <td>{{ $item->cdc_no }}</td>
        </tr>
        <tr>
            <th style="width:45%;">Contact</th>
            <td>{{ $item->contact }}</td>
        </tr>

        <tr>
            <th style="width:45%;">Academy</th>
            <td>{{ $item->academy }}</td>
        </tr>
        <tr>
            <th style="width:45%;">Batch</th>
            <td>{{ $item->batch }}</td>
        </tr>
        <tr>
            <th style="width:45%;">Passport Number</th>
            <td>{{ $item->passport_number }}</td>
        </tr>

        <tr>
            <th style="width:45%;">Passport</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->passport)->subMonths(6)) ? 'color: red;' : '' }}">

                @if ($item->passport)
                    {{ \Carbon\Carbon::parse($item->passport)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">CDC</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->cdc)->subMonths(6)) ? 'color: red;' : '' }}">

                @if ($item->cdc)
                    {{ \Carbon\Carbon::parse($item->cdc)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">COC</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->coc)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->coc)
                    {{ \Carbon\Carbon::parse($item->coc)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">GOC</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->goc)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->goc)
                    {{ \Carbon\Carbon::parse($item->goc)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">SID</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->sid)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->sid)
                    {{ \Carbon\Carbon::parse($item->sid)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">PH</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->ph)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->ph)
                    {{ \Carbon\Carbon::parse($item->ph)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">EDH</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->edh)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->edh)
                    {{ \Carbon\Carbon::parse($item->edh)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">PST</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->pst)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->pst)
                    {{ \Carbon\Carbon::parse($item->pst)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">FPFF</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->fpff)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->fpff)
                    {{ \Carbon\Carbon::parse($item->fpff)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">EFA</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->efa)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->efa)
                    {{ \Carbon\Carbon::parse($item->efa)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">PSSR</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->pssr)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->pssr)
                    {{ \Carbon\Carbon::parse($item->pssr)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">SAT</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->sat)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->sat)
                    {{ \Carbon\Carbon::parse($item->sat)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">DSD</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->dsd)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->dsd)
                    {{ \Carbon\Carbon::parse($item->dsd)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">PSCRB</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->pscrb)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->pscrb)
                    {{ \Carbon\Carbon::parse($item->pscrb)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">Rader Navigation</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->radar_navigation)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->radar_navigation)
                    {{ \Carbon\Carbon::parse($item->radar_navigation)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">AFF</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->aff)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->aff)
                    {{ \Carbon\Carbon::parse($item->aff)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">MFA</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->mfa)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->mfa)
                    {{ \Carbon\Carbon::parse($item->mfa)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">Medical Care</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->madical_care)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->madical_care)
                    {{ \Carbon\Carbon::parse($item->madical_care)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">ENS</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->ens)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->ens)
                    {{ \Carbon\Carbon::parse($item->ens)->format('F j, Y') }}
                @else
                @endif

            </td>
        </tr>

        <tr>
            <th style="width:45%;">SSO</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->sso)->subMonths(3)) ? 'color: red;' : '' }}">
                @if ($item->sso)
                    {{ \Carbon\Carbon::parse($item->sso)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">BRM/ERM</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->brm)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->brm)
                    {{ \Carbon\Carbon::parse($item->brm)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">HVS</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->hvs)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->hvs)
                    {{ \Carbon\Carbon::parse($item->hvs)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">Ship Simulation</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->ship_simulation)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->ship_simulation)
                    {{ \Carbon\Carbon::parse($item->ship_simulation)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">ECDIS</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->ecdis)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->ecdis)
                    {{ \Carbon\Carbon::parse($item->ecdis)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">ATOTO</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->atoto)->subMonths(3)) ? 'color: red;' : '' }}">


                @if ($item->atoto)
                    {{ \Carbon\Carbon::parse($item->atoto)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">COR</th>
            <td
                style="{{ \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->cor)->subMonths(3)) ? 'color: red;' : '' }}">

                @if ($item->cor)
                    {{ \Carbon\Carbon::parse($item->cor)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>


        <tr>
            <th style="width:45%;">Covid Vaccination</th>
            <td>{{ $item->covid }}</td>
        </tr>

        <tr>
            <th style="width:45%;">Status</th>
            <td>
                @if ($item->status == 'board')
                    <h6>On Board ({{ $item->ship_name }})
                    </h6>
                @elseif($item->status == 'leave')
                    <h6>On Leave ({{ $item->ship_name }})
                    </h6>
                @elseif($item->status == 'fleet')
                    <h6>Not in Fleet Yet</h6>
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">Remarks</th>
            <td>{{ $item->remarks }}</td>
        </tr>

        <tr>
            <th style="width:45%;">Joining/Discharge</th>
            <td>
                @if ($item->discharge_date)
                    {{ \Carbon\Carbon::parse($item->discharge_date)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">End Of Contract</th>
            <td
                style="{{ $item->end_of_contract && \Carbon\Carbon::now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item->end_of_contract)->subMonths(2)) ? 'color: red;' : '' }}">
                @if ($item->end_of_contract)
                    {{ \Carbon\Carbon::parse($item->end_of_contract)->format('F j, Y') }}
                    {{-- <br>
                    Current Date:
                    {{ \Carbon\Carbon::now()->format('F j, Y') }}
                    <br> --}}
                    {{-- Contract Ends In:
                    {{ \Carbon\Carbon::parse($item->end_of_contract)->diffInDays(\Carbon\Carbon::now()) }}
                    days --}}
                @else
                    N/A
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">Readiness</th>
            <td>
                @if ($item->readiness)
                    {{ \Carbon\Carbon::parse($item->readiness)->format('F j, Y') }}
                @else
                @endif
            </td>
        </tr>

        <tr>
            <th style="width:45%;">Value Added Course</th>
            <td>
                {{ $item->other_one }}
            </td>
        </tr>
        <tr>
            <th style="width:45%;">Other Two</th>
            <td>
                @if ($item->other_two)
                    {{-- {{ \Carbon\Carbon::parse($item->other_two)->format('F j, Y') }} --}}
                    {{ $item->other_two }}
                @else
                @endif
            </td>
        </tr>
        <tr>
            <th style="width:45%;">Other Three</th>
            <td>
                @if ($item->other_three)
                    {{-- {{ \Carbon\Carbon::parse($item->other_three)->format('F j, Y') }} --}}
                    {{ $item->other_three }}
                @else
                @endif
            </td>
        </tr>
        <tr>
            <th style="width:45%;">Other Four</th>
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
