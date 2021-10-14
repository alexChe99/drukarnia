<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactSubmit;
class ContactController extends Controller
{
    public function submit(Request $req){
        $validation = $req->validate([
            'name'=>'required|min:3|max:20',
            'phone'=>'required|min:10|max:13',
        ]);
        $contactsubmit = new ContactSubmit;
        $contactsubmit -> name = $req->input('name');
        $contactsubmit -> phone = $req->input('phone');

        $contactsubmit->save();
        return redirect()->route('home')->with('success', 'Дякуємо! Ваша завка надіслана. Ми Вам невдовзі зателефонуємо! ');
    }
}
