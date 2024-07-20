<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUS;
use Mail;
use App\Mail\Contact;


class ContactUsController extends Controller
{
    //
    
    public function contactUSPost(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        

        //Create ContactUs
        ContactUS::create($data);
        // Send email using the Mailable class
        Mail::to('your-email@example.com')->send(new Contact($data));
        

        // Optionally, you can return a response indicating success
        return redirect()->route('drink')->with('success', 'Your message has been sent successfully. Thank you for contacting us');
    }
    public function index()
    {
        //
        $messages= ContactUS::get();
        $titlePage="Messages";
        return view('admin.messages',compact('messages','titlePage'));
    }
    public function show(string $id)
    {
        //
        $message = ContactUS::find($id);
        if ($message) {
            $message->update(['is_read' => true]);
        }
        $titlePage="Message Details";

    // Return the edit view with the client data
        return view('admin.showMessage', compact('message','titlePage'));
    }
    public function destroy(string $id)
    {
        //
           $message = ContactUS::find($id);

            // If the category with the given ID is not found, handle the case
            if (!$message) {
                return redirect()->back()->with('error', 'Beverage not found.');
            }

            

            // Delete the beverage
            $message->delete();

            // Redirect to beverages index page with success message
            return redirect()->route('admin.messages')->with('success', 'Beverage deleted successfully.');
    }
    



}
