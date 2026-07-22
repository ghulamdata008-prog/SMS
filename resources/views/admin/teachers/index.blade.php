@extends('layouts.app')

@section('title','Teachers')

@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="page-header mb-4">

        <div>
            <h2 class="page-title">Teacher Management</h2>
            <p class="page-subtitle">
                Manage all teachers from one place
            </p>
        </div>

        <a href="{{ route('admin.teachers.create') }}" class="btn premium-btn">
            <i class="bi bi-plus-circle-fill me-2"></i>
            Add Teacher
        </a>

    </div>

    <!-- Table Card -->

    <div class="dashboard-table-card">

        <div class="table-responsive">

            <table class="table premium-table align-middle mb-0">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Teacher</th>

                    <th>Phone</th>

                    <th>Qualification</th>

                    <th>Salary</th>

                    <th>Subjects</th>

                    <th class="text-center">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($teachers as $teacher)

                    <tr>

                        <td>

                            <span class="table-id">

                                {{ $loop->iteration }}

                            </span>

                        </td>

                        <td>

                            <div class="teacher-info">

                                <div class="teacher-avatar">

                                    {{ strtoupper(substr($teacher->user->name,0,1)) }}

                                </div>

                                <div>

                                    <h6>

                                        {{ $teacher->user->name }}

                                    </h6>

                                    <small>

                                        {{ $teacher->user->email }}

                                    </small>

                                </div>

                            </div>

                        </td>

                        <td>

                            {{ $teacher->phone }}

                        </td>

                        <td>

                            <span class="badge qualification-badge">

                                {{ $teacher->qualification }}

                            </span>

                        </td>

                        <td>

                            <strong>

                                Rs. {{ number_format($teacher->salary,2) }}

                            </strong>

                        </td>

                        <td>

                            @foreach($teacher->subjects as $subject)

                                <span class="badge subject-badge">

                                    {{ $subject->name }}

                                </span>

                            @endforeach

                        </td>

                        <td>

                            <div class="action-buttons">

                                <!-- <a href="{{ route('admin.teachers.show',$teacher->id) }}"
                                   class="action-btn view">

                                    <i class="bi bi-eye-fill"></i>

                                </a> -->
<a href="{{ route('admin.teachers.show',$teacher) }}"
   class="btn-action view">

    <i class="bi bi-eye-fill"></i>

</a>

 <a href="{{ route('admin.teachers.edit',$teacher) }}"
                                   class="btn-action edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>
                                  <form
                                    action="{{ route('admin.teachers.destroy',$teacher) }}"
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

                                <!-- <form
                                    action="{{ route('admin.teachers.destroy',$teacher) }}"
                                    method="POST"
                                    class="delete-form m-0">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn delete">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form> -->

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-5">

                            <div class="empty-state">

                                <i class="bi bi-person-badge-fill"></i>

                                <h5>No Teachers Found</h5>

                                <p class="mb-0">
                                    Add your first teacher.
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

        {{ $teachers->links() }}

    </div>

</div>

@endsection