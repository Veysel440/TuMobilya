<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        return view('contact.index');
    }

    public function store(StoreContactRequest $request)
    {
        $this->contactService->create($request->validated());

        return redirect()->route('contact.index')->with('success', 'Mesajınız başarıyla gönderildi.');
    }
}
