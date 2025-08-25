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

public function deleteContact($id){
 $contact = Contact::find($id);
 if(!$contact){
  return false;
 }
 $contact->delete();
 return true;

}
public function getContactById($id){
    return $contact = Contact::find($id);
}

};
