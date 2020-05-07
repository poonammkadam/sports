<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\EventParticipants;
use App\Http\Model\Events;
use App\Http\Model\Profile;
use App\MerchantSuite\Actions;
use App\MerchantSuite\Address;
use App\MerchantSuite\CardDetails;
use App\MerchantSuite\ContactDetails;
use App\MerchantSuite\Credentials;
use App\MerchantSuite\Customer;
use App\MerchantSuite\FraudScreeningRequest;
use App\MerchantSuite\Mode;
use App\MerchantSuite\Order;
use App\MerchantSuite\OrderAddress;
use App\MerchantSuite\OrderItem;
use App\MerchantSuite\OrderRecipient;
use App\MerchantSuite\PersonalDetails;
use App\MerchantSuite\StatementDescriptor;
use App\MerchantSuite\Transaction;
use App\MerchantSuite\TransactionType;
use App\MerchantSuite\URLDirectory;
use App\Notifications\RegisterConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;


class UserController extends Controller
{
    public function getRegister()
    {
        $objProfile = auth()->user();
        if ($objProfile->registration_status) {
            return view('front.profile.profile_complite', ['objProfile' => $objProfile]);
        } else {
            return view('front.profile.registation', ['objProfile' => $objProfile]);
        }
    }

    public function getProfile()
    {
        $objProfile = auth()->user();
        if ($objProfile->registration_status) {
            $objUserProfile = Profile::where('user_id', $objProfile->id)->first();
            $objUserProfileEvents = $objUserProfile->eventParticipants()->load('events');
            return view('front.profile.profile', ['objProfile' => $objProfile, 'objUserProfileEvents' => $objUserProfileEvents, 'objUserProfile' => $objUserProfile]);
        } else {
            $objCountries = new Countries();
            $arrCountries = $objCountries->all()->pluck('name.common');
            return view('front.profile.registation', ['objProfile' => $objProfile, 'arrCountries' => $arrCountries]);
        }


    }

    public function update(Request $request)
    {
        $objProfileExist = Profile::where('user_id', auth()->user()->id)->first();
        if ($objProfileExist) {
            $objProfile = $objProfileExist;
        } else {
            $objProfile = new Profile();
        }
        $objProfile->user_id = auth()->user()->id;
        $objProfile->first_name = $request->first_name;
        $objProfile->last_name = $request->last_name;
        $objProfile->gender = $request->gender;
        $objProfile->date_of_birth = $request->dob;
        $objProfile->country = $request->nationality;
        $objProfile->local_id = $request->local_id;
        $objProfile->passport = $request->passport_no;
        $objProfile->address = $request->address;
        $objProfile->country = $request->country;
        $objProfile->mobile_no_primary = $request->mobile_no;
        $objProfile->t_shirt_size = $request->t_shirt_size;
        $objProfile->save();

        auth()->user()->name = $request->local_name;
        auth()->user()->email = $request->email;
        auth()->user()->registration_status = true;
        auth()->user()->save();
        return redirect('profile_update')->with('message', 'Your Profile Created successfully.!');
    }

    public function eventList()
    {
        $arrObjUpcomingEvents = Events::whereDate('registration_start_date', '>', Carbon::now()->toDateString())->orderBy('id', 'desc')->take(8)->get();
        $arrObjPastEvents = Events::whereDate('registration_end_date', '<', Carbon::now()->toDateString())->orderBy('id', 'desc')->take(8)->get();
        $arrObjCurrentEvents = Events::whereDate('registration_start_date', '<', Carbon::now()->toDateString())
            ->whereDate('registration_end_date', '>', Carbon::now()->toDateString())->orderBy('id', 'desc')->get();

        return view('front.event.event_list', ['arrObjUpcomingEvents' => $arrObjUpcomingEvents, 'arrObjPastEvents' => $arrObjPastEvents, 'arrObjCurrentEvents' => $arrObjCurrentEvents]);
    }

    public function eventStore(Request $request)
    {
        $objEventParticipants = new EventParticipants();
        $arrMixExtraData = [];
        $total = 0;
        $objUser = auth()->user();
        $objProfile = Profile::where('user_id', auth()->user()->id)->first();
        $objEventParticipants->category_id = $request->event_category;
        $objEventParticipants->event_id = $request->event_id;
        $objEventParticipants->t_shirt_size = $request->t_shirt_size;
        $objEventParticipants->transstarts = $request->accommodation;
        $objEventParticipants->transstarts = $request->pickup_transportation;
        $objEventParticipants->transends = $request->drop_transportation;
        $objEventParticipants->racekit_price = $request->racekit;
        $objEventParticipants->team = $request->team;
        $objEventParticipants->profile_id = $objProfile->id;
        $objEventParticipants->payment_type = $request->payment_type;
        $objEventParticipants->ticket_id = $objEventParticipants->category->getEventPrice()->id;
        $arrMixExtraData['user'] = $objUser;
        $arrMixExtraData['eventparticipant'] = $objEventParticipants;
        if ($request->payment_type == 'online') {
            $arrMixExtraData['cardholder_name'] = $request->cardholder_name;
            $arrMixExtraData['cardholder_number'] = $request->cardholder_number;
            $arrMixExtraData['cardholder_expiry'] = $request->cardholder_name;
            $arrMixExtraData['cardholder_cvc'] = $request->cardholder_cvc;
            $intEventId = $request->event_id;
            $objEvent = Events::where('id', $intEventId)->first();
            if ($request->accommodation) {
                $total = $total + $objEvent->accom->price;
            }

            if ($request->pickup_transportation) {
                $total = $total + $objEvent->start->price;
            }

            if ($request->drop_transportation) {
                $total = $total + $objEvent->end->price;
            }
            if ($request->racekit) {
                $total = $total + $objEvent->racekit;
            }
            $arrMixExtraData['fee'] = (int)$total;
            $arrMixExtraData['profile_id'] = $objProfile->id;
            $objPayment = $this->makePayment($arrMixExtraData);
            $objApiResponse = $objPayment->getAPIResponse();

            $objUser->notify(new RegisterConfirmation($arrMixExtraData));
            if ($objApiResponse->isSuccessful()) {
                $objEventParticipants->payment_status = 1;
                $objEventParticipants->save();
                $arrMixExtraData['payment'] = $objApiResponse;
                $objUser->notify(new RegisterConfirmation($arrMixExtraData));
                $objEventParticipants->save();
                redirect('upload/receipt/' . $objEventParticipants->id)->with('message', 'Payment Successful. Please check your email.');
            } else {
                return redirect('events')->with('message', 'Payment Unsuccessful. Please try again after sometime.');
            }
        }

        if ($request->payment_type == 'offline') {
            $objEventParticipants->payment_status = 2;
            $objEventParticipants->save();
            $objUser->notify(new RegisterConfirmation($arrMixExtraData));
            return redirect('events')->with('message', 'To confirm your registration. Please check your email.');
        }

        return redirect('events')->with('message', 'Payment Unsuccessful. Please try again after sometime.');
    }

    public function makePayment($arrMixExtraData)
    {
        URLDirectory::setBaseURL("reserved", "https://www.merchantsuite.com/api/v3");
        $credentials = new Credentials(env('MERCAHNTSUIT_USERNAME'), env('EBpu185\/#HArq0-'), "MS123456", Mode::LIVE);

        $txn = new Transaction();
        $cardDetails = new CardDetails();
        $order = new Order();
        $shippingAddress = new OrderAddress();
        $billingAddress = new OrderAddress();
        $address = new Address();
        $customer = new Customer();
        $personalDetails = new PersonalDetails();
        $contactDetails = new ContactDetails();
        $order_item_1 = new OrderItem();
        $order_recipient_1 = new OrderRecipient();
        $fraudScreening = new FraudScreeningRequest();
        $statementDescriptor = new StatementDescriptor();

        $txn->setAction(Actions::Payment);
        $txn->setCredentials($credentials);
        $txn->setAmount($arrMixExtraData['fee']);
        $txn->setCurrency("AUD");
        $txn->setInternalNote("Internal Note");
        $txn->setReference1("My Customer Reference");
        $txn->setReference2("Medium");
        $txn->setReference3("Large");
        $txn->setStoreCard(TRUE);
        $txn->setSubType("single");
        $txn->setType(TransactionType::Internet);

        $cardDetails->setCardHolderName($arrMixExtraData['cardholder_name']);
        $cardDetails->setCardNumber($arrMixExtraData['cardholder_number']);
        $cardDetails->setCVN($arrMixExtraData['cardholder_cvc']);
        $cardDetails->setExpiryDate("9900");

        $txn->setCardDetails($cardDetails);

        $address->setAddressLine1("123 Fake Street");
        $address->setCity("Melbourne");
        $address->setCountryCode("AUS");
        $address->setPostCode("3000");
        $address->setState("Vic");

        $contactDetails->setEmailAddress("example@email.com");

        $personalDetails->setDateOfBirth("1900-01-01");
        $personalDetails->setFirstName("John");
        $personalDetails->setLastName("Smith");
        $personalDetails->setSalutation("Mr");

        $billingAddress->setAddress($address);
        $billingAddress->setContactDetails($contactDetails);
        $billingAddress->setPersonalDetails($personalDetails);

        $shippingAddress->setAddress($address);
        $shippingAddress->setContactDetails($contactDetails);
        $shippingAddress->setPersonalDetails($personalDetails);
//
//        $order_item_1->setDescription("an item");
//        $order_item_1->setQuantity(1);
//        $order_item_1->setUnitPrice(1000);
//
//        $orderItems = array($order_item_1);
//
//        $order_recipient_1->setAddress($address);
//        $order_recipient_1->setContactDetails($contactDetails);
//        $order_recipient_1->setPersonalDetails($personalDetails);
//
//        $orderRecipients = array($order_recipient_1);
//
//        $order->setBillingAddress($billingAddress);
//        $order->setOrderItems($orderItems);
//        $order->setOrderRecipients($orderRecipients);
//        $order->setShippingAddress($shippingAddress);
//        $order->setShippingMethod("boat");
//
//        $txn->setOrder($order);

        $customer->setCustomerNumber($arrMixExtraData['profile_id']);
        $customer->setAddress($address);
        $customer->setExistingCustomer(false);
        $customer->setContactDetails($contactDetails);
        $customer->setPersonalDetails($personalDetails);
        $customer->setDaysOnFile(1);

        $txn->setCustomer($customer);

        $fraudScreening->setPerformFraudScreening(false);
        $fraudScreening->setDeviceFingerprint("ExampleDeviceFingerprint");

        //    $txn->setFraudScreeningRequest($fraudScreening);

//        $statementDescriptor->setAddressLine1("123 Drive Street");
//        $statementDescriptor->setAddressLine2("");
//        $statementDescriptor->setCity("Melbourne");
//        $statementDescriptor->setCompanyName("A Company Name");
//        $statementDescriptor->setCountryCode("AUS");
//        $statementDescriptor->setMerchantName("A Merchant Name");
//        $statementDescriptor->setPhoneNumber("0123456789");
//        $statementDescriptor->setPostCode("3000");
//        $statementDescriptor->setState("Victoria");

//        $txn->setStatementDescriptor($statementDescriptor);

        $txn->setTokenisationMode(3);
        $txn->setTimeout(93121);
        return $response = $txn->submit();
    }

    public function eventCreate($id)
    {
        $objEvent = Events::findOrFail($id);
        $objEvent->load('category');
        if (auth()->check() && auth()->user()->registration_status) {
            return view('front.event.event', ['objEvent' => $objEvent]);
        }
        return redirect('registration')->with('alert', 'Sorry!!! You can\'t register for event first you need complete your profile');

    }

    public function getUserResult()
    {
        $objProfile = Profile::Where('user_id', auth()->user()->id)->first();
        if (!$objProfile) {
            return redirect('registration')->with('alert', 'Sorry!!! You need complete your profile first.');
        }
        $arrObjParticipant = $objProfile->eventParticipantsCat();

        return view('front.results.my_result', ['objProfile' => $objProfile, 'arrObjParticipant' => $arrObjParticipant]);
    }

}
