<x-admin-app-layout :title="'Team Create'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.team.index') }}" class="btn btn-light-primary rounded-2">
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

            <form id="myForm" method="post" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card bg-light">
                    <div class="row p-4">

                        <!-- Form Fields -->
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Status</label>
                                <select name="status" class="form-select form-select-sm" data-control="select2">
                                    <option>Choose....</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Name</label>
                                <input type="text" name="name" placeholder="Employee Name"
                                    class="form-control form-control-sm" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Email</label>
                                <input type="email" name="email" placeholder="Employee Email"
                                    class="form-control form-control-sm" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Position</label>
                                <input type="text" name="position" placeholder="Employee Position"
                                    class="form-control form-control-sm" value="{{ old('position') }}">
                                @error('position')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Facebook</label>
                                <input type="text" name="facebook" placeholder="Url"
                                    class="form-control form-control-sm" value="{{ old('facebook') }}">
                                @error('facebook')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">What's Up</label>
                                <input type="text" name="whatup" placeholder="What's Up Number"
                                    class="form-control form-control-sm" value="{{ old('whatup') }}">
                                @error('whatup')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Phone</label>
                                <input type="text" name="phone" placeholder="017*****"
                                    class="form-control form-control-sm" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Short Description</label>
                                <textarea name="short_descp" class="form-control" cols="3" rows="3">{{ old('short_descp') }}</textarea>
                                @error('short_descp')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" name="image" accept="image/*"
                                    class="form-control form-control-sm">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <b class="text-danger">Image Size: Height Must Be 430 px</b>
                            </div>
                        </div>

                        <div class="col-1 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Order</label>
                                <input type="number" name="order_team" placeholder="" class="form-control form-control-sm" value="{{ old('order_team') }}">
                                @error('order_team')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
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
    @endpush




</x-admin-app-layout>
