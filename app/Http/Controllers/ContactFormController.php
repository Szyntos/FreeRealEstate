<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    // Methods accessible by all users
    public function create()
    {
        Log::info('ContactFormController@create: User creating a contact form.');
        return view('contact_forms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Log::info('ContactFormController@store: User storing a contact form.', ['user_id' => Auth::id(), 'message' => $request->message]);
        ContactForm::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('contact_forms.create')->with('status', 'Your message has been sent.');
    }

    public function show(ContactForm $contactForm)
    {
        if (Auth::id() !== $contactForm->user_id && !Auth::user()->is_admin) {
            Log::warning('ContactFormController@show: Unauthorized access attempt.', ['contact_form_id' => $contactForm->id, 'user_id' => Auth::id()]);
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        Log::info('ContactFormController@show: Showing contact form.', ['contact_form_id' => $contactForm->id]);
        return view('contact_forms.show', compact('contactForm'));
    }

    // Admin accessible methods
    public function index()
    {
        Log::info('ContactFormController@index: Admin fetching all contact forms.');
        $contactForms = ContactForm::all();
        return view('admin.contact_forms.index', compact('contactForms'));
    }

    public function adminShow(ContactForm $contactForm)
    {
        Log::info('ContactFormController@adminShow: Admin showing contact form.', ['contact_form_id' => $contactForm->id]);
        return view('admin.contact_forms.show', compact('contactForm'));
    }

    public function destroy(ContactForm $contactForm)
    {
        Log::info('ContactFormController@destroy: Admin deleting contact form.', ['contact_form_id' => $contactForm->id]);
        $contactForm->delete();
        return redirect()->route('admin.contact_forms.index')->with('status', 'Contact form deleted successfully');
    }
}
