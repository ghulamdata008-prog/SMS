@extends('layouts.app')

@section('title','Subjects')

@section('content')

<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="dashboard-header mb-4">

        <div>

            <h2 class="dashboard-title">
                Subject Management
            </h2>

            <p class="dashboard-subtitle">
                Manage all school subjects from one place.
            </p>

        </div>

        <a href="{{ route('admin.subjects.create') }}"
           class="btn btn-primary premium-add-btn">

            <i class="bi bi-plus-circle-fill me-2"></i>

            Add Subject

        </a>

    </div>


    <!-- Table Card -->

    <div class="dashboard-table-card">

        <div class="table-responsive">

            <table class="table premium-table align-middle mb-0">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Subject</th>

                    <th>Code</th>

                    <th>Class</th>

                    <th>Status</th>

                    <th class="text-center">
                        Action
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($subjects as $subject)

                    <tr>

                        <td>

                            <span class="table-id">

                                {{ $loop->iteration }}

                            </span>

                        </td>

                        <td>

                            <div class="teacher-info">

                                <div class="teacher-avatar bg-primary">

                                    {{ strtoupper(substr($subject->name,0,1)) }}

                                </div>

                                <div>

                                    <h6 class="mb-0">

                                        {{ $subject->name }}

                                    </h6>

                                    <small class="text-muted">

                                        School Subject

                                    </small>

                                </div>

                            </div>

                        </td>

                        <td>

                            <span class="badge qualification-badge">

                                {{ $subject->code }}

                            </span>

                        </td>

                        <td>

                            <span class="badge subject-badge">

                                {{ $subject->schoolClass->name }}

                            </span>

                        </td>

                        <td>

                            @if($subject->status)

                                <span class="badge bg-success px-3 py-2">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="action-buttons">
                                <a href="{{ route('admin.subjects.edit',$subject->id) }}"
                                   class="btn-action edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>
<a href="{{ route('admin.subjects.show',$subject->id) }}"
   class="btn-action view">

    <i class="bi bi-eye-fill"></i>

</a>
                                <form
                                    action="{{ route('admin.subjects.destroy',$subject->id) }}"
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

                                <!-- <a href="{{ route('admin.subjects.show',$subject->id) }}"
                                   class="action-btn view">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                                <a href="{{ route('admin.subjects.edit',$subject->id) }}"
                                   class="action-btn edit">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                <form
                                    action="{{ route('admin.subjects.destroy',$subject->id) }}"
                                    method="POST"
                                    class="delete-form d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="action-btn delete">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form> -->

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6">

                            <div class="empty-state">

                                <i class="bi bi-book-half"></i>

                                <h5>No Subjects Found</h5>

                                <p>

                                    Add your first subject.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $subjects->links() }}

    </div>

</div>

@endsection