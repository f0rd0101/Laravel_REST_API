<?php

namespace App\Services;
use App\Models\Contact;


class ContactService{
public function getAllContacts(){
   return Contact::all();
}

public function createContact(array $data){
   return Contact::create($data);
}

};
