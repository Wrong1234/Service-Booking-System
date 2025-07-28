<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;



Route::prefix('users')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get("/test", function(){
  return "test";
});


// Route::get('/test', function(){
//     return "test";
// });

// //course routing
// Route::prefix('courses')->group(function () {
//     Route::get('/', [CourseController::class, 'getAllCourse']);
//     Route::get('/{id}', [CourseController::class, 'getCourseById']);
// });

// // Departments
// Route::prefix('departments')->group(function () {
//     Route::get('/', [DepartmentController::class, 'getDepartment']);
//     Route::get('{id}', [DepartmentController::class, 'getDepartmentById']);
// });

// //Programs
// Route::prefix('programs')->group(function () {
//     Route::get('/', [ProgramController::class, 'getAllProgram']);
//     Route::get('{id}', [ProgramController::class, 'getProgramById']);
// });

// //Faculty_members
// Route::prefix('faculty_members')->group(function () {
//     Route::get('/', [FacultyMemberController::class, 'getFacultyMember']);
//     Route::get('{id}', [FacultyMemberController::class, 'getFacultyMemberById']);
// });

// //Admission information
// Route::prefix('admission_applications')->group(function () {
//     Route::get('/', [AdmissionApplicationController::class, 'getAdmissionList']);
//     Route::get('{id}', [AdmissionApplicationController::class, 'getAdmissionById']);
// });


// //Academic Calendars Informations
// Route::prefix('academic_calendars')->group(function () {
//     Route::get('/', [AcademicClendarController::class, 'getAcademicCalendarsList']);
//     Route::get('{id}', [AcademicClendarController::class, 'getExamId']);
// });


// //Student information
// Route::prefix('students')->group(function () {
//     Route::get('/', [StudentController::class, 'getAllStudent']);
//     Route::get('{id}', [StudentController::class, 'getSingleStudent']);
// });

// //Home page routing
// Route::prefix('homes')->group(function () {
//     Route::get('/', [HomePageController::class, 'getHomePage']);
//     Route::get('{id}', [HomePageController::class, 'homeSingleSection']);
// });

// //About page routing
// Route::prefix('abouts')->group(function () {
//     Route::get('/', [AboutPageController::class, 'getAboutPage']);
//     Route::get('{id}', [AboutPageController::class, 'aboutSingleSection']);
// });

// //Contact page route
// Route::prefix('contact_pages')->group(function () {
//     Route::get('/', [ContactPageController::class, 'getContactPage']);
//     Route::get('{id}', [ContactPageController::class, 'contactSingleSection']);
// });

// //Department page routing
// Route::prefix('department_pages')->group(function () {
//     Route::get('/', [DepartmentPageController::class, 'getDepartmentPage']);
//     Route::get('{id}', [DepartmentPageController::class, 'departmentSingleSection']);
// });

// //Library page Routing
// Route::prefix('library_pages')->group(function () {
//     Route::get('/', [LibraryPageController::class, 'getLibraryPage']);
//     Route::get('{id}', [LibraryPageController::class, 'librarySingleSection']);
// });

// //Lab page routing
// Route::prefix('lab_pages')->group(function () {
//     Route::get('/', [LabPageController::class, 'getLabPage']);
//     Route::get('{id}', [LabPageController::class, 'labSingleSection']);
// });


