<x-admin-app-layout :title="'About Edit'">

    <style>
        .img-preview {
            border: 1px solid #ddd;
            /* Optional styling */
            border-radius: 4px;
            /* Optional styling */
        }
    </style>

    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.about.index') }}" class="btn btn-light-primary rounded-2">
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

            <form id="myForm" method="post" action="{{ route('admin.about.update', $about->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card bg-light">

                    <div class="row p-4">

                        <div class="col-4 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Title</label>
                                <input type="text" name="title" placeholder="About Title"
                                    class="form-control form-control-sm @error('title') is-invalid @enderror"
                                    value="{{ old('title', $about->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Short Description</label>
                                <textarea name="short_descp" class="form-control editor @error('short_descp') is-invalid @enderror">{!! $about->short_descp !!}</textarea>
                                @error('short_descp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="" class="mb-2">Long Description</label>
                                <textarea name="long_descp" class="form-control editor @error('long_descp') is-invalid @enderror">{!! $about->long_descp !!}</textarea>
                                @error('long_descp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div>
                                <label for="image" class="mb-2">Image</label>
                                <p class="text-danger">Image Support Format jpeg, png, jpg, gif</p>
                                <input type="file" name="image" accept="image/*"
                                    class="form-control form-control-sm @error('image') is-invalid @enderror"
                                    onchange="previewImage(event, 'imagePreview')">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <img id="imagePreview" class="img-preview mt-3"
                                    src="{{ !empty($about->image) ? url('storage/' . $about->image) : 'https://ui-avatars.com/api/?name=' . urlencode($about->title) }}"
                                    height="80" width="80" alt="{{ $about->title }}">
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <div>
                                <label for="image_one" class="mb-2">Image One</label>
                                <p class="text-danger">Image Support Format jpeg, png, jpg, gif</p>
                                <input type="file" name="image_one" accept="image/*"
                                    class="form-control form-control-sm @error('image_one') is-invalid @enderror"
                                    onchange="previewImage(event, 'imageOnePreview')">
                                @error('image_one')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <img id="imageOnePreview" class="img-preview mt-3"
                                    src="{{ !empty($about->image_one) ? url('storage/' . $about->image_one) : 'https://ui-avatars.com/api/?name=' . urlencode($about->title) }}"
                                    height="80" width="80" alt="{{ $about->title }}">


                            </div>
                        </div>

                        {{-- <div class="col-4 mb-3">
                            <div>
                                <label for="image_two" class="mb-2">Image Two</label>
                                <p class="text-danger">Image Support Format jpeg, png, jpg, gif</p>
                                <input type="file" name="image_two" accept="image/*"
                                    class="form-control form-control-sm @error('image_two') is-invalid @enderror"
                                    onchange="previewImage(event, 'imageTwoPreview')">
                                @error('image_two')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <img id="imageTwoPreview"
                                    src="{{ !empty($about->image_two) ? url('storage/' . $about->image_two) : 'https://ui-avatars.com/api/?name=' . urlencode($about->title) }}"
                                    height="80" width="80" class="img-preview mt-3"
                                    alt="{{ $about->title }}">
                            </div>
                        </div> --}}

                        <div class="col-12 mb-3 mt-4">
                            <button type="submit"
                                class="btn btn-primary rounded-0 px-5 btn-sm float-end">Update</button>
                        </div>

                    </div>
                </div>

            </form>


        </div>

    </div>

    @push('scripts')
        <script>
            function previewImage(event, previewId) {
                const file = event.target.files[0];
                const preview = document.getElementById(previewId);

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            }
        </script>
    @endpush




</x-admin-app-layout>
