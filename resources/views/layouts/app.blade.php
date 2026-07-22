<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'School Management System')</title>

    @vite([
        'resources/css/app.css',
       
        'resources/js/app.js',
        
    ])

    @stack('styles')
</head>

<body>

<div class="wrapper">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    <div class="main">

        {{-- Navbar --}}
        @include('layouts.navbar')

        <main class="content">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Error Message --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}

                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @yield('content')

        </main>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>

</div>

@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
document.querySelectorAll('.delete-form').forEach(function(form){

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({
            title: 'Delete Record?',
            text: "You won't be able to recover it!",
            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',

            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',

            reverseButtons: true,

            background: '#fff',

            customClass:{
                popup:'shadow-lg rounded-4'
            }

        }).then((result)=>{

            if(result.isConfirmed){
                form.submit();
            }

        });

    });

});










document.addEventListener("DOMContentLoaded",function(){


const search = document.getElementById("globalSearch");

const results = document.getElementById("searchResults");



if(search){



search.addEventListener("keyup",function(){



let value = this.value.trim();



if(value.length < 2){

results.innerHTML="";

return;

}




fetch("/admin/global-search?search="+value)



.then(res=>res.json())



.then(data=>{


let html="";



data.students.forEach(student=>{


html += `

<a href="/admin/students/${student.id}"
class="search-item">


<i class="bi bi-person"></i>

Student :
${student.name}


</a>

`;


});





data.teachers.forEach(teacher=>{


html += `

<a href="/admin/teachers/${teacher.id}"
class="search-item">


<i class="bi bi-person-badge"></i>

Teacher :
${teacher.name}


</a>

`;

});





data.payments.forEach(payment=>{


html += `

<a href="/admin/payments/${payment.id}"
class="search-item">


<i class="bi bi-wallet"></i>

Payment :
Rs ${payment.amount}


</a>

`;

});






if(html==""){


html=`

<div class="p-3 text-muted">

No Result Found

</div>

`;


}



results.innerHTML=html;



})



.catch(error=>{


console.log(error);


});



});


}



});





</script>
</body>

</html>