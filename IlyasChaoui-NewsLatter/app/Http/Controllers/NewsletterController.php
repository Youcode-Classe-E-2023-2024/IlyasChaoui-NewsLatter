<?php

namespace App\Http\Controllers;

use App\Mail\TemplateMessage;
use App\Mail\UserSubscribedMessage;
use App\Models\Emaillist;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        //dd($request);
        $userId = Auth::id();
        //dd($userId);

        // Validate the request data
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        // Create the newsletter in the database
        Newsletter::create([
            'titre' => $request->titre,
            'images' => $request->images,
            'contenu' => $request->contenu,
            "user_id" => $userId,
        ]);

        // Redirect to a success page or return a response as needed
        return redirect()->route('create.template')->with('success', 'Newsletter created successfully');
    }

    public function send($id)
    {
        $newsletter = Newsletter::findOrFail($id);

        $subscribers = EmailList::where('status', 'sub')->get();

        foreach ($subscribers as $subscriber) {
//            $unsubscribeToken = Str::random(100);
//            $subscriber->unsubscribe_token = $unsubscribeToken;
//            $subscriber->save();

//            $unsubscribeLink = route('unsubscribe', ['token' => $unsubscribeToken]);

            $this->sendNewsletterToSubscriber($newsletter, $subscriber);
        }

//        $newsletter->status ='sent';
//        $newsletter->save();

        return redirect('/')->with('success', 'Newsletter sent successfully.');
    }

    private function sendNewsletterToSubscriber($newsletter, $subscriber)
    {
        $recipientEmail = $subscriber->email;

        $textContent = strip_tags($newsletter->contenu);
        $titre = $newsletter->titre;
        try {
            Mail::to($recipientEmail)->send(new TemplateMessage($textContent, $titre));


            Log::info('Newsletter sent successfully to: ' . $recipientEmail);
        } catch (\Exception $e) {
            Log::error('Failed to send newsletter to: ' . $recipientEmail . '. Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Find the media by its ID
        $newsletter = Newsletter::findOrFail($id);
        if (!$newsletter) {
            return redirect()->back()->with('error', 'Media not found.');
        }
        $newsletter->delete();
        return redirect()->back()->with('success', 'Template deleted successfulnesses.');
    }
}
