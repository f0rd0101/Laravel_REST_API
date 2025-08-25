<?php

namespace App\Http\Controllers;
use App\Services\ContactService;

use Illuminate\Http\Request;
class ContactsController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService){
        $this->contactService = $contactService;
    }

    public function index(){
        $users = $this->contactService->getAllContacts();
        return response()->json($users);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $contact = $this->contactService->createContact($data);

        return response()->json([
            'message' => 'Contact created successfully!',
            'data' => $contact
        ], 201);
    }

    public function delete($id){
        $contactDeleted = $this->contactService->deleteContact($id);

        if($contactDeleted){
         return response()->json(['message'=>'User Deleted Successfully!'],200);

        }
       return response()->json(['message'=>"User with id {$id} is not found"],404);
    }
}
