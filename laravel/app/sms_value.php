<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoapClient;
use App\message_settings_model;
class sms_value extends Model
{

    /**
     * @param $count
     * @param $parent_mobile
     * @param $request
     */
    public function sms($count, $parent_mobile, $request)
	{

		$get_message_value=message_settings_model::where('name','ORSMS')->first();
		$json_decode=json_decode($get_message_value->info);


            $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
            $paramArray = array(
                'userName' => $json_decode->username,
                'userPassword' => $json_decode->password,
                'messageText' => "Notice Titel : $request->notice_title , Notice Subject : $request->notice_subject . Notice :".$request->Notice."Send By : $request->author",
                'numberList' => $parent_mobile,
                'smsType' => "TEXT",
                'maskName' => '',
                'campaignName' => '',
            );
            $value = $soapClient->__call("OneToMany", array($paramArray));
            echo $value->OneToManyResult;


	}
    
}
