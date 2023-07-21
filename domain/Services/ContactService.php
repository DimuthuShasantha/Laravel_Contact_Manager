<?php

namespace domain\Services;

use App\Models\Contact;

class ContactService
{
  protected $contact;

  public function __construct()
  {
    $this->contact = new Contact();
  }

  public function store ($data)
  {
    $this->contact->create($data);
  }

  public function all ()
  {
    return $this->contact->orderBy('asc')->paginate(6);
  }

  public function get ($contact_id)
  {
    return $this->contact->find($contact_id);
  }

  public function delete ($contact_id)
  {
    $contact = $this->contact->find($contact_id);
    $contact->delete();
  }

  public function update (array $data, $contact_id)
  {
    $contact = $this->contact->find($contact_id);
    $contact->update($this->edit($contact, $data));
  }

  protected function edit (Contact $contact , $data)
  {
    return array_merge($contact->toArray(), $data);
  }

  public function search($query)
  {
    if (!$query) {
        return $this->contact->paginate(6);
    }
    return $this->contact->where('name', 'like', "%{$query}%")
                        ->orWhere('mobile', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%")
                        ->paginate(6);
  }
}