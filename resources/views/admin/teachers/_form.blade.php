<div class="premium-form-card">

    <div class="row g-4">

        <!-- Name -->
        <div class="col-md-6">

            <label class="premium-label">
                <i class="bi bi-person-fill"></i>
                Teacher Name
            </label>

            <input
                type="text"
                name="name"
                class="form-control premium-input"
                value="{{ old('name',$teacher->user->name ?? '') }}"
                placeholder="Enter teacher name">

        </div>

        <!-- Email -->
        <div class="col-md-6">

            <label class="premium-label">
                <i class="bi bi-envelope-fill"></i>
                Email Address
            </label>

            <input
                type="email"
                name="email"
                class="form-control premium-input"
                value="{{ old('email',$teacher->user->email ?? '') }}"
                placeholder="Enter email">

        </div>

        <!-- Password -->
        <div class="col-md-6">

            <label class="premium-label">
                <i class="bi bi-lock-fill"></i>
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control premium-input"
                placeholder="Enter password">

            @if(isset($teacher))

                <small class="text-muted">
                    Leave blank if you don't want to change password.
                </small>

            @endif

        </div>

        <!-- Phone -->
        <div class="col-md-6">

            <label class="premium-label">
                <i class="bi bi-telephone-fill"></i>
                Phone
            </label>

            <input
                type="text"
                name="phone"
                class="form-control premium-input"
                value="{{ old('phone',$teacher->phone ?? '') }}"
                placeholder="03XXXXXXXXX">

        </div>

        <!-- Qualification -->
        <div class="col-md-6">

            <label class="premium-label">
                <i class="bi bi-award-fill"></i>
                Qualification
            </label>

            <input
                type="text"
                name="qualification"
                class="form-control premium-input"
                value="{{ old('qualification',$teacher->qualification ?? '') }}"
                placeholder="Enter qualification">

        </div>

        <!-- Salary -->
        <div class="col-md-6">

            <label class="premium-label">
                <i class="bi bi-cash-stack"></i>
                Salary
            </label>

            <input
                type="number"
                name="salary"
                class="form-control premium-input"
                value="{{ old('salary',$teacher->salary ?? '') }}"
                placeholder="Enter salary">

        </div>

        <!-- Subjects -->
        <div class="col-md-12">

            <label class="premium-label">
                <i class="bi bi-book-fill"></i>
                Subjects
            </label>

            <select
                name="subjects[]"
                class="form-select premium-input"
                multiple>

                @foreach($subjects as $subject)

                    <option
                        value="{{ $subject->id }}"

                        @if(isset($teacher))
                            {{ $teacher->subjects->contains($subject->id) ? 'selected' : '' }}
                        @endif>

                        {{ $subject->name }}

                    </option>

                @endforeach

            </select>

            <small class="text-muted">
                Hold Ctrl to select multiple subjects.
            </small>

        </div>

        <!-- Address -->
        <div class="col-md-12">

            <label class="premium-label">
                <i class="bi bi-geo-alt-fill"></i>
                Address
            </label>

            <textarea
                name="address"
                rows="5"
                class="form-control premium-input"
                placeholder="Enter address">{{ old('address',$teacher->address ?? '') }}</textarea>

        </div>

    </div>

    <div class="form-footer">

        <a href="{{ route('admin.teachers.index') }}"
           class="btn btn-light cancel-btn">

            <i class="bi bi-arrow-left"></i>

            Cancel

        </a>

        <button class="btn save-btn">

            <i class="bi bi-check-circle-fill"></i>

            Save Teacher

        </button>

    </div>

</div>