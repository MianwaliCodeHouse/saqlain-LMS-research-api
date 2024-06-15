<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterationController extends Controller
{
    // Assuming this code is in a controller method or a route closure
public function store(Request $request)
{
    // Retrieve the x-www-urlencoded request body
    $requestData = $request->getContent();

    // Parse the request body to get key-value pairs
    parse_str($requestData, $parsedData);

    $encodedString = $parsedData['data'];

    // Decode the base64 string
    $jsonString = base64_decode($encodedString);

    // Decode the JSON string into an associative array
    $data = json_decode($jsonString, true);

   


    try {
        // Establish a database connection using Laravel's DB facade
        DB::beginTransaction();

        // Prepare the SQL statement
        DB::table('student_details')->insert([
            'form_no' => $data['StudentProfile']['Form No'],
            'vu_registration_no' => $data['StudentProfile']['VU Registration No'],
            'study_program' => $data['StudentProfile']['Study Program'],
            'admission_date' => $data['StudentProfile']['Admission Date'],
            'virtual_campus_code' => $data['StudentProfile']['Virtual Campus Code'],
            'current_semester_no' => $data['StudentProfile']['Current Semester No'],
            'fathers_name' => $data['PersonalInformation']['Father\'s Name'],
            'gender' => $data['PersonalInformation']['Gender'],
            'birth_date' => $data['PersonalInformation']['Birth Date'],
            'cnic' => $data['PersonalInformation']['CNIC'],
            'permanent_address' => $data['PersonalInformation']['Permanent Address'],
            'mailing_address' => $data['PersonalInformation']['Mailing Address'],
            'student_email' => $data['PersonalInformation']['Student Email'],
            'phone_res' => $data['PersonalInformation']['Phone (Res)'],
            'phone_mobile' => $data['PersonalInformation']['Phone (Mobile)'],
            'marks_in_matric' => $data['AcademicRecord']['Marks in Matric'],
            'marks_in_intermediate' => $data['AcademicRecord']['Marks in Intermediate'],
            'bachelor_degree' => $data['AcademicRecord']['Bachelor Degree'],
            'marks_in_bachelor' => $data['AcademicRecord']['Marks in Bachelor'],
            'master_degree' => $data['AcademicRecord']['Master Degree'],
            'marks_in_master' => $data['AcademicRecord']['Marks in Master'],
            'name' => $data['StudentProfileDetails']['Name'],
            'student_id' => $data['StudentProfileDetails']['Student ID'],
            'vu_email' => $data['StudentProfileDetails']['VU Email'],
            'base64_image' => $data['ProfilePicture']['base64Image'],
        ]);

        // Commit the transaction
        DB::commit();

        // Output success message or handle further data insertion for other sections

    } catch (\Exception $e) {
        // Rollback the transaction in case of an error
        DB::rollBack();

        // Output error message or handle the error gracefully
        echo "Error: " . $e->getMessage();
    }
}
}
