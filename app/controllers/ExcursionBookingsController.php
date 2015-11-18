<?php

class ExcursionBookingsController extends \BaseController
{

    /**
     * Display a listing of excursionbookings
     *
     * @return Response
     */
    public function index()
    {
        $excursionbookings = Excursionbooking::all();

        return View::make('excursionbookings.index', compact('excursionbookings'));
    }

    /**
     * Show the form for creating a new excursionbooking
     *
     * @return Response
     */
    public function create()
    {
        return View::make('excursionbookings.create');
    }

    /**
     * Store a newly created excursionbooking in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Excursionbooking::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Excursionbooking::create($data);

        return Redirect::route('excursionbookings.index');
    }

    /**
     * Display the specified excursionbooking.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $excursionbooking = Excursionbooking::findOrFail($id);

        return View::make('excursionbookings.show', compact('excursionbooking'));
    }

    /**
     * Show the form for editing the specified excursionbooking.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $excursionbooking = Excursionbooking::find($id);

        return View::make('excursionbookings.edit', compact('excursionbooking'));
    }

    /**
     * Update the specified excursionbooking in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($booking_id, $id)
    {
        $excursionbooking = Excursionbooking::findOrFail($id);
        $booking = Booking::getBookingData($booking_id);

        if (Input::has('val')) {
            if (Input::get('val') == 0) {
                $excursionbooking->val = 0;
                $excursionbooking->save();


                $ehi_users = User::getEhiUsers();

                $pdf = PDF::loadView('emails/excursion-cancellation', array('booking' => $booking));
                $pdf->save(public_path() . '/temp-files/excursion-cancellations.pdf');

                Mail::send('emails/excursion-mail', array(
                    'booking' => Booking::find($booking->id)
                ), function ($message) use ($booking, $ehi_users) {
                    $message->attach(public_path() . '/temp-files/excursions.pdf')
                        ->subject('Cancel Excursion : ' . $booking->reference_number)
                        ->from('noreply@srilankahotels.travel', 'SriLankaHotels.Travel');

                    $message->to('excursions@srilankahotels.travel', 'Excursions');
                    $message->to('admin@srilankahotels.travel', 'Admin');
                    if (!empty($ehi_users))
                        foreach ($ehi_users as $ehi_user) {
                            $message->to($ehi_user->email, $ehi_user->first_name);
                        }
                });


                // Cancellation email

                Invoice::amendInvoice($booking);
                Booking::amendBooking($booking_id);

                // Service Voucher

                $pdf = PDF::loadView('emails/service-voucher', array('booking' => $booking));
                $pdf->setPaper('a4')->save(public_path() . '/temp-files/service_voucher_' . $booking->id . '.pdf');

                $ehi_users = User::getEhiUsers();
                //$booking = Booking::getBookingData($booking->id);

                Mail::send('emails/service-voucher-mail', array(
                    'booking' => $booking
                ), function ($message) use ($booking, $ehi_users) {
                    $message->attach(public_path() . '/temp-files/service_voucher_' . $booking->id . '.pdf')
                        ->subject('Amended Service Voucher: ' . $booking->reference_number)
                        ->from('noreply@srilankahotels.com')
                        ->bcc('admin@srilankahotels.travel', 'Admin');

                    $message->to(Auth::user()->email, Auth::user()->first_name);

                    if (!empty($ehi_users)) {
                        foreach ($ehi_users as $ehi_user) {
                            $message->to($ehi_user->email, $ehi_user->first_name);
                        }
                    }

                });

                $emails = array('tharinda@exotic-intl.com', 'lahiru@exotic-intl.com', 'umesh@exotic-intl.com');

                $pdf = PDF::loadView('emails/booking', array('booking' => $booking));
                $pdf->save(public_path() . '/temp-files/booking_' . $booking->id . '.pdf');

                Mail::send('emails/booking-mail', array(
                    'booking' => $booking
                ), function ($message) use ($booking, $emails, $ehi_users) {
                    $message->attach(public_path() . '/temp-files/booking_' . $booking->id . '.pdf')
                        ->subject('Amended Booking: ' . $booking->reference_number)
                        ->from('noreply@srilankahotels.com')
                        ->bcc('admin@srilankahotels.travel', 'Admin');
//                foreach ($emails as $emailaddress) {
//                    $message->to($emailaddress, 'Admin');
//                }

                    if (!empty($ehi_users)) {
                        foreach ($ehi_users as $ehi_user) {
                            $message->to($ehi_user->email, $ehi_user->first_name);
                        }
                    }

                });

                $pdf = PDF::loadView('emails/invoice', array('booking' => $booking));
                $pdf->save(public_path() . '/temp-files/invoice_' . $booking->id . '.pdf');

                Mail::send('emails/invoice-mail', array(
                    'booking' => $booking
                ), function ($message) use ($booking, $emails, $ehi_users) {
                    $message->attach(public_path() . '/temp-files/invoice_' . $booking->id . '.pdf')
                        ->subject('Amended Invoice: ' . $booking->reference_number)
                        ->from('noreply@srilankahotels.com')
                        ->bcc('admin@srilankahotels.travel', 'Admin');
//                foreach ($emails as $emailaddress) {
//                    $message->bcc($emailaddress, 'SysAdmin');
//                }

                    if (!empty($ehi_users)) {
                        foreach ($ehi_users as $ehi_user) {
                            $message->to($ehi_user->email, $ehi_user->first_name);
                        }
                    }

                });

                return Redirect::back();

            }
        }

        $validator = Validator::make($data = Input::all(), Excursionbooking::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $excursionbooking->update($data);

        return Redirect::back();
    }

    /**
     * Remove the specified excursionbooking from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Excursionbooking::destroy($id);

        return Redirect::route('excursionbookings.index');
    }

}
