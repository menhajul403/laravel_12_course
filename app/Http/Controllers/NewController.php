<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index(Request $request)
    {

        $students = [
            [
                'roll' => '101',
                'name' => 'Rahim',
                'class' => 'One',
                'fee' => 1500
            ],
            [
                'roll' => '102',
                'name' => 'Karim',
                'class' => 'Two',
                'fee' => 1800
            ],
            [
                'roll' => '103',
                'name' => 'Hasan',
                'class' => 'One',
                'fee' => 1500
            ],
            [
                'roll' => '104',
                'name' => 'Jamal',
                'class' => 'Three',
                'fee' => 2000
            ],
        ];

        $roll = $request->get('roll');
        $name = $request->get('name');
        $class = $request->get('class');
        $fee = $request->get('fee');


        $filteredStudents = array_filter($students, function ($student) use ($roll, $name, $class, $fee) {
            if ($roll && $student['roll'] != $roll) {
                return false;
            }
            if ($name && strtolower($student['name']) != strtolower($name)) {
                return false;
            }
            if ($class && strtolower($student['class']) != strtolower($class)) {
                return false;
            } if ($class && strtolower($student['fee']) != strtolower($fee)) {
                return false;
            }
            return true;
        });


        $classCount = null;
        if ($request->class) {
            $classCount = count($filteredStudents);
        }

        return view('index', [
            'students' => $filteredStudents,
            'classCount' => $classCount
        ]);
    }
}
?>
