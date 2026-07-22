@extends('layouts.app')

@section('title','Classes')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="dashboard-header mb-4">

        <div>
            <h2 class="page-title">
                Class Management
            </h2>

            <p class="page-subtitle">
                Manage all school classes from one place.
            </p>
        </div>

        <a href="{{ route('admin.classes.create') }}" class="premium-btn">

            <i class="bi bi-plus-circle-fill me-2"></i>

            Add Class

        </a>

    </div>

    <!-- Table Card -->

    <div class="dashboard-table-card">

        <div class="table-responsive">

            <table class="table premium-table align-middle mb-0">

                <thead>

                <tr>

                    <th width="80">#</th>

                    <th>Class Name</th>

                    <th class="text-center" width="220">
                        Actions
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($classes as $class)

                    <tr>

                        <td>

                            <span class="table-id">

                                {{ $loop->iteration }}

                            </span>

                        </td>

                        <td>

                            <div class="class-info">

                                <div class="class-icon">

                                    <i class="bi bi-building-fill"></i>

                                </div>

                                <div>

                                    <h6>

                                        {{ $class->name }}

                                    </h6>

                                    <small>

                                        School Class

                                    </small>

                                </div>

                            </div>

                        </td>

                        <td>

                            <div class="action-buttons justify-content-center">

                                <a href="{{ route('admin.classes.edit',$class) }}"
                                   class="btn-action edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>
<a href="{{ route('admin.classes.show',$class) }}"
   class="btn-action view">

    <i class="bi bi-eye-fill"></i>

</a>
                                <form
                                    action="{{ route('admin.classes.destroy',$class) }}"
                                    method="POST"
                                    class="delete-form d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action delete">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3">

                            <div class="empty-state">

                                <i class="bi bi-building fs-1"></i>

                                <h5 class="mt-3">

                                    No Classes Found

                                </h5>

                                <p>

                                    Click "Add Class" to create your first class.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection