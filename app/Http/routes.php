<?php
use Illuminate\Http\Request;
Route::resource('/', 'CustomAuth@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/projects','projectController@index');
    Route::get('/logout','CustomAuth@Logout');
    Route::get('/project/task','projectController@showTask');
    Route::get('/project/task-info','projectController@showTaskInfo');
    Route::get('/project/todo-task-info','projectController@showTodoTaskInfo');
    Route::post('/project/add-project','projectController@projectStore');
    Route::post('/project/add-comment','projectController@commentStore');
    Route::post('/project/add-task','projectController@taskStore');
});

/*Route::get('/',function(){
   $user = User::find(1);
    $user -> password = Hash::make('iwds_0001');
    $user ->save();
}); */