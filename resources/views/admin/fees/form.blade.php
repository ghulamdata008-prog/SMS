<div class="row g-4">

    {{-- Student --}}
    <div class="col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <label class="form-label fw-semibold">
                    <i class="bi bi-person-fill text-primary me-2"></i>
                    Student
                </label>

                <select
                    name="student_id"
                    class="form-select form-select-lg @error('student_id') is-invalid @enderror">

                    <option value="">
                        Select Student
                    </option>

                    @foreach($students as $student)

                        <option
                            value="{{ $student->id }}"
                            {{ old('student_id', $fee->student_id ?? '') == $student->id ? 'selected' : '' }}>

                            {{ $student->name }}

                        </option>

                    @endforeach

                </select>

                @error('student_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

    </div>

    {{-- Class --}}
    <div class="col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <label class="form-label fw-semibold">
                    <i class="bi bi-building text-success me-2"></i>
                    Class
                </label>

                <select
                    name="class_id"
                    class="form-select form-select-lg @error('class_id') is-invalid @enderror">

                    <option value="">
                        Select Class
                    </option>

                    @foreach($classes as $class)

                        <option
                            value="{{ $class->id }}"
                            {{ old('class_id', $fee->class_id ?? '') == $class->id ? 'selected' : '' }}>

                            {{ $class->name }}

                        </option>

                    @endforeach

                </select>

                @error('class_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

    </div>

    {{-- Fee Type --}}
    <div class="col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <label class="form-label fw-semibold">
                    <i class="bi bi-wallet2 text-warning me-2"></i>
                    Fee Type
                </label>

                <select
                    name="fee_type"
                    class="form-select form-select-lg">

                    @php
                    $types=[
                        'Admission Fee',
                        'Monthly Fee',
                        'Exam Fee',
                        'Transport Fee',
                        'Library Fee',
                        'Hostel Fee',
                        'Fine',
                        'Other'
                    ];
                    @endphp

                    @foreach($types as $type)

                        <option
                            value="{{ $type }}"
                            {{ old('fee_type',$fee->fee_type ?? '')==$type ? 'selected':'' }}>

                            {{ $type }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

    </div>

    {{-- Amount --}}
    <div class="col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <label class="form-label fw-semibold">
                    <i class="bi bi-currency-dollar text-danger me-2"></i>
                    Amount
                </label>

                <input
                    type="number"
                    name="amount"
                    value="{{ old('amount',$fee->amount ?? '') }}"
                    class="form-control form-control-lg">

            </div>

        </div>

    </div>

    {{-- Due Date --}}
    <div class="col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <label class="form-label fw-semibold">
                    <i class="bi bi-calendar-event text-info me-2"></i>
                    Due Date
                </label>

                <input
                    type="date"
                    name="due_date"
                    value="{{ old('due_date',$fee->due_date ?? '') }}"
                    class="form-control form-control-lg">

            </div>

        </div>

    </div>

</div>

<hr class="my-4">

<div class="d-flex justify-content-end gap-2">

    <a href="{{ route('admin.fees.index') }}"
       class="btn btn-outline-secondary rounded-pill px-4">

        <i class="bi bi-arrow-left me-2"></i>

        Cancel

    </a>

    <button class="btn btn-primary rounded-pill px-4">

        <i class="bi bi-check-circle me-2"></i>

        Save Fee

    </button>

</div>