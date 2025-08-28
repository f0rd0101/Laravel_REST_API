<?php

namespace App\Services;

use App\Models\Contact;

class ContactService {


    public function getAllContacts() {
        return auth()->user()->contacts()->get();
    }


    public function createContact(array $data) {
        // Привязываем user_id автоматически
        $data['user_id'] = auth()->id();
        return Contact::create($data);
    }


    public function deleteContact($id) {
        $contact = auth()->user()->contacts()->find($id);
        if (!$contact) {
            return false;
        }
        $contact->delete();
        return true;
    }


    public function getContactById($id) {
        return auth()->user()->contacts()->find($id);
    }


    public function getContactByPhone($phone) {
        return auth()->user()->contacts()->where('phone', $phone)->first();
    }

}
