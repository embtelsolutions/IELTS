<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay; 
class PayumoneyController extends Controller
{
	public function payumoneyPayment(Request $request)
	{  //dd($request->all());
		$data=array();
		$data['package_id']=$request->package_id;
		$data['_token']=$request->_token;
		$data['name']=$request->name;
		$data['email']=$request->email;
		$data['contact_number']=$request->contact_number;
		$data['country']=$request->country;
		$data['city']=$request->city;
		$data['zipcode']=$request->zip_code;
		$data['price']=$request->price;
		//dd($data);
		/* All Required Parameters by your Gateway will differ from gateway to gateway refer the gate manual */
     // dd($request->all());
		//dd($request->all());
		$parameters = [
			'txnid' => $data['package_id'],
			'order_id' => $data['package_id'],
			'amount' => $data['price'],
			'firstname' => $data['name'],
			//'lastname' => $nameArr[1],
			'email' => $data['email'],
			'phone' => $data['contact_number'],
			'productinfo' =>$data['package_id'],
        //  'service_provider' =>'',
			'zipcode' =>$data['zipcode'],
			'city'=>$data['city'],
			//'state'=>$data['state'],
			'country'=>$data['country'],
			'curl'=>url('payu/response'),
		];
       // dd($parameters);
		$order = Indipay::prepare($parameters);
		//dd($order);
		return Indipay::process($order);
		
	}
}
