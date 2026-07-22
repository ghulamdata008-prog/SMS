<div class="premium-form-card">

    <div class="form-header">

        <div class="form-icon">
            <i class="bi bi-building-fill"></i>
        </div>

        <div>
            <h4>{{ isset($class) ? 'Edit Class' : 'Create New Class' }}</h4>
            <p>Enter class information below.</p>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12 mb-4">

            <label class="premium-label">

                Class Name
                <span class="text-danger">*</span>

            </label>

            <div class="input-group premium-input-group">

                <span class="input-group-text">

                    <i class="bi bi-building"></i>

                </span>

                <input
                    type="text"
                    name="name"
                    class="form-control premium-input"
                    value="{{ old('name', $class->name ?? '') }}"
                    placeholder="Enter Class Name">

            </div>

        </div>

    </div>

    <div class="d-flex justify-content-end gap-3">

        <a href="{{ route('admin.classes.index') }}"
           class="btn btn-light premium-cancel">

            <i class="bi bi-arrow-left-circle me-2"></i>

            Cancel

        </a>

        <button type="submit"
                class="btn premium-save">

            <i class="bi bi-check-circle-fill me-2"></i>

            Save Class

        </button>

    </div>

</div>