<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function addFriend()
    {

       $currentUser = Auth::user();

        if($currentUser->friends !== null){

            $array = $currentUser->friends;
            array_push($array, $_POST['friendId']);
            $currentUser->friends = $array;
        }
        else{

            $array = [];
            $array[0] = $_POST['friendId'];
            $currentUser->friends =  $array;
        }

        $currentUser->save();

        return  redirect('profil');
    }

    public function deleteFriend()
    {

       $array = [];
       $currentUser = Auth::user();

       $friendList = $currentUser->friends;

       for($i = 0; $i < sizeof($friendList) ; $i++){
        if($friendList[$i] !== $_POST['userId']){
            array_push($array,$friendList[$i]);
        }
    }

       $currentUser->friends = $array;

       $currentUser->save();

        return  redirect('profil');
    }

    public function getFriendList(){

        $currentUser = Auth::user();
        $array = [];

        if($currentUser->friends !== null){
            $array = $currentUser->friends;
        }

        return $array;

    }
}
