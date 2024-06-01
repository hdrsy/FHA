<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $contact = Contact::first();
        $contact->links = json_decode($contact->links, true); // تحويل الروابط من JSON string إلى array
        return response()->json($contact);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    // public function restaurant_info($id, Request $request)
    // {

    //     $restaurant = Restaurant::findOrFail($id); // Find the restaurant or fail

    //     // Now, attempt to get the first logo image for the restaurant
    //     $restaurantLogo = $restaurant->images()
    //         ->where('type', 'logo')
    //         ->first(); // This will get the first image that matches the type 'logo'

    //     $restaurantLogoFilename = $restaurantLogo ? $restaurantLogo->filename : 'default-logo.jpg';

    //     $userId = Auth::id(); // Get authenticated user's ID
    //     $Date = $request->query('reservation_date'); // Current date
    //     $promoCodes = res_prompcodes::where('restaurant_id', $id)
    //         ->whereHas('promocode', function ($query) use ($Date, $userId) {
    //             $query->where('start_date', '<=', $Date)
    //                 ->where('end_date', '>=', $Date)
    //                 ->where('status', 'active')
    //                 ->where(function ($q) use ($userId) {
    //                     $q->whereJsonContains('users_ids', $userId)
    //                         ->orWhereNull('users_ids');
    //                 });
    //         })
    //         ->with(['promocode:id,code,discount'])
    //         ->get()
    //         ->map(function ($restaurantPromoCode) {
    //             return $restaurantPromoCode->promocode;
    //         });


    //     return response()->json([
    //         'restaurant_logo' => $restaurantLogoFilename,
    //         'restaurant_taxes' => $restaurant->taxes,
    //         'promoCodes' => $promoCodes,
    //     ]);

    // }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'contact_title' => 'required|string',
            'contact_description' => 'required|string',
            'ar_contact_title' => 'required|string',
            'ar_contact_description' => 'required|string',
            'ar_location' => 'required|string',
            'location' => 'required|string',
            'cover' => 'required|image',
            'links' => 'required|json',
        ]);
        $contact = Contact::first();
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        $contact->update([
            'contact_title' => $request->contact_title,
            'contact_description' => $request->contact_description,
            'ar_contact_title' => $request->ar_contact_title,
            'ar_contact_description' => $request->ar_contact_description,
            'ar_location' => $request->ar_location,
            'location' => $request->location,
            'cover' => $request->file('cover')->store('covers', 'public'), // تخزين الصورة وحفظ المسار
            'links' => $request->links, // تأكد من أن البيانات المرسلة على هيئة JSON صالحة
        ]);
        return response()->json(['message' => 'Contact updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
