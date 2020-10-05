<?php

namespace App\Http\Controllers;
use App\Models\MpesaTransaction;
use App\Models\StkTransaction;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use  App\Models\TransactionLog;
use DB;


class MpesaController extends Controller
{


    public function mpesaCheckout(){
        return view('payment.card');
    }
    /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = 174379;
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }


    public function SimulateTransactionResponse(Request $request)
    {
//      $request->headers->set('content-type', 'application/json');

      $transaction = $request->getContent();
        // Log::create(['description' => 'IPN', 'content' => $transaction]);
//        exit;
         Log::info(json_encode($transaction));
//        print_r($transaction);exit;
        $transaction_strip = json_decode($transaction, true);

        
//        print_r($transaction_strip);exit;

      $firstName = $transaction_strip["FirstName"];
      $middleName = $transaction_strip["MiddleName"];
      $lastName = $transaction_strip["LastName"];
      $transId = $transaction_strip["TransID"];
      $transTime = $transaction_strip["TransTime"];
      $transAmount = $transaction_strip["TransAmount"];
      $businessShortCode = $transaction_strip["BusinessShortCode"];
      $billRefNumber = $transaction_strip["BillRefNumber"];
      $invoiceNumber = $transaction_strip["InvoiceNumber"];
      $accountBalance = $transaction_strip["OrgAccountBalance"];
      $thirdPartyTrans = $transaction_strip["ThirdPartyTransID"];
      $msisdn = $transaction_strip["MSISDN"];



//        $userTransaction = UserTransaction::all();

        MpesaTransaction::create([
            'FirstName' => $firstName,
            'MiddleName' => $middleName,
            'LastName' => $lastName,
            'BillRefNumber' => $billRefNumber,
            'TransAmount' => $transAmount,
            'BusinessShortCode' => $businessShortCode,
            'InvoiceNumber' => $invoiceNumber,
            'OrgAccountBalance' => $accountBalance,
            'ThirdPartyTransID' => $thirdPartyTrans,
            'MSISDN' => $msisdn,
            'TransID' => $transId,
            'TransTime' => Carbon::parse($transTime)->toDateTimeString()
      ]);

      return response()->json($request->all());

    }



    
    /**
     * Lipa na M-PESA c2b simulation
     * */

     
    public function simulate(Request $request){


        $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken())); //setting custom header
      

        $curl_post_data = array(
               // Fill in the request parameters with valid values
               'ShortCode' =>'600161',
               'CommandID' => 'CustomerPayBillOnline',
               'Amount'=>'250',
               'Msisdn' =>254708374149,
               'BillRefNumber'=>'0025',

        );
       
        $data_string = json_encode($curl_post_data);
      
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
      
        $curl_response = curl_exec($curl);
        return $curl_response;
        // Log::info(json_encode($curl_response));
    }
       /**
     * Lipa na M-PESA b2c simulation
     * */
    public function B2cSimulate()
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken())); //setting custom header
        
        
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'InitiatorName' => 'testapi',
          'SecurityCredential' => '2RK8UAv7xuhh304dXxF',
          'CommandID' => 'BusinessPayment',
          'Amount' => '10',
          'PartyA' => '600161',
          'PartyB' => '254708374149',
          'Remarks' => 'shopping reversal',
          'QueueTimeOutURL' => 'https://79afc2b08058.ngrok.io',
          'ResultURL' => 'https://79afc2b08058.ngrok.io/api/v1/b2cSimulateTransactionResponse',
          'Occasion' => 'reverse'
        );
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        $curl_response = curl_exec($curl);
        return $curl_response;
    }
    public function b2cTransactionResponse(Request $request)
    {
        header("Content-Type:application/json");
         $callbackJSONData = file_get_contents('php://input');
         $transaction_strip = json_decode($callbackJSONData,true);

        Log::info($transaction_strip);//logging response    
    }
    /**
     * Lipa na M-PESA b2c simulation
     * */
    public function generateAccessToken()
    {
        $consumer_key=env('SAFARICOM_KEY');
        $consumer_secret=env('SAFARICOM_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
        // Log::info(json_encode($access_token));
    }
        // 
        /**
     * M-pesa Register Validation and Confirmation method
     */
    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => "600161",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://79afc2b08058.ngrok.io/api/v1/SimulateTransactionResponse",
            'ValidationURL' => "https://79afc2b08058.ngrok.io/api/v1/hlab/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }

        /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }
    /**
     *  M-pesa Validation Method
     * Safaricom will only call your validation if you have requested by writing an official letter to them
     */
    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }
        /**
     * Lipa na M-PESA STK Push method
     * */
    public function stkpush(Request $request) {

         $amount=$request->input('amount');
         $phone=$request->input('phone');
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken())); //setting custom header
        
        
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'BusinessShortCode' => 174379,
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone, // replace this with your phone number
            'PartyB' => 174379,
            'PhoneNumber' => $phone, // replace this with your phone number
            'CallBackURL' => 'https://79afc2b08058.ngrok.io/api/v1/StkTransactionResponse',
            'AccountReference' => "Jdope",
            'TransactionDesc' => "Testing stk push on sandbox"
        );
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        // return $curl_response;
        Log::info(json_encode($curl_response));
        $ResponseDecoded = json_decode($curl_response);
            if($ResponseDecoded->ResponseCode=='0'){
                echo "0";  
            } 
            elseif ($ResponseDecoded->ResponseCode!='0') {
                echo '1';
            }
            else{
                echo '1';
            }
    }


    public function StkTransactionResponse(Request $request)
    {
        header("Content-Type:application/json");
         $callbackJSONData = file_get_contents('php://input');
         $transaction_strip = json_decode($callbackJSONData,true);

        Log::info($transaction_strip);//logging response
        //logs to the database 
        DB::table( 'transaction_logs' )->insert([
            'logs'=> json_encode([$transaction_strip]),
        ]);
        $transaction = json_decode($callbackJSONData);
        $resultCode=$transaction->Body->stkCallback->ResultCode;
        $resultDesc=$transaction->Body->stkCallback->ResultDesc;
        $merchantRequestID=$transaction->Body->stkCallback->MerchantRequestID;
        $checkoutRequestID=$transaction->Body->stkCallback->CheckoutRequestID;

        $amount=$transaction->Body->stkCallback->CallbackMetadata->Item[0]->Value;
        $mpesaReceiptNumber=$transaction->Body->stkCallback->CallbackMetadata->Item[1]->Value;
        // $Balance=$transaction->Body->stkCallback->CallbackMetadata->Item[2]->Name;
        $transactionDate=$transaction->Body->stkCallback->CallbackMetadata->Item[3]->Value;
        $phoneNumber=$transaction->Body->stkCallback->CallbackMetadata->Item[4]->Value;
       

        StkTransaction::create([
            'MpesaReceiptNumber'=>$mpesaReceiptNumber,
            'Amount'=>$amount,
            'PhoneNumber'=>$phoneNumber,
            // 'Balance'=>$Balance,
            'TransactionDate'=>$transactionDate
        ]);
        $order = Order::orderBy('id', 'DESC')->first();
        $order->payment_status=1;
        $order->MpesaReceiptNumber=$mpesaReceiptNumber;
        $order->save();
    }


}
