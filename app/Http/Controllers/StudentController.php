<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnoResource;
use App\Http\Resources\StudentCollection;
use App\Models\Alumno;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return new StudentCollection($students);

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alumno = new Student($request->input("data.attributes"));
        $alumno->save();
        return new StudentResource($alumno);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $resource = Student::find($id);
        if (!$resource) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title' => 'Resource Not Found',
                        'detail' => 'The requested resource does not exist or could not be found.'
                    ]
                ]
            ], 404);
        }
        return new StudentResource($resource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $student = Alumno::find($id);
        if (!$student) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title' => 'Resource Not Found',
                        'detail' => 'The requested resource does not exist or could not be found.'
                    ]
                ]
            ], 404);
        }
        $student->update($request->input("data.attributes"));

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }
}
