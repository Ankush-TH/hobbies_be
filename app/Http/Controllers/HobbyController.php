<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobby;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json(Hobby::where('user_id', $request->user_id)->latest()->get()->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hobby = new Hobby;
        $hobby->user_id = $request->user_id;
        $hobby->hobby = $request->hobby;

        if($hobby->save()){
            return response()->json(['status'=>true]);
        }else{
            return response()->json(['status'=>false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hobby = Hobby::find($id);

        if($hobby->delete()){
            return response()->json(['status'=>true]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
}
