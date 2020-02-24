<?php

namespace App\Http\Controllers;

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
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        $url= new URLDirectory();
        URLDirectory::setBaseURL("reserved","https://www.merchantsuite.com/api/v3");
        $credentials = new Credentials("api.ms641829.rx", 'Aft02_\^CYLyc18,', "MS123456",Mode::Live);

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
        $txn->setAmount(20000);
        $txn->setCurrency("AUD");
        $txn->setInternalNote("Internal Note");
        $txn->setReference1("My Customer Reference");
        $txn->setReference2("Medium");
        $txn->setReference3("Large");
        $txn->setStoreCard(FALSE);
        $txn->setSubType("single");
        $txn->setType(TransactionType::Internet);

        $cardDetails->setCardHolderName("MR C CARDHOLDER");
        $cardDetails->setCardNumber("4444333322221111");
        $cardDetails->setCVN("678");
        $cardDetails->setExpiryDate("0521");

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

        $fraudScreening->setPerformFraudScreening(true);
        $fraudScreening->setDeviceFingerprint("ExampleDeviceFingerprint");

        $txn->setFraudScreeningRequest($fraudScreening);

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
