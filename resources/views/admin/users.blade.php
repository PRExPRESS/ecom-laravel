@extends('theme.admin.theme')
@section('title', 'Users')
@section('description', 'Trendiest ecommerce website')

@section('content')


    <!-- Breadcrumb start -->
    <div class="row m-1">
        <div class="col-12 ">
            <h4 class="main-title">Users</h4>
            <ul class="app-line-breadcrumbs mb-3">
                <li class="">
                    <a href="#" class="f-s-14 f-w-500">
                        <span>
                            <i class="ph-duotone  ph-table f-s-16"></i>Users
                        </span>
                    </a>
                </li>
                <li class="active">
                    <a href="#" class="f-s-14 f-w-500">View User</a>
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
                                            style="width: 145.538px;">First Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Leader: activate to sort column ascending"
                                            style="width: 130.762px;">Last Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Status: activate to sort column ascending"
                                            style="width: 101.675px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Client: activate to sort column ascending"
                                            style="width: 66.9125px;">Phone</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Start Date: activate to sort column ascending"
                                            style="width: 140.25px;">Role</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="End Date: activate to sort column ascending"
                                            style="width: 140.25px;">Created At</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 109.825px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="even">
                                            <td class="sorting_1">
                                                <label class="check-box">
                                                    <input type="checkbox">
                                                    <span class="checkmark outline-secondary ms-2"></span>
                                                </label>
                                            </td>
                                            <td class="text-dark f-w-500">{{ $user->fname }}</td>
                                            <td class="text-dark f-w-500">{{ $user->lname }}</td>
                                            <td class="text-dark f-w-500">{{ $user->email }}</td>
                                            <td class="text-dark f-w-500">{{ $user->phone }}</td>
                                            <td class="text-dark f-w-500">{{ $user->role }}</td>
                                            <td class="text-danger f-w-500">{{ $user->created_at }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger icon-btn b-r-4 delete-btn">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <a href="/admin/users/{{ $user->id }}">
                                                    <button type="button" class="btn btn-success icon-btn b-r-4"
                                                        data-bs-toggle="modal" data-bs-target="#editCardModal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="dataTables_info" id="projectTable_info" role="status" aria-live="polite">
                                Showing {{ $users->firstItem() }} to {{ $users->lastItem()  }} of {{ $users->total() }} entries</div>

                                <div class="dataTables_paginate paging_simple_numbers" id="projectTable_paginate">
                                    <a class="paginate_button previous {{ $users->onFirstPage() ? 'disabled' : '' }}" 
                                       href="{{ $users->previousPageUrl() }}" id="projectTable_previous">
                                       Previous
                                    </a>
                                    
                                    <span>
                                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                            <a class="paginate_button {{ $page == $users->currentPage() ? 'current' : '' }}" 
                                               href="{{ $url }}" data-dt-idx="{{ $page - 1 }}" tabindex="0">
                                               {{ $page }}
                                            </a>
                                        @endforeach
                                    </span>
                                
                                    <a class="paginate_button next {{ $users->hasMorePages() ? '' : 'disabled' }}" 
                                       href="{{ $users->nextPageUrl() }}" id="projectTable_next">
                                       Next
                                    </a>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Projects Table end -->

@endsection
