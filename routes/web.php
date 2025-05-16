<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

// Student controller

$students = [
    1 => ['id' => 1, 'name' => 'John Wick', 'age' => 20, 'grade' => 'A'],
    2 => ['id' => 2, 'name' => 'Alice', 'age' => 21, 'grade' => 'B'],
    3 => ['id' => 3, 'name' => 'Bob', 'age' => 22, 'grade' => 'C'],
];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});


Route::get('/students', function () use ($students) {
    // return response()->json([
    //     ['id' => 1, 'name' => 'John Wick', 'age' => 20, 'grade' => 'A'],
    //     ['id' => 2, 'name' => 'Alice', 'age' => 21, 'grade' => 'B'],
    //     ['id' => 3, 'name' => 'Bob', 'age' => 22, 'grade' => 'C'],
    // ]);

    return response()->json(array_values($students));
});

Route::get('/students/{id}', function ($id) use ($students) {
    // $students = [
    //     1 => ['id' => 1, 'name' => 'John Wick', 'age' => 20, 'grade' => 'A'],
    //     2 => ['id' => 2, 'name' => 'Alice', 'age' => 21, 'grade' => 'B'],
    //     3 => ['id' => 3, 'name' => 'Bob', 'age' => 22, 'grade' => 'C'],
    // ];

    if (!isset($students[$id])) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    return response()->json($students[$id]);
});


Route::post('/students', function (Request $request) use (&$studentData) {
    // Get student data from the request
    $student = [
        'id' => $request->input('id'),
        'name' => $request->input('name'),
        'age' => $request->input('age'),
        'grade' => $request->input('grade'),
    ];

    // Append the new student to the studentData array
    $studentData[] = $student;

    // Return the student data as JSON
    return response()->json([
        'message' => 'Data stored in array',
        'students' => $studentData
    ]);
});

Route::patch('/students/{id}', function (Request $request, $id) use (&$students) {
    if (!isset($students[$id])) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    $data = $request->only(['name', 'age', 'grade']);
    $students[$id] = array_merge($students[$id], $data);

    return response()->json($students[$id]);
});

// DELETE student by ID
Route::delete('/students/{id}', function ($id) use (&$students) {
    if (!isset($students[$id])) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    unset($students[$id]);

    return response()->json(['message' => 'Student deleted']);
});

// Teachers Controller

$teachers = [
    1 => ['id' => 1, 'name' => 'John Doe', 'age' => 40, 'subject' => 'Math'],
    2 => ['id' => 2, 'name' => 'Alice Smith', 'age' => 35, 'subject' => 'Science'],
    3 => ['id' => 3, 'name' => 'Bob Johnson', 'age' => 45, 'subject' => 'English'],
];

Route::get('/teachers', function () use ($teachers) {
    return response()->json(array_values($teachers));
});

// GET teacher by ID
Route::get('/teachers/{id}', function ($id) use ($teachers) {
    if (!isset($teachers[$id])) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }

    return response()->json($teachers[$id]);
});

// Store added teachers (note: not persistent)
$teacherData = $teachers; // start with existing data

// POST add new teacher
Route::post('/teachers', function (Request $request) use (&$teacherData) {
    $teacher = [
        'id' => $request->input('id'),
        'name' => $request->input('name'),
        'age' => $request->input('age'),
        'subject' => $request->input('subject'),
    ];

    $teacherData[$teacher['id']] = $teacher;

    return response()->json([
        'message' => 'Teacher added to array',
        'teachers' => array_values($teacherData),
    ]);
});

// PATCH update teacher
Route::patch('/teachers/{id}', function (Request $request, $id) use (&$teacherData) {
    if (!isset($teacherData[$id])) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }

    $data = $request->only(['name', 'age', 'subject']);
    $teacherData[$id] = array_merge($teacherData[$id], $data);

    return response()->json($teacherData[$id]);
});

// DELETE teacher
Route::delete('/teachers/{id}', function ($id) use (&$teacherData) {
    if (!isset($teacherData[$id])) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }

    unset($teacherData[$id]);

    return response()->json(['message' => 'Teacher deleted']);
});

