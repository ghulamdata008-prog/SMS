<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Payment;



class SearchController extends Controller
{


public function search(Request $request)
{

    $search = $request->search;


    return response()->json([

        'students'=>Student::where('name','LIKE',"%{$search}%")
            ->limit(5)
            ->get(),


        'teachers'=>Teacher::where('name','LIKE',"%{$search}%")
            ->limit(5)
            ->get(),


        'payments'=>Payment::where('transaction_id','LIKE',"%{$search}%")
            ->limit(5)
            ->get(),

    ]);

}


}