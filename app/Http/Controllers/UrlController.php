<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Url;
use App\Http\Requests\StoreUrlRequest;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    //
    public function index($user_id){
        $userUrls = Url::where('user_id',$user_id)->latest()->paginate(4);
        return response()->json($userUrls);
    }


    public function store(StoreUrlRequest $request){
       $url = Url::create([
        'full_url' => $request->full_url,
        'url_desc' => $request->url_desc,
        'shorten_url' => Str::random(),
        'user_id' => $request->user_id,
        'visits' => 0,
       ]);
       return response()->json($url);
    }


    public function show(Url $url){
        $url->increment('visits');
        return redirect($url->full_url);
    }

    public function update(UpdateUrlRequest $request, Url $url){
        $url->update([
            'full_url' => $request->full_url,
            'url_desc' => $request->url_desc,
            'user_id' => $request->user_id,
        ]);
        return response()->json($url);
    }

    public function destroy(Url $url){
        $url->delete();
        return response()->json('deleted');
    }
}
