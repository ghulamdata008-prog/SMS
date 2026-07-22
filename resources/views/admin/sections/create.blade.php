@extends('layouts.app')

@section('title','Add Section')

@section('content')

<div class="container-fluid py-4">

    <div class="page-header mb-4">

        <div>

            <h2 class="page-title">
                <i class="bi bi-diagram-3-fill me-2 text-primary"></i>
                Add Section
            </h2>

            <p class="text-muted mb-0">
                Create a new section for your class.
            </p>

        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="premium-form-card">

                <div class="premium-form-header">

                    <h5 class="mb-0">
                        Section Information
                    </h5>

                </div>

                <div class="premium-form-body">

                    <form action="{{ route('admin.sections.store') }}" method="POST">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-building me-2 text-primary"></i>

                                Class

                            </label>

                            <select
                                name="class_id"
                                class="form-select premium-input">

                                <option value="">Select Class</option>

                                @foreach($classes as $class)

                                    <option value="{{ $class->id }}"
                                        {{ old('class_id', $section->class_id ?? '') == $class->id ? 'selected' : '' }}>

                                        {{ $class->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-grid-3x3-gap-fill me-2 text-success"></i>

                                Section Name

                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control premium-input"
                                placeholder="Example: A"
                                value="{{ old('name') }}">

                        </div>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('admin.sections.index') }}"
                               class="btn btn-light premium-btn">

                                <i class="bi bi-arrow-left"></i>

                                Cancel

                            </a>

                            <button class="btn btn-primary premium-btn">

                                <i class="bi bi-check-circle-fill"></i>

                                Save Section

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection