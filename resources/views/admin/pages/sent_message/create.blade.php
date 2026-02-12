<x-admin-app-layout :title="'Sent Message Create'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.sent-message.index') }}" class="btn btn-light-primary rounded-2">
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

            <form id="myForm" method="post" action="{{ route('admin.sent-message.store') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="card bg-light">
                    <div class="row p-4">

                        <!-- Status Field -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Status</label>
                                <select name="status" class="form-select form-select-sm" data-control="select2"
                                    data-placeholder="Select an option">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Date & Time Field -->
                        <div class="col-3 mb-3">
                            <div class="form-group">
                                <label for="datetime" class="mb-2">Date & Time</label>
                                <input type="datetime-local" name="time" id="datetime"
                                    class="form-control form-control-sm"
                                    value="{{ \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d\TH:i') }}"
                                    min="{{ \Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d\TH:i') }}">
                                @error('time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Subject Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="subject" class="mb-2">Subject</label>
                                <textarea name="subject" id="subject" class="form-control" cols="1" rows="1">{{ old('subject') }}</textarea>
                                @error('subject')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="message" class="mb-2">Message</label>
                                <textarea name="message" id="message" class="form-control editor" cols="2" rows="2">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        {{-- <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="subject" class="mb-2">Employee Email</label><br>
                                @foreach ($admins as $admin)
                                    <input type="checkbox" class="me-2 mt-0">{{ $admin->email }}<br>
                                @endforeach
                                @error('subject')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-12 mb-3">
                            <label class="mb-2">Employee Emails</label><br>

                            @foreach ($admins as $admin)
                                <div>
                                    <input type="checkbox" name="emails[]" value="{{ $admin->email }}">
                                    {{ $admin->email }}
                                </div>
                            @endforeach

                            @error('emails')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
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
    @endpush




</x-admin-app-layout>
