<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;


class UserController extends Controller
{
   public function index(){
    return view('layouts.forms.registation');
   }

   public function update(Request $request){
       $objProfile = new Profile();
       $objProfile->first_name = $request->first_name;
       $objProfile->last_name = $request->last_name;
       $objProfile->local_name = $request->local_name;
       $objProfile->gender = $request->gender;
       $objProfile->date_of_birth = $request->dob;
       $objProfile->nationality = $request->nationality;
       $objProfile->local_id = $request->local_id;
       $objProfile->passport = $request->passport_no;
       $objProfile->address = $request->address;
       $objProfile->country = $request->country;
       $objProfile->mobile_no_primary = $request->mobile_no;
       $objProfile->save();
       auth()->user()->name=$request->local_name;
       auth()->user()->email=$request->email;
    return view('layouts.forms.event');
   }
   public function eventStore(){
    return view('home');
   }

public function makePayment($arrMixExtraData){
    $arrMixExtraData['amount']=20;
    URLDirectory::setBaseURL("reserved","https://www.merchantsuite.com/api/v3");
    $credentials = new Credentials("api.ms641829.rx", 'Aft02_\^CYLyc18,', "MS123456", Mode::Live);

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
    $txn->setAmount($arrMixExtraData['amount']);
    $txn->setCurrency("AUD");
    $txn->setInternalNote("Internal Note");
    $txn->setReference1("My Customer Reference");
    $txn->setReference2("Medium");
    $txn->setReference3("Large");
    $txn->setStoreCard(FALSE);
    $txn->setSubType("single");
    $txn->setType(TransactionType::Internet);

    $cardDetails->setCardHolderName($arrMixExtraData['cardholder_name']);
    $cardDetails->setCardNumber($arrMixExtraData['card_number']);
    $cardDetails->setCVN($arrMixExtraData['card_cvn']);
    $cardDetails->setExpiryDate($arrMixExtraData['card_expiry_date']);

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

    $orderRecipients = array($order_recipient_1);

    $order->setBillingAddress($billingAddress);
    $order->setOrderRecipients($orderRecipients);
    $order->setShippingAddress($shippingAddress);
    $order->setShippingMethod("boat");

    $txn->setCustomer($customer);

    $fraudScreening->setPerformFraudScreening(true);


    $txn->setFraudScreeningRequest($fraudScreening);
    $txn->setTokenisationMode(3);
    $txn->setTimeout(93121);
    $response = $txn->submit();
    dd($response);
    return view('payment');
}
}
