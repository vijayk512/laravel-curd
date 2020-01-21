<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'emp_id' => $row[0],
            'name_prefix' => $row[1],
            'first_name' => $row[2],
            'middle_initial' => $row[3],
            'last_name' => $row[4],
            'gender' => $row[5],
            'email' => $row[6],
            'father_name' => $row[7],
            'mother_name' => $row[8],
            'mother_maiden' => $row[9],
            'date_of_birth' => $row[10],
            'date_of_joining' => $row[11],
            'salary' => $row[12],
            'ssn' => $row[13],
            'phone_no' => $row[14],
            'city' => $row[15],
            'state' => $row[16],
            'zip' => $row[17],
        ]);
    }
}
