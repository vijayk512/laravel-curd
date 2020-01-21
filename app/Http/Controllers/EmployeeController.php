<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function import()
    {
        Excel::import(new EmployeeImport, 'employee_data.csv');

        return redirect('/')->with('success', 'All good!');
    }
}