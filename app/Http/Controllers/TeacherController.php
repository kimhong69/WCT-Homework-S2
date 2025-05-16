<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Array to store teacher data
    private $teachers = [];

    // GET method to list all teachers
    public function getTeachers()
    {
        return response()->json($this->teachers);
    }

    // POST method to add a new teacher
    public function addTeacher(Request $request)
    {
        $teacher = $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
        ]);
        $this->teachers[] = $teacher;
        return response()->json(['message' => 'Teacher added successfully', 'teacher' => $teacher]);
    }

    // PATCH method to update teacher info
    public function updateTeacher($index, Request $request)
    {
        if (!isset($this->teachers[$index])) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        $teacher = $request->validate([
            'name' => 'sometimes|required|string',
            'subject' => 'sometimes|required|string',
        ]);
        
        $this->teachers[$index] = array_merge($this->teachers[$index], $teacher);
        return response()->json(['message' => 'Teacher updated successfully', 'teacher' => $this->teachers[$index]]);
    }

    // DELETE method to remove a teacher
    public function deleteTeacher($index)
    {
        if (!isset($this->teachers[$index])) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        unset($this->teachers[$index]);
        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
