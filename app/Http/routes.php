<?php

Route::group(['middleware' => 'web'], function () {

Route::auth();

Route::get('/home', 'HomeController@index');

});

Route::get('/sendmessage', 'ChatController@sendMessage');

?>
