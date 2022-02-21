<?php

namespace App\Http\Controllers;
use App\Models\EntranceModel;
use Carbon\Carbon;
use App\Models\CardsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    protected $rules = [
        'object_uuid'=>'alpha_num|required|exists:facilities,id',
        'card_uuid'=>['alpha_num','required','exists:cards,id']
    ];

    protected $customMessages = [
        'required' => 'The :attribute field is required.',
        'alpha_num' => 'The :attribute field is not alphanumeric.',
        'exists'  => 'The :attribute does not exists in Database.'
    ];

    public function reception(Request $request)
    {
        //validate request parameters
        $validator = Validator::make($request->all(), $this->rules, $this->customMessages );
        $params = $validator->validated();
        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => 'validation failed', 'data' => $validator->errors()], 400);
        }
        //check if card has owner
        $card = CardsModel::getCardInfo($params['card_uuid']);
        if(!isset($card->customer)) {
            return response(['status' => 'error', 'message' => 'This card does not belong to any user'], 404);
        }

        //check if customer already entered  facility with this  card
        $enteredToday = EntranceModel::checkEntrance($params);
        if($enteredToday) {
            return response(['status' => 'error', 'message' => 'Customer already entered this facility today'], 403);
        }else{
            $params = ['card_uuid'=>$request['card_uuid'], 'facility_uuid'=> $request['object_uuid'], 'user_id'=> $card->customer->id, 'entrance_date'=> Carbon::now()->format('Y-m-d')];
            EntranceModel::store($params);
            return response(['status' => 'OK', 'object_name' => $card->facility->name,'first_name'=>$card->customer->first_name,'last_name'=> $card->customer->last_name], 200);
        }
    }
}
