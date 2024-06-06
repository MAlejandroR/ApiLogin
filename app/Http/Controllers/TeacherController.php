<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Resources\TeacherCollection;
use App\Http\Resources\TeacherResource;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return new TeacherCollection($teachers);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = new Teacher($request->input("data.attributes"));
        $teacher->save();
        return new TeacherResource($teacher);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $resource = Teacher::find($id);
        info ($resource);

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
        return new TeacherResource($resource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
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
        $teacher->update($request->input("data.attributes"));

        return new TeacherResource($teacher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json(null, 204);
    }
}
