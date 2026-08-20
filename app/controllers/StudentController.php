<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
class StudentController extends Controller
{
 public function index()
 {
 // Display student page
 $this->call->view('student_home.php'); 
 }
 public function profile()
 {
 // Display student profile
 $student = [
            'student_id' => '2024-00102',
            'name' => 'Flores, Dan Derick T.',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => '3F3',
            'email' => 'flores@example.com',
            'number' => '09324567123',
            'address' => 'Calapan, Or.Min',
            'hobbies' => ['Climbing', 'Webing', 'Laughing'],
];
    $this->call->view('student_profile', $student);
 }
}