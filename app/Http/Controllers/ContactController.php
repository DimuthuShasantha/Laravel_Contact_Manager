<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use domain\Facades\ContactFacade;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    $response['contacts'] = ContactFacade::all();
    return view('pages.index')->with($response);
  }

  public function store(Request $request)
  {
    ContactFacade::store($request->all());
    return redirect()->back();
  }

  public function edit(Request $request)
  {
    $response['contact'] = ContactFacade::get($request['contact_id']);
    return view('pages.edit')->with($response);
  }

  public function update(Request $request, $contact_id)
  {
    ContactFacade::update($request->all(), $contact_id);
    return redirect()->back();
  }

  public function delete($contact_id)
  {
    ContactFacade::delete($contact_id);
    return redirect()->back();
  }

  public function search(Request $request)
  {
    $searchQuery = $request->input('search');
    $response['contacts'] = ContactFacade::search($searchQuery);
    return view('pages.index')->with($response);
  }
}