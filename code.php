<?php  
if ($students = DB::table('students')
            ->where('studentindex', '=', $studentindex)->exists()
        ) {
            $department = Department::latest()->get();
            $students = DB::table('students')
                ->where('studentindex', '=', $studentindex)
                ->get();
            return view('register.registerform', ['studentselected' => $students, 'departments' => $department,]);
        }


        if ($students = DB::table('students')
            ->where('studentindex', '=', $studentindex)->doesntExist()
        ) {
            return redirect('/studentregister')
                ->withinput()
                ->witherrors("sorry this student index doesnt exisit");
            // return view('register.registerform', ['studentselected' => $students, 'departments' => $department,]);
        }
?>
