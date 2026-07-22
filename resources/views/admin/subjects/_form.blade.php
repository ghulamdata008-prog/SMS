<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">Subject Name</label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name',$subject->name ?? '') }}">

        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">Subject Code</label>

        <input
            type="text"
            name="code"
            class="form-control @error('code') is-invalid @enderror"
            value="{{ old('code',$subject->code ?? '') }}">

        @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">Class</label>

        <select
            name="class_id"
            class="form-select @error('class_id') is-invalid @enderror">

            <option value="">Select Class</option>

            @foreach($classes as $class)

                <option
                    value="{{ $class->id }}"
                    {{ old('class_id',$subject->class_id ?? '')==$class->id ? 'selected' : '' }}>

                    {{ $class->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">Status</label>

        <select
            name="status"
            class="form-select">

            <option value="1"
                {{ old('status',$subject->status ?? 1)==1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status',$subject->status ?? 1)==0 ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

    </div>

</div>

<div class="text-end">

    <a href="{{ route('admin.subjects.index') }}"
       class="btn btn-secondary">

        Cancel

    </a>

    <button class="btn btn-primary">

        Save Subject

    </button>

</div>