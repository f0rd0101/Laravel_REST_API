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
}
