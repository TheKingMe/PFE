<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class paymentController extends Controller
{
    public function index($id)
    {
        $user = auth()->user();

        return view('payment',compact('id'));
    } 
    public function store(Request $request,$id)
{
    $user = auth()->user();

    $courseId = $id;

    $data = $request->validate([
        'card_number' => ['required', 'digits:16'],
        'MM' => ['required', 'digits:2'],
        'YY' => ['required', 'digits:2'],
        'CVC' => ['required', 'digits:3'],
        'Cardholder' => ['required', 'string', 'max:255'],
        'amount' => ['required', 'numeric'],
    ]);

    $payment = new Payment();
    $payment->user_id = auth()->id();
    $payment->card_number = $data['card_number'];
    $payment->expiration_month = $data['MM'];
    $payment->expiration_year = $data['YY'];
    $payment->cvc = $data['CVC'];
    $payment->cardholder_name = $data['Cardholder'];
    $payment->amount = $data['amount'];
    $payment->currency = 'DH';
    $payment->payment_method = 'credit card';
    $payment->status = 'pending'; // or any initial status
    $payment->save();
    $courseId = $id;
    
        // Check if the user is already enrolled in the course
        if ($user->courses()->where('course_id', $courseId)->exists()) {
            return redirect()->route('courses.show',['id'=>$courseId])->with('error', 'You are already enrolled in this course.');
        }
    
        // Enroll the user in the course
        $user->courses()->attach($courseId);

        return redirect()->route('courses.show', ['id' => $courseId])->with('status', 'Payment processed successfully!');
    }
}
