@extends('theme.admin.theme')
@section('title', 'Categories')
@section('description', 'Trendiest ecommerce website')

@section('content')
    <!-- Breadcrumb start -->
    <div class="row m-1">
        <div class="col-12 ">
            <h4 class="main-title">Categories</h4>
            <ul class="app-line-breadcrumbs mb-3">
                <li class="">
                    <a href="#" class="f-s-14 f-w-500">
                        <span>
                            <i class="ph-duotone  ph-table f-s-16"></i>Categories
                        </span>
                    </a>
                </li>
                <li class="active">
                    <a href="#" class="f-s-14 f-w-500">View Categories</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb end -->
    <!-- Projects Table start -->
    <div class="row advance-table-section">
        <div class="col-12">
            <div class="card">
                <div class="card-body ps-0 pe-0">
                    <div class="table-responsive app-scroll app-datatable-default project-table">
                        <div id="projectTable_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="projectTable_length"><label>Show <select
                                        name="projectTable_length" aria-controls="projectTable" class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                            <div id="projectTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="" placeholder="" aria-controls="projectTable"></label></div>
                            <table id="projectTable"
                                class="display table-bottom-border app-data-table table-box-hover dataTable no-footer"
                                aria-describedby="projectTable_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="projectTable"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label=": activate to sort column descending" style="width: 61.9875px;">
                                            <label class="check-box">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmark outline-secondary ms-2"></span>
                                            </label>
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 145.538px;">category Name</th>

                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="End Date: activate to sort column ascending"
                                            style="width: 140.25px;">Created At</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 109.825px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="even">
                                            <td class="sorting_1">
                                                <label class="check-box">
                                                    <input type="checkbox">
                                                    <span class="checkmark outline-secondary ms-2"></span>
                                                </label>
                                            </td>
                                            <td class="text-dark f-w-500">{{ $category->name }}</td>


                                            <td class="text-danger f-w-500">{{ $category->created_at }}</td>
                                            <td>
                                                <form action="/admin/delete-category/{{ $category->id }}" method="POST"
                                                    style="display:inline;" id="delete-form-{{ $category->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger icon-btn b-r-4 delete-btn"
                                                        id="delete-btn-{{ $category->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-success icon-btn b-r-4"
                                                    data-bs-toggle="modal" data-bs-target="#editCardModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_info" id="projectTable_info" role="status" aria-live="polite">
                                Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of
                                {{ $categories->total() }} entries</div>

                            <div class="dataTables_paginate paging_simple_numbers" id="projectTable_paginate">
                                <a class="paginate_button previous {{ $categories->onFirstPage() ? 'disabled' : '' }}"
                                    href="{{ $categories->previousPageUrl() }}" id="projectTable_previous">
                                    Previous
                                </a>

                                <span>
                                    @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                        <a class="paginate_button {{ $page == $categories->currentPage() ? 'current' : '' }}"
                                            href="{{ $url }}" data-dt-idx="{{ $page - 1 }}" tabindex="0">
                                            {{ $page }}
                                        </a>
                                    @endforeach
                                </span>

                                <a class="paginate_button next {{ $categories->hasMorePages() ? '' : 'disabled' }}"
                                    href="{{ $categories->nextPageUrl() }}" id="projectTable_next">
                                    Next
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Projects Table end -->



        <script>
            // Ensure the document is fully loaded before attaching the event
            document.addEventListener('DOMContentLoaded', function() {
                // Get the delete button by its ID
                const deleteButton = document.getElementById('delete-btn-{{ $category->id }}');

                // Add event listener to handle the delete button click
                deleteButton.addEventListener('click', function() {
                    document.getElementById('delete-form-{{ $category->id }}').addEventListener('submit',
                        function(event) {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'You will not be able to revert this!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'Cancel'
                            }).then((result) => {

                                if (result.isConfirmed) {
                                    this.submit();
                                }
                            });
                        })
                });
            });
        </script>

    @endsection
