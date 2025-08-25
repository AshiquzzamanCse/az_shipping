<x-admin-app-layout :title="'Officer Edit'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.officer.index') }}" class="btn btn-light-primary rounded-2">
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

            <form id="myForm" method="post" action="{{ route('admin.officer.update', $officer->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                                <label for="officer_type" class="mb-2">Officer Type</label>
                                <select name="officer_type"
                                    class="form-select form-select-sm @error('officer_type') is-invalid @enderror"
                                    id="officer_type">
                                    <option selected disabled>Choose...</option>
                                    <option value="deak" {{ $officer->officer_type == 'deak' ? 'selected' : '' }}>Deak
                                        Officer</option>
                                    <option value="engine" {{ $officer->officer_type == 'engine' ? 'selected' : '' }}>
                                        Engine Officer</option>
                                </select>
                                @error('officer_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="name" class="mb-2">Name <span class="text-danger"></span></label>
                                <input type="text" name="name" placeholder="Enter Name"
                                    class="form-control form-control-sm"
                                    value="{{ old('name', $officer->name ?? 'John Doe') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="rank" class="mb-2">Rank</label>
                                <input type="text" name="rank" placeholder="Enter Rank"
                                    class="form-control form-control-sm"
                                    value="{{ old('rank', $officer->rank ?? 'Captain') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="cdc_no" class="mb-2">CDC No</label>
                                <input type="text" name="cdc_no" placeholder="Enter CDC No"
                                    class="form-control form-control-sm"
                                    value="{{ old('cdc_no', $officer->cdc_no ?? 'CDC12345') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="contact" class="mb-2">Contact <span class="text-danger"></span></label>
                                <input type="text" name="contact" placeholder="Enter Contact (e.g., 123-456-7890)"
                                    class="form-control form-control-sm"
                                    value="{{ old('contact', $officer->contact ?? '123-456-7890') }}" required>
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="academy" class="mb-2">Academy</label>
                                <input type="text" name="academy" placeholder="Enter Academy"
                                    class="form-control form-control-sm"
                                    value="{{ old('academy', $officer->academy ?? 'Naval Academy') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="batch" class="mb-2">Batch</label>
                                <input type="text" name="batch" placeholder="Enter Batch"
                                    class="form-control form-control-sm"
                                    value="{{ old('batch', $officer->batch ?? '2022') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="passport_number" class="mb-2">Passport Number</label>
                                <input type="text" name="passport_number" placeholder="Enter Passport Number"
                                    class="form-control form-control-sm"
                                    value="{{ old('passport_number', $officer->passport_number) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="contact" class="mb-2">Current Status</label>
                                <select name="status" class="form-select form-select-sm" id="statusSelect">
                                    <option disabled selected>Choose...</option>
                                    <option value="board" {{ $officer->status == 'board' ? 'selected' : '' }}>On
                                        Board</option>
                                    <option value="leave" {{ $officer->status == 'leave' ? 'selected' : '' }}>On
                                        Leave</option>
                                    <option value="fleet" {{ $officer->status == 'fleet' ? 'selected' : '' }}>Not in
                                        Fleet Yet</option>
                                </select>
                            </div>

                            <div id="additionalField" class="form-group mt-2"
                                style="{{ $officer->status == 'board' || $officer->status == 'leave' ? '' : 'display: none;' }}">
                                <label for="details" class="mb-2">Ship Name</label>
                                <input type="text" class="form-control form-control-sm" id="details"
                                    value="{{ $officer->ship_name }}" name="ship_name"
                                    placeholder="Enter ship name">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="remarks" class="mb-2">Remarks</label>
                                <input type="text" name="remarks" placeholder="Enter Remarks"
                                    class="form-control form-control-sm"
                                    value="{{ old('remarks', $officer->remarks) }}">

                                @error('remarks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                    class="form-control form-control-sm"
                                    value="{{ old('cdc', $officer->cdc ?? 'CDC67890') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="passport" class="mb-2">Passport</label>
                                <input type="date" name="passport" placeholder=""
                                    class="form-control form-control-sm"
                                    value="{{ old('passport', $officer->passport) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="coc" class="mb-2">COC</label>
                                <input type="date" name="coc" placeholder="Enter COC"
                                    class="form-control form-control-sm" value="{{ old('coc', $officer->coc) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="goc" class="mb-2">GOC</label>
                                <input type="date" name="goc" placeholder="Enter GOC"
                                    class="form-control form-control-sm" value="{{ old('goc', $officer->goc) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="sid" class="mb-2">SID</label>
                                <input type="date" name="sid" placeholder="Enter SID"
                                    class="form-control form-control-sm" value="{{ old('sid', $officer->sid) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="ph" class="mb-2">PH</label>
                                <input type="date" name="ph" placeholder="Enter PH"
                                    class="form-control form-control-sm" value="{{ old('ph', $officer->ph) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="pst" class="mb-2">PST</label>
                                <input type="date" name="pst" placeholder="Enter PST"
                                    class="form-control form-control-sm" value="{{ old('pst', $officer->pst) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="fpff" class="mb-2">FPFF</label>
                                <input type="date" name="fpff" placeholder="Enter FPFF"
                                    class="form-control form-control-sm"
                                    value="{{ old('fpff', $officer->fpff ?? 'FPFF89012') }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="efa" class="mb-2">EFA</label>
                                <input type="date" name="efa" placeholder="Enter EFA"
                                    class="form-control form-control-sm" value="{{ old('efa', $officer->efa) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="pssr" class="mb-2">PSSR</label>
                                <input type="date" name="pssr" placeholder="Enter PSSR"
                                    class="form-control form-control-sm" value="{{ old('pssr', $officer->pssr) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="sat" class="mb-2">SAT</label>
                                <input type="date" name="sat" placeholder="Enter SAT"
                                    class="form-control form-control-sm" value="{{ old('sat', $officer->sat) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="dsd" class="mb-2">DSD</label>
                                <input type="date" name="dsd" placeholder="Enter DSD"
                                    class="form-control form-control-sm" value="{{ old('dsd', $officer->dsd) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="pscrb" class="mb-2">PSCRB</label>
                                <input type="date" name="pscrb" placeholder="Enter PSCRB"
                                    class="form-control form-control-sm" value="{{ old('pscrb', $officer->pscrb) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="edh" class="mb-2">EDH</label>
                                <input type="date" name="edh" placeholder="Enter EDH"
                                    class="form-control form-control-sm" value="{{ old('edh', $officer->edh) }}">
                            </div>
                        </div>


                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="radar_navigation" class="mb-2">Radar Navigation</label>
                                <input type="date" name="radar_navigation" placeholder="Enter Radar Navigation"
                                    class="form-control form-control-sm"
                                    value="{{ old('radar_navigation', $officer->radar_navigation) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="aff" class="mb-2">AFF</label>
                                <input type="date" name="aff" placeholder="Enter AFF"
                                    class="form-control form-control-sm" value="{{ old('aff', $officer->aff) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="mfa" class="mb-2">MFA</label>
                                <input type="date" name="mfa" placeholder="Enter MFA"
                                    class="form-control form-control-sm" value="{{ old('mfa', $officer->mfa) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="madical_care" class="mb-2">Medical Care</label>
                                <input type="date" name="madical_care" placeholder="Enter Medical Care"
                                    class="form-control form-control-sm"
                                    value="{{ old('madical_care', $officer->madical_care) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="ens" class="mb-2">ENS</label>
                                <input type="date" name="ens" placeholder="Enter ENS"
                                    class="form-control form-control-sm" value="{{ old('ens', $officer->ens) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="sso" class="mb-2">SSO</label>
                                <input type="date" name="sso" placeholder="Enter SSO"
                                    class="form-control form-control-sm" value="{{ old('sso', $officer->sso) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="brm" class="mb-2">BRM/ERM</label>
                                <input type="date" name="brm" placeholder="Enter BRM"
                                    class="form-control form-control-sm" value="{{ old('brm', $officer->brm) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="hvs" class="mb-2">HVS</label>
                                <input type="date" name="hvs" placeholder="Enter HVS"
                                    class="form-control form-control-sm" value="{{ old('hvs', $officer->hvs) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="ship_simulation" class="mb-2">Ship Simulation</label>
                                <input type="date" name="ship_simulation" placeholder="Enter Ship Simulation"
                                    class="form-control form-control-sm"
                                    value="{{ old('ship_simulation', $officer->ship_simulation) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="ecdis" class="mb-2">ECDIS</label>
                                <input type="date" name="ecdis" placeholder="Enter ECDIS"
                                    class="form-control form-control-sm" value="{{ old('ecdis', $officer->ecdis) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="atoto" class="mb-2">ATOTO</label>
                                <input type="date" name="atoto" placeholder="Enter ATOTO"
                                    class="form-control form-control-sm" value="{{ old('atoto', $officer->atoto) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="cor" class="mb-2">COR</label>
                                <input type="date" name="cor" placeholder="Enter COR"
                                    class="form-control form-control-sm" value="{{ old('cor', $officer->cor) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="covid" class="mb-2">COVID Vaccination</label>
                                <input type="text" name="covid" placeholder="Enter COVID Vaccination"
                                    class="form-control form-control-sm" value="{{ old('covid', $officer->covid) }}">
                            </div>
                        </div>

                        {{-- <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="current_status" class="mb-2">Current Status</label>
                                <input type="date" name="current_status" placeholder="Leave / On Leave"
                                    class="form-control form-control-sm"
                                    value="{{ old('current_status', $officer->current_status ?? 'On Leave') }}">
                            </div>
                        </div> --}}

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="discharge_date" class="mb-2">Joining Date/Discharge Date</label>
                                <input type="date" name="discharge_date" class="form-control form-control-sm"
                                    value="{{ old('discharge_date', $officer->discharge_date) }}"
                                    aria-label="Discharge Date">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="end_of_contract" class="mb-2">End of Contract</label>
                                <input type="date" name="end_of_contract" class="form-control form-control-sm"
                                    value="{{ old('end_of_contract', $officer->end_of_contract) }}"
                                    aria-label="End of Contract">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="readiness" class="mb-2">Readiness</label>
                                <input type="date" name="readiness" class="form-control form-control-sm"
                                    value="{{ old('readiness', $officer->readiness) }}">
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_one" class="mb-2">Value Added Course</label>
                                <input type="text" name="other_one" class="form-control form-control-sm"
                                    value="{{ old('other_one', $officer->other_one) }}">
                            </div>
                        </div>


                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_two" class="mb-2">Mental Health</label>
                                <input type="text" name="other_two" class="form-control form-control-sm"
                                    value="{{ old('other_two', $officer->other_two) }}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_three" class="mb-2">Other Three</label>
                                <input type="date" name="other_three" class="form-control form-control-sm"
                                    value="{{ old('other_three', $officer->other_three) }}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="other_four" class="mb-2">Other Four</label>
                                <input type="date" name="other_four" class="form-control form-control-sm"
                                    value="{{ old('other_four', $officer->other_four) }}">
                            </div>
                        </div>

                        <div class="col-12 mb-3 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0 px-5 btn-sm float-end">Update
                                Data</button>
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

            // Trigger change event on page load to set the correct visibility
            statusSelect.dispatchEvent(new Event('change'));
        </script>
    @endpush




</x-admin-app-layout>
