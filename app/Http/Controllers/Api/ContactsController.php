<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Lead;

class ContactsController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data, [
            'name'=> 'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'erros'=>$validator->errors()
            ]);
        }
        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        $mail = new NewContact();
        Mail::to('info@boolpress.it')->send($mail);

        return response()->json([
            'success'=>true,
        ]);
    }
}
