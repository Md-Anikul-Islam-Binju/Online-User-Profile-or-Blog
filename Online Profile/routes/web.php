<?php



Route::get('/', function () {return view('pages.index');});


//admin acount create=======
Route::get('admin/account/create','Admin\SettingController@account')->name('account.create');


//admin=======
Route::get('admin/home','AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login');


// Password Reset Routes...
Route::get('admin/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');






//admin dashbord work.............................................

//setting 
Route::get('admin/setting','Admin\SettingController@setting')->name('admin.setting');
Route::post('store/setting','Admin\SettingController@StoreSetting')->name('store.setting');
Route::get('delete/setting/{id}','Admin\SettingController@DeleteSetting');
//use for setting
Route::get('inactive/setting/{id}','Admin\SettingController@Inactive');
Route::get('active/setting/{id}','Admin\SettingController@Active');
//use for slider
Route::get('inactive/setting/{id}','Admin\SettingController@InactiveSlider');
Route::get('active/setting/{id}','Admin\SettingController@ActiveSlider');




//slider 
Route::get('admin/slider','Admin\SettingController@slider')->name('admin.slider');
Route::post('admin/store/slider','Admin\SettingController@storeslider')->name('store.slider');
Route::get('delete/slider/{id}','Admin\SettingController@DeleteSlider');

//user information
Route::get('admin/person/info','Admin\PersonalInfoController@index')->name('user.info');
Route::post('admin/person/add','Admin\PersonalInfoController@store')->name('store.person');
Route::get('admin/person/all','Admin\PersonalInfoController@allinfo')->name('all.person_info');
Route::get('view/person/{id}','Admin\PersonalInfoController@ViewPerson');
Route::get('delete/person/{id}','Admin\PersonalInfoController@DeletePerson');
Route::get('edit/person/{id}','Admin\PersonalInfoController@EditPerson');
Route::post('update/person/{id}','Admin\PersonalInfoController@UpdatePerson');


//family member information
Route::get('admin/family/info','Admin\FamilyMemberController@index')->name('admin.info');
Route::post('admin/family/add','Admin\FamilyMemberController@store')->name('store.family');
Route::get('admin/family/all','Admin\FamilyMemberController@allinfo')->name('all.family_info');
Route::get('view/family/{id}','Admin\FamilyMemberController@ViewFamily');
Route::get('delete/family/{id}','Admin\FamilyMemberController@DeleteFamily');
Route::get('edit/family/{id}','Admin\FamilyMemberController@EditFamily');
Route::post('update/family/{id}','Admin\FamilyMemberController@UpdateFamily');


//all importent file uplode
Route::get('admin/file','Admin\UserFileController@file')->name('admin.file');
Route::post('admin/store/file','Admin\UserFileController@storefile')->name('store.file');
Route::get('delete/file/{id}','Admin\UserFileController@DeleteFile');

//blog uplode
Route::get('admin/blog','Admin\BlogPostController@blog')->name('admin.blog');
Route::post('admin/store/blog','Admin\BlogPostController@storeblog')->name('store.blog');
Route::get('delete/blog/{id}','Admin\BlogPostController@DeleteBlog');
Route::get('admin/blog/all','Admin\BlogPostController@allblog')->name('all.blog');
Route::get('view/blog/{id}','Admin\BlogPostController@ViewBlog');


//***********************fornt route**************************
//single user
Route::get('single/user/{id}','Admin\SingleUserController@single');

//single Family Member
Route::get('single/family/{id}','Admin\SingleUserController@singlefamilymember');


//User Blog
Route::get('user/blog','Admin\UserBlogController@blog')->name('blog.page');
//Single Blog
Route::get('single/blog/{id}','Admin\UserBlogController@singleblogpage');
//user file downlode
Route::get('file/downlode/{id}','Admin\UserBlogController@downlode');



