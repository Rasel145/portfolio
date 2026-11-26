<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot: real visitors never fill the hidden "website" field.
        if ($request->filled('website')) {
            return redirect(route('home').'#contact')
                ->with('contact_success', 'Thanks! Your message has been sent.');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ]);

        Message::create($data);

        return redirect(route('home').'#contact')
            ->with('contact_success', 'Thanks! Your message has been sent. I will reply soon.');
    }
}
