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

    }
}
