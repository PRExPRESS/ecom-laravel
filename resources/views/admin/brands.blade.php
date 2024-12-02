@extends('theme.admin.theme')
@section('title', 'Categories')
@section('description', 'Trendiest ecommerce website')

@section('content')
<!-- Breadcrumb start -->
<div class="row m-1">
    <div class="col-12 ">
        <h4 class="main-title">Brands</h4>
        <ul class="app-line-breadcrumbs mb-3">
            <li class="">
                <a href="#" class="f-s-14 f-w-500">
                    <span>
                        <i class="ph-duotone  ph-table f-s-16"></i>Brands
                    </span>
                </a>
            </li>
            <li class="active">
                <a href="#" class="f-s-14 f-w-500">View Brands</a>
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
                                        aria-label=": activate to sort column descending"
                                        style="width: 61.9875px;">
                                        <label class="check-box">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmark outline-secondary ms-2"></span>
                                        </label>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                        colspan="1" aria-label="Name: activate to sort column ascending"
                                        style="width: 145.538px;">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                        colspan="1" aria-label="Leader: activate to sort column ascending"
                                        style="width: 130.762px;">Leader</th>
                                    <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                        colspan="1" aria-label="Status: activate to sort column ascending"
                                        style="width: 101.675px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                        colspan="1" aria-label="Client: activate to sort column ascending"
                                        style="width: 66.9125px;">Client</th>
                                    <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                        colspan="1" aria-label="Start Date: activate to sort column ascending"
                                        style="width: 140.25px;">Start Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                        colspan="1" aria-label="End Date: activate to sort column ascending"
                                        style="width: 140.25px;">End Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                        colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 109.825px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr class="even">
                                    <td class="sorting_1">
                                        <label class="check-box">
                                            <input type="checkbox">
                                            <span class="checkmark outline-secondary ms-2"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="h-30 w-30 d-flex-center b-r-50 overflow-hidden me-2">
                                                <img src="../assets/images/icons/logo11.png" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <div>
                                                <h6 class="f-s-15 mb-0">Node js</h6>
                                                <p class="text-secondary f-s-13 mb-0">2 apr 2024</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-dark f-w-500">Merline</td>
                                    <td>
                                        <span class="badge bg-success">Completed</span>
                                    </td>
                                    <td>Thomas</td>
                                    <td class="text-success f-w-500">Jul 27, 2024</td>
                                    <td class="text-danger f-w-500">Jan 06, 2025</td>
                                    <td>
                                        <button type="button" class="btn btn-danger icon-btn b-r-4 delete-btn">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-success icon-btn b-r-4"
                                            data-bs-toggle="modal" data-bs-target="#editCardModal">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="projectTable_info" role="status" aria-live="polite">
                            Showing 1 to 7 of 7 entries</div>
                        <div class="dataTables_paginate paging_simple_numbers" id="projectTable_paginate"><a
                                class="paginate_button previous disabled" aria-controls="projectTable"
                                aria-disabled="true" aria-role="link" data-dt-idx="previous" tabindex="-1"
                                id="projectTable_previous">Previous</a><span><a class="paginate_button current"
                                    aria-controls="projectTable" aria-role="link" aria-current="page"
                                    data-dt-idx="0" tabindex="0">1</a></span><a
                                class="paginate_button next disabled" aria-controls="projectTable"
                                aria-disabled="true" aria-role="link" data-dt-idx="next" tabindex="-1"
                                id="projectTable_next">Next</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- Projects Table end -->

@endsection