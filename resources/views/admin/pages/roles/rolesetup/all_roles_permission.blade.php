<x-admin-app-layout :title="'Role In Permission'">
    <!--begin::Content-->

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->

                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">



                            <!--begin::Add product-->
                            <a href="{{ route('add.roles.permission') }}" class="btn btn-light-primary btn-sm">Add
                                Role In Permission</a>
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
                                <tr class="text-start text-gray-400 fw-bolder">

                                    <th>Sl</th>
                                    <th>Role Name</th>
                                    <th>Permission Name</th>
                                    <th>Action</th>

                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">

                                <!--begin::Table row-->
                                @foreach ($roles as $key => $item)
                                    <tr>
                                        <td style="width: 30px;">{{ $key + 1 }}</td>
                                        <td style="width: 100px;">{{ $item->name }}</td>
                                        <td>

                                            @foreach ($item->permissions as $prem)
                                                <span class="badge bg-danger">{{ $prem->name }}</span>
                                            @endforeach

                                        </td>
                                        <td style="width: 100px;">
                                            <a href="{{ route('admin.edit.roles', $item->id) }}" class=""
                                                title="Edit"><i class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                            <a href="{{ route('admin.delete.roles', $item->id) }}" class=""
                                                id="delete" title="Delete"><i
                                                    class="bi bi-trash fs-3 text-danger"></i></a>
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
    </div>

    <!--end::Content-->
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
