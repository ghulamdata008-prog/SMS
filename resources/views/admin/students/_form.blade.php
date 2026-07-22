<div class="premium-form">

<div class="row g-4">

    {{-- Name --}}
    <div class="col-md-6">

        <label class="premium-label">
            Student Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="name"
            class="form-control premium-input @error('name') is-invalid @enderror"
            value="{{ old('name', $student->name ?? '') }}"
            placeholder="Enter student name">

        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>


    {{-- Email --}}
    <div class="col-md-6">

        <label class="premium-label">
            Email <span class="text-danger">*</span>
        </label>

        <input
            type="email"
            name="email"
            class="form-control premium-input @error('email') is-invalid @enderror"
            value="{{ old('email', $student->email ?? '') }}"
            placeholder="Enter email">

        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>
{{-- Password --}}
<div class="col-md-6">

    <label class="premium-label">
        Password <span class="text-danger">*</span>
    </label>

    <input
        type="password"
        name="password"
        class="form-control premium-input @error('password') is-invalid @enderror"
        placeholder="Enter password">

    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

    {{-- Phone --}}
    <div class="col-md-6">

        <label class="premium-label">
            Phone
        </label>

        <input
            type="text"
            name="phone"
            class="form-control premium-input @error('phone') is-invalid @enderror"
            value="{{ old('phone', $student->phone ?? '') }}"
            placeholder="03XXXXXXXXX">

        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>


    {{-- Class --}}
    <div class="col-md-6">

        <label class="premium-label">
            Class
        </label>

        <select
            id="class_id"
            name="class_id"
            class="form-select premium-input">

            <option value="">Select Class</option>

            @foreach($classes as $class)

                <option value="{{ $class->id }}">
                    {{ $class->name }}
                </option>

            @endforeach

        </select>

    </div>


    {{-- Section --}}
    <div class="col-md-6">

        <label class="premium-label">
            Section
        </label>

        <select
            id="section_id"
            name="section_id"
            class="form-select premium-input">

            <option value="">Select Section</option>

        </select>

    </div>


    {{-- Address --}}
    <div class="col-md-12">

        <label class="premium-label">
            Address
        </label>

        <textarea
            name="address"
            rows="5"
            class="form-control premium-input @error('address') is-invalid @enderror"
            placeholder="Enter address">{{ old('address', $student->address ?? '') }}</textarea>

        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>


    {{-- Profile Image --}}
    <div class="col-md-6">

        <label class="premium-label">
            Profile Image
        </label>

        <input
            type="file"
            name="profile_image"
            class="form-control premium-input @error('profile_image') is-invalid @enderror">

        @error('profile_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @isset($student)

            @if($student->profile_image)

                <img
                    src="{{ asset('storage/'.$student->profile_image) }}"
                    class="preview-img mt-3">

            @endif

        @endisset

    </div>

</div>


<div class="form-footer">

    <a href="{{ route('admin.students.index') }}"
       class="btn btn-light btn-cancel">

        Cancel

    </a>

    <button type="submit"
            class="btn btn-save">

        <i class="bi bi-check-circle-fill me-2"></i>

        Save Student

    </button>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$('#class_id').change(function(){

    let class_id=$(this).val();

    $('#section_id').html('<option>Loading...</option>');

    $.get('/admin/get-sections/'+class_id,function(data){

        let options='<option value="">Select Section</option>';

        data.forEach(function(section){

            options+='<option value="'+section.id+'">'+section.name+'</option>';

        });

        $('#section_id').html(options);

    });

});

</script>