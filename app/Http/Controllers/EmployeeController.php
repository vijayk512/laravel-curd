<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\MessageBag;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function import()
    {
        Excel::import(new EmployeeImport, 'employee_data.csv');

        return redirect('/home');
    }


    public function getIndex(Request $request)
    {
        return view('employee.index');
    }

    public function getCreate(Request $request){

        return view('employee.create');
    }

    public function postCreate(Request $request){
        $errors = '';
        $status_code = 500;
        $message = '';
        $message_bag = new MessageBag;

        $request->validate([
            'emp_id' => 'required|unique:employee_data,emp_id',
            'name_prefix' => 'required',
            'first_name' => 'required',
            'middle_initial' => 'required',
            'last_name' => 'required',
            'gender' => 'required|in:M,F',
            'email' => 'required|email|unique:employee_data,email',
            'father_name' => 'required',
            'mother_name' => 'required',
            'mother_maiden' => 'required',
            'date_of_birth' => 'required|date',
            'date_of_joining' => 'required|date',
            'salary' => 'required|integer',
            'ssn_1' => ['required', 'regex:/^[0-9]{3}$/'],
            'ssn_2' => ['required', 'regex:/^[0-9]{2}$/'],
            'ssn_3' => ['required', 'regex:/^[0-9]{4}$/'],
            'phone_no_1' => ['required', 'regex:/^[0-9]{3}$/'],
            'phone_no_2' => ['required', 'regex:/^[0-9]{3}$/'],
            'phone_no_3' => ['required', 'regex:/^[0-9]{4}$/'],
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|integer',
        ]);

        $ssn = $request->ssn_1.'-'.$request->ssn_2.'-'.$request->ssn_3;
        $phone_no = $request->phone_no_1.'-'.$request->phone_no_2.'-'.$request->phone_no_3;
        try {
            Employee::create([
                'emp_id' => $request->emp_id,
                'name_prefix' => $request->name_prefix,
                'first_name' => $request->first_name,
                'middle_initial' => $request->middle_initial,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'email' => $request->email,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'mother_maiden' => $request->mother_maiden,
                'date_of_birth' => $request->date_of_birth,
                'date_of_joining' => $request->date_of_joining,
                'salary' => $request->salary,
                'ssn' => $ssn,
                'phone_no' => $phone_no,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]);

            $message = 'Employee information created successfully!';
            $status_code = 200;

        }catch (\Exception $e){
            $errors = $message_bag->add('_error_message', $e->getMessage());
        }

        return response()->json( [ 'errors' => $errors, 'message' => $message ], $status_code );
    }

    public function getEdit(Request $request, Employee $employee){
        return view('employee.edit', compact('employee'));
    }

    public function postEdit(Request $request, Employee $employee) {
        $errors = '';
        $status_code = 500;
        $message = '';
        $message_bag = new MessageBag;

        $request->validate([
            'name_prefix' => 'required',
            'first_name' => 'required',
            'middle_initial' => 'required',
            'last_name' => 'required',
            'gender' => 'required|in:M,F',
            'email' => 'required|email|unique:employee_data,email,'.$employee->id,
            'father_name' => 'required',
            'mother_name' => 'required',
            'mother_maiden' => 'required',
            'date_of_birth' => 'required|date',
            'date_of_joining' => 'required|date',
            'salary' => 'required|integer',
            'ssn_1' => ['required', 'regex:/^[0-9]{3}$/'],
            'ssn_2' => ['required', 'regex:/^[0-9]{2}$/'],
            'ssn_3' => ['required', 'regex:/^[0-9]{4}$/'],
            'phone_no_1' => ['required', 'regex:/^[0-9]{3}$/'],
            'phone_no_2' => ['required', 'regex:/^[0-9]{3}$/'],
            'phone_no_3' => ['required', 'regex:/^[0-9]{4}$/'],
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|integer',
        ]);
        $ssn = $request->ssn_1.'-'.$request->ssn_2.'-'.$request->ssn_3;
        $phone_no = $request->phone_no_1.'-'.$request->phone_no_2.'-'.$request->phone_no_3;
        $employeeData = $request->all();
        $employeeData['ssn'] = $ssn;
        $employeeData['phone_no'] = $phone_no;
        try {
            $employee->update($employeeData);
            $message = 'Employee information updated successfully!';

            $status_code = 200;
        }catch (\Exception $e){
            $errors = $message_bag->add('_error_message', $e->getMessage());
        }
        return response()->json( [ 'errors' => $errors, 'message' => $message ], $status_code );

    }

    public function getDelete(Request $request, Employee $employee) {

        return view('employee.delete', compact('employee'));
    }

    public function postDelete(Request $request, Employee $employee)
    {
        $message_bag = new MessageBag();
        $errors = '';
        $status_code = 500;
        $message = '';

        try {
            $employee->delete();
            $message = 'Employee data is deleted successfully!';
            $status_code = 200;

        } catch (\Exception $e){
            $errors = $message_bag->add('_error_message', $e->getMessage());
        }
        return response()->json( [ 'errors' => $errors, 'message' => $message ], $status_code );
    }

    public function getDetail(Request $request, Employee $employee){
        return view('employee.detail', compact('employee'));
    }

    public function getData(Request $request) {
        if ($request->ajax()) {
            return datatables()->of(Employee::query())
                ->addColumn('action', function($row){
                    $btn = '<a href="#modal" data-remote="/detail/' . $row->id . '" class="btn btn-primary btn-info btn-sm" data-toggle="modal" data-target="#modal">View</a>| <a href="#modal" data-remote="/edit/' . $row->id . '" class="edit btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Edit</a>
                                | <a href="#modal" data-remote="/delete/' . $row->id . '" class="delete btn btn-danger btn-sm" data-toggle="modal" data-target="#modal">Delete</a>';
                    return $btn;
                })
                ->editColumn('fullname', function ($row) {
                    return $row->FullName;
                })
                ->editColumn('gender', function ($row) {
                    return $row->gender == 'M' ? 'Male' : 'Female';
                })
                ->toJson();
        }
        abort(404);
    }
}