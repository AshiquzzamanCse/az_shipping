<x-admin-app-layout :title="'Rating Create'">

    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.rating.index') }}" class="btn btn-light-primary rounded-2">
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
                    </span> Back to list
                </a>

            </div>
        </div>
        <div class="card-body">

            <form id="myForm" method="post" action="{{ route('admin.rating.store') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="card bg-light mb-5">

                    <div class="row p-4">

                        <h2 class="mb-4">Personal Information</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="officer_type" class="mb-2">Rating Type</label>
                                <select name="rating_type"
                                    class="form-select form-select-sm @error('rating_type') is-invalid @enderror"
                                    id="rating_type">
                                    <option selected disabled>Choose...</option>

                                    <option value="deak" {{ old('rating_type') == 'deak' ? 'selected' : '' }}>Deck
                                        Rating</option>

                                    <option value="engine" {{ old('rating_type') == 'engine' ? 'selected' : '' }}>
                                        Engine Rating</option>

                                    <option value="salon" {{ old('rating_type') == 'salon' ? 'selected' : '' }}>
                                        Saloon Rating</option>

                                </select>
                                @error('rating_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="name" class="mb-2">Name</label>
                                <input type="text" name="name" placeholder="Enter Name"
                                    class="form-control form-control-sm" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="rank" class="mb-2">Rank</label>
                                <input type="text" name="rank" placeholder="Enter Rank"
                                    class="form-control form-control-sm" value="{{ old('rank') }}">

                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="cdc_no" class="mb-2">CDC No</label>
                                <input type="text" name="cdc_no" id="cdc_no" placeholder="Enter CDC No"
                                    class="form-control form-control-sm" value="{{ old('cdc_no') }}">
                                <!-- Error message container -->
                                <div id="cdc_no_error" class="text-danger mt-2" style="display: none;"></div>
                            </div>
                        </div>


                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="contact" class="mb-2">Contact</label>
                                <input type="text" name="contact" placeholder="Enter Contact"
                                    class="form-control form-control-sm" value="{{ old('contact') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="academy" class="mb-2">Academy</label>
                                <input type="text" name="academy" placeholder="Enter Academy"
                                    class="form-control form-control-sm" value="{{ old('academy') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="batch" class="mb-2">Batch</label>
                                <input type="text" name="batch" placeholder="Enter Batch"
                                    class="form-control form-control-sm" value="{{ old('batch') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="batch" class="mb-2">Passport Number</label>
                                <input type="text" name="passport_number" placeholder="Enter Passport Number"
                                    class="form-control form-control-sm" value="{{ old('passport_number') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="contact" class="mb-2">Current Status</label>
                                <select name="status" class="form-select form-select-sm" id="statusSelect">
                                    <option disabled selected>Choose...</option>
                                    <option value="board">On Board</option>
                                    <option value="leave">On Leave</option>
                                    <option value="fleet">Not in Fleet Yet</option>
                                </select>
                            </div>
                            <div id="additionalField" class="form-group mt-2" style="display: none;">
                                <label for="details" class="mb-2">Ship Name</label>
                                <input type="text" class="form-control form-control-sm" id="details"
                                    name="ship_name" placeholder="Enter Ship Name">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="remarks" class="mb-2">Remarks</label>
                                <input type="text" name="remarks" placeholder="Enter Remarks"
                                    class="form-control form-control-sm" value="{{ old('remarks') }}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card bg-light mt-5">

                    <div class="row p-4">

                        <h2 class="mb-4">General Information</h2>


                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="cdc" class="mb-2">CDC</label>
                                <input type="date" name="cdc" placeholder="Enter CDC"
                                    class="form-control form-control-sm" value="{{ old('cdc') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="coc" class="mb-2">Passport</label>
                                <input type="date" name="passport" placeholder="Enter Passport"
                                    class="form-control form-control-sm" value="{{ old('passport') }}">
                            </div>
                        </div>


                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="sid" class="mb-2">SID</label>
                                <input type="date" name="sid" placeholder="Enter SID"
                                    class="form-control form-control-sm" value="{{ old('sid') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="ph" class="mb-2">PH</label>
                                <input type="date" name="ph" placeholder="Enter PH"
                                    class="form-control form-control-sm" value="{{ old('ph') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="pst" class="mb-2">PST</label>
                                <input type="date" name="pst" placeholder="Enter PST"
                                    class="form-control form-control-sm" value="{{ old('pst') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="aff" class="mb-2">AFF</label>
                                <input type="date" name="aff" placeholder="Enter AFF"
                                    class="form-control form-control-sm" value="{{ old('aff') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="fpff" class="mb-2">FPFF</label>
                                <input type="date" name="fpff" placeholder="Enter FPFF"
                                    class="form-control form-control-sm" value="{{ old('fpff') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="efa" class="mb-2">EFA</label>
                                <input type="date" name="efa" placeholder="Enter EFA"
                                    class="form-control form-control-sm" value="{{ old('efa') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="pssr" class="mb-2">PSSR</label>
                                <input type="date" name="pssr" placeholder="Enter PSSR"
                                    class="form-control form-control-sm" value="{{ old('pssr') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="sat" class="mb-2">SAT</label>
                                <input type="date" name="sat" placeholder="Enter SAT"
                                    class="form-control form-control-sm" value="{{ old('sat') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="atoto" class="mb-2">ATOTO</label>
                                <input type="date" name="atoto" placeholder="Enter ATOTO"
                                    class="form-control form-control-sm" value="{{ old('atoto') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="dsd" class="mb-2">DSD</label>
                                <input type="date" name="dsd" placeholder="Enter DSD"
                                    class="form-control form-control-sm" value="{{ old('dsd') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="pscrb" class="mb-2">PSCRB</label>
                                <input type="date" name="pscrb" placeholder="Enter PSCRB"
                                    class="form-control form-control-sm" value="{{ old('pscrb') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="edh" class="mb-2">NWR/EWR</label>
                                <input type="date" name="nwr" placeholder="Enter NWR/EWR"
                                    class="form-control form-control-sm" value="{{ old('nwr') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="rasd" class="mb-2">RASD</label>
                                <input type="date" name="rasd" placeholder="Enter RASD"
                                    class="form-control form-control-sm" value="{{ old('rasd') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="covid" class="mb-2">COVID VACCINATION</label>
                                <input type="text" name="covid" placeholder="Enter COVID Vaccination"
                                    class="form-control form-control-sm" value="{{ old('covid') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="ship_cook" class="mb-2">Ship Cook</label>
                                <input type="date" name="ship_cook" placeholder="Enter Ship Cook"
                                    class="form-control form-control-sm" value="{{ old('ship_cook') }}">
                            </div>
                        </div>


                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="discharge_date" class="mb-2">Joining Date/Discharge Date</label>
                                <input type="date" name="discharge_date" class="form-control form-control-sm"
                                    value="{{ old('discharge_date') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="end_of_contract" class="mb-2">End of Contract</label>
                                <input type="date" name="end_of_contract" class="form-control form-control-sm"
                                    value="{{ old('end_of_contract') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="readiness" class="mb-2">Readiness</label>
                                <input type="date" name="readiness" class="form-control form-control-sm"
                                    value="{{ old('readiness') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_one" class="mb-2">Value Added Course</label>
                                <input type="text" name="other_one" class="form-control form-control-sm"
                                    value="{{ old('other_one') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_two" class="mb-2">Mental Health</label>
                                <input type="text" name="other_two" class="form-control form-control-sm"
                                    value="{{ old('other_two') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_three" class="mb-2">Other Three</label>
                                <input type="date" name="other_three" class="form-control form-control-sm"
                                    value="{{ old('other_three') }}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_four" class="mb-2">Other Four</label>
                                <input type="date" name="other_four" class="form-control form-control-sm"
                                    value="{{ old('other_four') }}">
                            </div>
                        </div>

                        <div class="col-12 mb-3 mt-4">
                            <button type="submit"
                                class="btn btn-primary rounded-0 px-5 btn-sm float-end">Submit</button>
                        </div>

                    </div>

                </div>


            </form>


        </div>

    </div>

    @push('scripts')
        <script>
            const statusSelect = document.getElementById('statusSelect');
            const additionalField = document.getElementById('additionalField');

            statusSelect.addEventListener('change', function() {
                if (this.value === 'board' || this.value === 'leave') {
                    additionalField.style.display = 'block';
                } else {
                    additionalField.style.display = 'none';
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#cdc_no').on('input', function() {
                    var cdcNo = $(this).val();
                    var errorMessage = $('#cdc_no_error');

                    // If the field is empty, hide the error message
                    if (cdcNo === '') {
                        errorMessage.hide();
                        return;
                    }

                    // Make the AJAX request to validate the CDC number
                    $.ajax({
                        url: '/validate-cdc-no', // URL where you will handle the validation
                        type: 'POST', // HTTP method (POST or GET)
                        data: {
                            cdc_no: cdcNo, // Send the input value to the server
                            _token: '{{ csrf_token() }}' // CSRF token for security (Laravel)
                        },
                        success: function(response) {
                            // If the server responds with an error message, show it
                            if (response.error) {
                                errorMessage.text(response.error).show();
                            } else {
                                errorMessage.hide(); // Hide the error message if the input is valid
                            }
                        },
                        error: function() {
                            // Handle any AJAX error
                            errorMessage.text('An error occurred while validating.').show();
                        }
                    });
                });
            });
        </script>
    @endpush

</x-admin-app-layout>
