<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Services\ContactService;
use App\Helpers\ActivityLogger;

class ContactsController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(StoreContactRequest $request)
    {
        $contact = $this->contactService->create($request->validated());

        ActivityLogger::log('Yeni mesaj eklendi', 'Contact', $contact->id);

        return redirect()->route('admin.contact.index')->with('success', 'Mesaj başarıyla kaydedildi.');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $this->contactService->update($contact, $request->validated());

        return redirect()->route('admin.contact.index')->with('success', 'Mesaj başarıyla güncellendi.');
    }

    public function destroy(Contact $contact)
    {
        $this->contactService->delete($contact);

        return redirect()->route('admin.contact.index')->with('success', 'Mesaj başarıyla silindi.');
    }
}
