<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreakdownController extends Controller
{
    //


    public function index()
    {

        $rand = new \App\Models\Randoms();
        $rand = \App\Models\Randoms::where('flag', 0)->update(array(
            'flag'=> true,
        ));
        $randomNumber = rand(5,10);
        $randomNumber2 = rand(5,10);
        $dataArray = [];
        for($i = 0; $i < $randomNumber; $i++){
            $r = new \App\Models\Randoms();
            $r->values = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
            $r->flag = false;
            $r->save();

            
            for($j = 0; $j < $randomNumber2; $j++){
                $b = new \App\Models\Breakdown();    
                $b->values = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
            
                $b->randoms()->associate($r);
                $b->save();
            }

                
                
            
        }
        
//        $randoms =  \App\Models\Randoms::select('values')->where('flag', 0)->get();

        $breakdown = \App\Models\Breakdown::select('breakdowns.values')->
                                    join('randoms', 'random_id', '=', 'randoms.id')
                                    ->where('flag', 0)
                                    ->get();
        return view('breakdown', 
        [
            //'randoms' => $randoms_json
            'breakdown' => $breakdown
        ]
    );
        //return Breakdown::find(1);
    }

    
}
