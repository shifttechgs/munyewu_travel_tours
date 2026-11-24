<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryRequest;
use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function store(EnquiryRequest $request): RedirectResponse
    {
        // Persist first — the stored record is the source of truth and the
        // confirmation that the enquiry was received. Success is never shown
        // before this succeeds.
        $enquiry = Enquiry::create($request->safe()->except('company'));

        // Notify the operator. A mail failure (e.g. SMTP not yet configured)
        // must not lose the enquiry, so it is logged and swallowed — the record
        // is already saved and can be retrieved.
        try {
            $recipient = config('business.enquiries_to') ?? config('mail.from.address');
            Mail::to($recipient)->send(new EnquiryReceived($enquiry));
        } catch (\Throwable $e) {
            Log::warning('Enquiry stored but notification failed', [
                'enquiry_id' => $enquiry->id,
                'error' => $e->getMessage(),
            ]);
        }

        return redirect()
            ->to(route('home').'#enquiry')
            ->with('enquiry_success', true)
            ->with('enquiry_service', $enquiry->serviceLabel())
            ->with('enquiry_name', $enquiry->name);
    }
}
