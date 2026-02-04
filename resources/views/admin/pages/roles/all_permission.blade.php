<x-admin-app-layout :title="'Permission'">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!--begin::Content-->


    <!--begin::Toolbar-->

    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center">

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                        <!--begin::Add product-->

                        <a href="" class="btn btn-light-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addModal">Add Permission</a>

                        <a href="{{ route('all.roles.permission') }}" class="btn btn-light-info btn-sm">Role In
                            Permission</a>
                        <!--end::Add product-->

                    </div>
                    <!--end::Card toolbar-->

                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->

                    <table id="kt_datatable_example_5"
                        class="table table-striped table-row-bordered gy-5 gs-7 border rounded">

                        <!--begin::Table head-->
                        <thead class="bg-dark text-light">
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 gs-0">

                                <th>Sl No</th>
                                <th>Permission Name</th>
                                <th>Group Name</th>
                                <th>Action</th>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">

                            <!--begin::Table row-->
                            @foreach ($permissions as $key => $permission)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->group_name }}</td>
                                    <td>

                                        <a href="" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $permission->id }}"><i
                                                class="bi bi-pencil-square text-primary fs-3"></i></a>

                                        {{-- Edit Permission --}}
                                        <div class="modal fade" id="editModal{{ $permission->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                            Permission
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.permission') }}" method="POST"
                                                        id="myForm">

                                                        @csrf

                                                        <input type="hidden" name="id"
                                                            value="{{ $permission->id }}">

                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="">Permission Name</label>
                                                                <input type="text" value="{{ $permission->name }}"
                                                                    name="name" required autocomplete="off"
                                                                    placeholder="Permission Name" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Group Name</label>
                                                                <input type="text"
                                                                    value="{{ $permission->group_name }}"
                                                                    name="group_name" required autocomplete="off"
                                                                    placeholder="Permission Name" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Save
                                                                changes</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit Permission --}}

                                        <a href="{{ route('delete.permission', $permission->id) }}" title="Delete"><i
                                                class="bi bi-trash text-danger fs-3"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            <!--end::Table row-->


                        </tbody>
                        <!--end::Table body-->

                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->


    <!--end::Content-->

    {{-- Add Permission --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Permission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.permission') }}" method="POST" id="myForm">

                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" required autocomplete="off"
                                placeholder="Permission Name" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <label for="">Group Name</label>

                            <select class="form-select form-select-solid form-select-sm stock_select" name="group_name"
                                data-control="select2" data-placeholder="Select Group Name" data-allow-clear="true">

                                <option></option>

                                @foreach ($groups as $group)
                                    <option value="{{ $group->group_name }}">{{ $group->group_name }}</option>
                                @endforeach

                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="">Group Name</label>
                            <input type="text" name="group_name" required autocomplete="off" placeholder="Group Name"
                                class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    {{-- Add Permission --}}

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    group_name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Permission Name',
                    },
                    group_name: {
                        required: 'Please Enter Group Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    {{-- DataTable  --}}
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
    @endpush
</x-admin-app-layout>
