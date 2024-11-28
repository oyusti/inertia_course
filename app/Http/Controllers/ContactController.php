<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\Country;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new middleware('auth')
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filters = $request->all('search');
        

        $contacts = Contact::with('organization')
                    ->filter($filters)
                    ->latest('id')
                    ->paginate();

        return Inertia::render('Contacts/Index',compact('contacts','filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $organizations = Organization::all();
        $countries = Country::all();

        return Inertia::render('Contacts/Create', compact('organizations','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organization_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country_id' => 'required',
            'postal_code' => 'required'
        ]);

        $contact = Contact::create($data);

        return redirect()->route('contacts.edit',$contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $organizations = Organization::all();
        $countries = Country::all();

        return Inertia::render('Contacts/Edit', compact('contact','organizations','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'organization_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country_id' => 'required',
            'postal_code' => 'required'
        ]);

        $contact->update($data);
        return redirect()->route('contacts.edit', $contact);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
