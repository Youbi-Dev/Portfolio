<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactMessage::all();
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage)
    {
        $contactMessage->update(['read' => true]); // Or use the markAsRead method if it exists on the model
        return view('admin.messages.show', compact('contactMessage'));
    }

    /**
     * Mark the specified message as read.
     */
    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->update(['read' => true]);
        return redirect()->back()->with('success', 'Message marked as read.');
    }

    /**
     * Mark the specified message as unread.
     */
    public function markAsUnread(ContactMessage $contactMessage)
    {
        $contactMessage->update(['read' => false]);
        return redirect()->back()->with('success', 'Message marked as unread.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('contact_messages.index')->with('success', 'Message deleted successfully.');
    }

    public function reply(ContactMessage $contactMessage)
    {
        // This is a placeholder. A full reply feature would involve sending an email or similar.
        return view('contact_messages.reply', compact('contactMessage'));
    }
}