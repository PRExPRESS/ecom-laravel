@extends('theme.admin.theme')
@section('title', 'Orders')
@section('description', 'Trendiest ecommerce website')

@section('content')


    <!-- Breadcrumb start -->
    <div class="row m-1">
        <div class="col-12 ">
            <h4 class="main-title">Orders</h4>
            <ul class="app-line-breadcrumbs mb-3">
                <li class="">
                    <a href="#" class="f-s-14 f-w-500">
                        <span>
                            <i class="ph-duotone  ph-table f-s-16"></i>Orders
                        </span>
                    </a>
                </li>
                <li class="active">
                    <a href="#" class="f-s-14 f-w-500">View Orders</a>
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
                                            colspan="1" aria-label="Order ID: activate to sort column ascending"
                                            style="width: 145.538px;">Order ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Product Name: activate to sort column ascending"
                                            style="width: 145.538px;">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Size: activate to sort column ascending"
                                            style="width: 140.25px;">Size</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Quantity: activate to sort column ascending"
                                            style="width: 140.25px;">Quantity</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Price: activate to sort column ascending"
                                            style="width: 140.25px;">Unit Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Price: activate to sort column ascending"
                                            style="width: 140.25px;">Total Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Customer Email: activate to sort column ascending"
                                            style="width: 140.25px;">Customer Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="projectTable" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 109.825px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="even">
                                            <td class="sorting_1">
                                                <label class="check-box">
                                                    <input type="checkbox">
                                                    <span class="checkmark outline-secondary ms-2"></span>
                                                </label>
                                            </td>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->sizes }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->price }}</td>
                                            <td>{{ number_format($order->price*$order->quantity,2) }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>
                                                <form action="/admin/orders/{{ $order->order_id }}" method="POST"
                                                    style="display:inline;" id="order-delete-form-{{ $order->order_id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger icon-btn b-r-4 delete-btn"
                                                        id="order-delete-btn-{{ $order->order_id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-success icon-btn b-r-4"
                                                    data-bs-toggle="modal" data-bs-target="#editOrderModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="dataTables_info" id="projectTable_info" role="status" aria-live="polite">
                                Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of
                                {{ $orders->total() }} entries</div>

                            <div class="dataTables_paginate paging_simple_numbers" id="projectTable_paginate">
                                <a class="paginate_button previous {{ $orders->onFirstPage() ? 'disabled' : '' }}"
                                    href="{{ $orders->previousPageUrl() }}" id="projectTable_previous">
                                    Previous
                                </a>

                                <span>
                                    @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                        <a class="paginate_button {{ $page == $orders->currentPage() ? 'current' : '' }}"
                                            href="{{ $url }}" data-dt-idx="{{ $page - 1 }}"
                                            tabindex="0">
                                            {{ $page }}
                                        </a>
                                    @endforeach
                                </span>

                                <a class="paginate_button next {{ $orders->hasMorePages() ? '' : 'disabled' }}"
                                    href="{{ $orders->nextPageUrl() }}" id="projectTable_next">
                                    Next
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Projects Table end -->

        @if (count($orders) > 0)
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const deleteButton = document.getElementById('order-delete-btn-{{ $order->order_id }}');

                // Add event listener to handle the delete button click
                deleteButton.addEventListener('click', function() {
                    document.getElementById('order-delete-form-{{ $order->order_id }}').addEventListener(
                        'submit',
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
            
        @endif


    @endsection
