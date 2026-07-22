@extends('layouts.app')

@section('title','Sections')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="page-title">
                Section Management
            </h2>

            <p class="page-subtitle">
                Manage all class sections
            </p>

        </div>

        <a href="{{ route('admin.sections.create') }}" class="btn btn-primary add-btn">

            <i class="bi bi-plus-circle-fill me-2"></i>

            Add Section

        </a>

    </div>

    <!-- Table Card -->

    <div class="dashboard-table-card">

        <div class="table-responsive">

            <table class="table premium-table align-middle mb-0">

                <thead>

                    <tr>

                        <th width="80">#</th>

                        <th>Class</th>

                        <th>Section</th>

                        <th width="220" class="text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($sections as $section)

                    <tr>

                        <td>

                            <span class="table-id">

                                {{ $loop->iteration }}

                            </span>

                        </td>

                        <td>

                            <span class="badge class-badge">

                                {{ optional($section->schoolClass)->name }}

                            </span>

                        </td>

                        <td>

                            <strong>

                                {{ $section->name }}

                            </strong>

                        </td>

                        <td>

                            <div class="action-buttons justify-content-center">

<a href="{{ route('admin.sections.show',$section) }}"
   class="btn-action view">

    <i class="bi bi-eye-fill"></i>

</a>

                                <a href="{{ route('admin.sections.edit',$section) }}"
                                   class="btn-action edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

  <form
                                    action="{{ route('admin.sections.destroy',$section) }}"
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

                        <td colspan="4" class="text-center py-5">

                            <div class="empty-state">

                                <i class="bi bi-diagram-3 fs-1 text-primary"></i>

                                <h5 class="mt-3">
                                    No Sections Found
                                </h5>

                                <p class="text-muted">
                                    Click "Add Section" to create your first section.
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