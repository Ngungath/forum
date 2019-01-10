<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/forum', [
 'uses'=>'ForumsController@index',
 'as'=>'forum'
]);


Route::get('discussion/{slug}',[
    'uses'=>'DiscussionsController@show',
    'as'=>'discussion.show'
  ]);

Route::group(['middleware'=>'auth'],function(){
  Route::resource('channels','ChannelsController');
  Route::get('channel/discussion/{id}',[
   'uses'=>'ChannelsController@discussion',
   'as'=>'channel.discussion'

  ]);

  Route::get('/discussion/create/new',[
    'uses'=>'DiscussionsController@create',
    'as'=>'discussion.create'
  ]);

    Route::post('/discussion/store',[
    'uses'=>'DiscussionsController@store',
    'as'=>'discussion.store'
  ]);


    Route::get('/discussion',[
     'uses'=>'DiscussionsController@index',
     'as'=>'discussion'
    ]);

     Route::post('/discussion/reply/{id}',[
     'uses'=>'DiscussionsController@reply',
     'as'=>'discussion.reply'
    ]);

     Route::get('reply/like/{id}',[
      'uses'=>'RepliesController@like',
      'as'=>'reply.like'


     ]);

     Route::get('reply/unlike/{id}',[
      'uses'=>'RepliesController@unlike',
      'as'=>'reply.unlike'


     ]);
    
    Route::get('/discussion/watch/{id}',[
       'uses'=>'WatchersController@watch',
       'as'=>'discussion.watch'
      
    ]);

      Route::get('/discussion/unwatch/{id}',[
       'uses'=>'WatchersController@unwatch',
       'as'=>'discussion.unwatch'
      
    ]);
   
   Route::get('reply/best/answer/{id}',[
     'uses'=>'RepliesController@best_answer',
     'as'=>'reply.best.answer'

   ]);

   //update post routes

   Route::get('/discussion/edit/{slug}',[
    'uses'=>'DiscussionsController@edit',
    'as'=>'discussion.edit'

   ]);

  Route::post('/discussion/update/{slug}',[
    'uses'=>'DiscussionsController@update',
    'as'=>'discussion.update'

   ]);

  // update reply routes
   Route::get('/reply/edit/{slug}',[
    'uses'=>'RepliesController@edit',
    'as'=>'reply.edit'

   ]);

  Route::post('/reply/update/{slug}',[
    'uses'=>'RepliesController@update',
    'as'=>'reply.update'

   ]);


});
