<?php

namespace App\Http\Controllers;
use App\Services\ContactService;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
class ContactsController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService){
        $this->contactService = $contactService;
    }

    public function index(){
        $contacts = $this->contactService->getAllContacts();
        return response()->json($contacts);
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

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

    public function show($id){
             if(!ctype_digit($id)){
                 return response()->json([
                    'message'=>"Invalid ID format"
        ], 400);
    }
        $contact = $this->contactService->getContactById($id);


        if(!$contact){
              return response()->json([
                'message'=>"Contact with id {$id} is not found"],404);
        }
        return response()->json([
            'message'=>"Contact with id {$id} found successfully",
            'data' => $contact
        ],200);

    }
    public function phoneFind($phoneContact){

        $contact = $this->contactService->getContactByPhone($phoneContact);

        if(!$contact){
                return response()->json([
                    'message'=>"Contact with phone {$phoneContact} is not found"],404);

        }
         return response()->json([
            'message'=>"Contact with phone {$phoneContact} found successfully",
            'data' => $contact
        ],200);

    }
}



