<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\EventParticipants;
use App\Http\Model\Events;
use App\Http\Model\Profile;
use App\MerchantSuite\Actions;
use App\MerchantSuite\Address;
use App\MerchantSuite\AuthKeyTransaction;
use App\MerchantSuite\CardDetails;
use App\MerchantSuite\ContactDetails;
use App\MerchantSuite\Credentials;
use App\MerchantSuite\Customer;
use App\MerchantSuite\FraudScreeningRequest;
use App\MerchantSuite\HppTxnFlowParameters;
use App\MerchantSuite\IframeParameters;
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
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
   public function getRegister(){
       $objProfile =  auth()->user();
    return view('layouts.forms.registation', ['objProfile'=>$objProfile]);
   }

   public function getProfile(){
       $objProfile =  auth()->user();
       $objUserProfile = Profile::where('user_id',$objProfile->id)->first();
       $objUserProfilEvents=  $objUserProfile->eventParticipants()->load('events');

    return view('layouts.view.profile', ['objProfile'=>$objProfile, 'objUserProfilEvents'=>$objUserProfilEvents, 'objUserProfile'=> $objUserProfile]);

   }

   public function update(Request $request){
       $objProfile = new Profile();
       $objProfile->user_id =  Auth::user()->id;
       $objProfile->first_name = $request->first_name;
       $objProfile->last_name = $request->last_name;
       $objProfile->gender = $request->gender;
       $objProfile->date_of_birth = $request->dob;
//       $objProfile->nationality = $request->nationality;
       $objProfile->local_id = $request->local_id;
       $objProfile->passport = $request->passport_no;
       $objProfile->address = $request->address;
       $objProfile->country = $request->country;
       $objProfile->mobile_no_primary = $request->mobile_no;
       $objProfile->save();

       auth()->user()->name=$request->local_name;
       auth()->user()->email=$request->email;

       return redirect('events')->with('success', 'Data Added successfully.');
   }

   public function eventList(){
         $arrObjEvents = Events::all();


        return view('layouts.view.event_list', ['arrObjEvents'=>$arrObjEvents]);
    }

   public function eventStore(Request $request){
     $objEventParticipants = new EventParticipants();
//     dd(auth()->user()->id);
     $objProfile = Profile::where('user_id', auth()->user()->id)->first();
       $objEventParticipants->category_id = $request->event_category;
       $objEventParticipants->event_id = $request->event_id;
       $objEventParticipants->profile_id = $objProfile->id;
//       $objEvent->payment_status = $request->event_category;
//       $objEvent->payment_type = $request->event_category;
       $objEventParticipants->save();
       $arrMixExtraData=[];
//       $this->makePayment($arrMixExtraData);

       return redirect('events')->with('success', 'Data Added successfully.');
   }

   public function eventCreate($id){
        $objEvent = Events::findOrFail($id);
        $objEvent->load('category');
        return view('layouts.forms.event',['objEvent'=>$objEvent]);
    }

   public function makePayment($arrMixExtraData){
        URLDirectory::setBaseURL("reserved","https://www.merchantsuite.com/api/v3");
        $credentials = new Credentials("api.ms641829.7e", "EBpu185\/#HArq0-", "MS123456",Mode::Live);

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
        $txn->setAmount(200000);
        $txn->setCurrency("AUD");
        $txn->setInternalNote("Internal Note");
        $txn->setReference1("My Customer Reference");
        $txn->setReference2("Medium");
        $txn->setReference3("Large");
        $txn->setStoreCard(TRUE);
        $txn->setSubType("single");
        $txn->setType(TransactionType::Internet);

        $cardDetails->setCardHolderName("MR C CARDHOLDER");
        $cardDetails->setCardNumber("5123456789012346");
        $cardDetails->setCVN("678");
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

        $order_item_1->setDescription("an item");
        $order_item_1->setQuantity(1);
        $order_item_1->setUnitPrice(1000);

        $orderItems = array($order_item_1);

        $order_recipient_1->setAddress($address);
        $order_recipient_1->setContactDetails($contactDetails);
        $order_recipient_1->setPersonalDetails($personalDetails);

        $orderRecipients = array($order_recipient_1);

        $order->setBillingAddress($billingAddress);
        $order->setOrderItems($orderItems);
        $order->setOrderRecipients($orderRecipients);
        $order->setShippingAddress($shippingAddress);
        $order->setShippingMethod("boat");

        $txn->setOrder($order);

        $customer->setCustomerNumber("1234");
        $customer->setAddress($address);
        $customer->setExistingCustomer(false);
        $customer->setContactDetails($contactDetails);
        $customer->setPersonalDetails($personalDetails);
        $customer->setCustomerNumber("1");
        $customer->setDaysOnFile(1);

        $txn->setCustomer($customer);

        $fraudScreening->setPerformFraudScreening(false);
        $fraudScreening->setDeviceFingerprint("ExampleDeviceFingerprint");

    //    $txn->setFraudScreeningRequest($fraudScreening);

        $statementDescriptor->setAddressLine1("123 Drive Street");
        $statementDescriptor->setAddressLine2("");
        $statementDescriptor->setCity("Melbourne");
        $statementDescriptor->setCompanyName("A Company Name");
        $statementDescriptor->setCountryCode("AUS");
        $statementDescriptor->setMerchantName("A Merchant Name");
        $statementDescriptor->setPhoneNumber("0123456789");
        $statementDescriptor->setPostCode("3000");
        $statementDescriptor->setState("Victoria");

        $txn->setStatementDescriptor($statementDescriptor);

        $txn->setTokenisationMode(3);
        $txn->setTimeout(93121);

        $response = $txn->submit();
        dd($response);
        return view('payment');
    }

}
