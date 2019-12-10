<?php



Route::get('pages','FacultyController@pages')->name('pages')->middleware('faculty');

Auth::routes();


Route::middleware(['auth','role:Student|Admin'])->group(function () {
Route::get('student/dashboard','Student\HomeController@index')->name('sutdent.dashboard');
Route::get('student/profile', 'Student\HomeController@getProfile')->name('student.profile');
Route::post('student/profile', 'Student\HomeController@postProfile')->name('student.auth.profile');

Route::get('student/packages','Student\PackagesController@index')->name('student.packages');
Route::get('student/packages/{id}/package_details/','Student\PackagesController@package_details');

Route::get('student/mypackages','Student\MyPackagesController@index');
Route::get('student/mypackages/{id}/details/', 'Student\MyPackagesController@details');
    
Route::get('student/notifications','Student\NotificationsController@index');
    
Route::get('student/news','Student\NewsController@index');

Route::get('exams','Student\ExamsController@index')->name('exam.index');
Route::get('student/exams/{id}/instruction/', 'Student\ExamsController@instruction');
Route::get('student/exams/{id}/summary/', 'Student\ExamsController@summary');
Route::get('student/exams/{id}/give/', 'Student\ExamsController@give');
Route::post('student/exams/{id}/submit', 'Student\ExamsController@submit');
Route::get('student/exams/complete', 'Student\ExamsController@complete');
Route::get('student/attempt-exams', 'Student\ExamsController@attempted');
Route::get('student/attempt-exams/{id}/details', 'Student\ExamsController@details');

});

Route::middleware(['auth','role:Admin'])->group(function () {
Route::get('/','HomeController@index');

Route::get('profile','HomeController@getProfile')->name('profile');
Route::post('profile','HomeController@postProfile')->name('profile.update');

Route::get('basic-settings','HomeController@basic_settings')->name('auth.basic_settings');
Route::post('basic_settings_submit','HomeController@basic_settings_submit')->name('admin.auth.basic_settings_submit');

Route::get('dashboard', 'HomeController@index')->name('dashboard');

Route::get('students','UserController@index')->name('liststudents');
Route::get('students-datatable','UserController@index11')->name('liststudents-data');
Route::get('add-students','UserController@create')->name('user.create');
Route::post('add-students-store','UserController@store')->name('users.store');
Route::get("/edit-students/{id?}","UserController@editstudent")->name("editstudentsdata");
Route::post("/edit-save-students","UserController@editSavestudentData")->name('editsavestudents');
Route::post("/delete-student","UserController@deleteStudent")->name("deletestudent");
Route::get("/active-students/{id?}","UserController@changeStatus")->name("activestudentsdata");
Route::get("/inactive-students/{id?}","UserController@changeStatus")->name("inactivestudentsdata");
Route::get('import','UserController@import')->name('import');
Route::post('students-import-store','UserController@import_store')->name('users.import_store');
Route::get('user-export-data','UserController@export_data')->name('users.export_data');


Route::get('/add-faculty-type',"FacultyTypeController@addfacultytype")-> name("addfacultytype");
Route::get('/list-faculty-type',"FacultyTypeController@listfacultytype")-> name("listfacultytype");
Route::get('faculty-type/{id}', 'FacultyTypeController@changeStatus');
Route::post("/save-faculty-type","FacultyTypeController@saveFacultyType")->name("savefacultytype");
Route::post('faculty-type/destroy','FacultyTypeController@destroy')->name('faculty-type/destroy');

Route::get('/add-faculty',"FacultyController@addfaculty")-> name("addfaculty");
Route:: get('teacher','Teacher@index')->name('listteacher');
Route:: get('teacher/data','Teacher@index11')->name('teacher.datatables');
Route::get('faculty-status/{id}', 'FacultyController@changeStatus');
Route::get('faculty/{id}/edit', 'FacultyController@editfaculty');
Route::post('faculty/edit', 'FacultyController@saveeditFaculty')->name("saveeditFaculty");
Route::post("/save-faculty","FacultyController@saveFaculty")->name("savefaculty");
Route::post('faculty-type-delete','FacultyController@facultydestroy')->name('facultydestroy');
Route::get('import_faculty','FacultyController@import')->name('import_faculty');
Route::post('faculty-import-store','FacultyController@import_store')->name('faculty.import_store');
Route::get('faculty-export-data','FacultyController@export_data')->name('faculty.export_data');

Route::resource('subjectmodules','SubjectModulesController');
Route::get("/edit-subjectmodules/{id?}","SubjectModulesController@editsubjectmodules")->name("editsubjectmodulesdata");
Route::post("/edit-update-subjectmodules","SubjectModulesController@editupdatesubjectmodulesData")->name('editsavesubjectmodules');
Route::get('subjectmodules-datatable','SubjectModulesController@index11')->name('subjectmodules-data');
Route::post("/delete-subjectmodules","SubjectModulesController@deleteSubjectmodules")->name("deletesubjectmodules");
Route::get("/active-subjectmodules/{id?}","SubjectModulesController@changeStatus")->name("activesubjectmodulesdata");
Route::get("/inactive-subjectmodules/{id?}","SubjectModulesController@changeStatus")->name("inactivesubjectmodulesdata");


Route::resource('subjects','SubjectController');
Route::get('subjects-datatable','SubjectController@index11')->name('subjects-data');
Route::post("/delete-subjects","SubjectController@deletesubjects")->name("deletesubjects");
Route::get("/active-subjects/{id?}","SubjectController@changeStatus")->name("activesubjectsdata");
Route::get("/inactive-subjects/{id?}","SubjectController@changeStatus")->name("inactivesubjectsdata");



Route::resource('questions','QuestionsController');
Route::get('questions-datatable','QuestionsController@index11')->name('questions-data');
Route::get('topics/{id}/export_question_data/', 'QuestionsController@export_question_data');
Route::get('question-import','QuestionsController@import_question')->name('questions.import');
Route::post('questions/import_store','QuestionsController@import_store')->name('questions.import_store');


Route::resource('topics','TopicController');
Route::post("/delete-topics","TopicController@deletetopics")->name("deletetopics");
Route::get('topics-datatable','TopicController@index11')->name('topics-data');
Route::get("/active-topics/{id?}","TopicController@changeStatus")->name("activetopicsdata");
Route::get("/inactive-topics/{id?}","TopicController@changeStatus")->name("inactivetopicsdata");
Route::get('topic-export-data','TopicController@export_data')->name("topic-export-data");
Route::get('topic-import','TopicController@import_topic')->name('topic.import');
Route::post('topic/import_store','TopicController@import_store')->name('topic.import_store');



Route::resource('packages','PackagesController');
Route::get('packages-datatable','PackagesController@index11')->name('packages-data');


Route::resource('subjectmodulesresults','SubjectModulesResultsController');
Route::get('subjectmodulesresults-datatable','SubjectModulesResultsController@index11')
->name('subjectmodulesresults-data');
Route::get('subjectmodulesresults-user_list','SubjectModulesResultsController@user_list')
->name('subjectmodulesresults-user_list');
Route::get('subjectmodulesresults/{id}/view_user_all_results/'
			, 'SubjectModulesResultsController@view_user_all_results');
Route::get('subjectmodulesresults/{id}/view_exam_details/', 'SubjectModulesResultsController@view_exam_details');
 Route::get('subjectmodulesresults/{id}/view_user_passed_attempts/', 'SubjectModulesResultsController@view_user_passed_attempts');
 Route::get('subjectmodulesresults/{id}/view_user_failed_attempts/', 'SubjectModulesResultsController@view_user_failed_attempts');
 Route::get('subjectmodulesresults/{id}/user_wise_analysis/', 'SubjectModulesResultsController@user_wise_analysis');
 Route::get('subjectmodulesresults/{id}/view_all_results/', 'SubjectModulesResultsController@view_all_results');
 Route::get('subjectmodulesresults/{id}/view_passed_attempts/', 'SubjectModulesResultsController@view_passed_attempts');
 Route::get('subjectmodulesresults/{id}/view_failed_attempts/', 'SubjectModulesResultsController@view_failed_attempts');
 Route::get('subjectmodulesresults/{id}/view_ranks/', 'SubjectModulesResultsController@view_ranks');
 Route::get('subjectmodulesresults/{id}/module_wise_analysis/', 'SubjectModulesResultsController@module_wise_analysis');


Route::get('bookings/index','BookingsController@index')->name('bookings.index');


Route::resource('notifications','NotificationsController');
Route::get('notifications-datatable','NotificationsController@index11')->name('notifications-data');


Route::get('news','NewsController@index')->name('news.index');
Route::get('/news/create','NewsController@create')->name('news.create');
Route::post('/news/store','NewsController@store')->name('news.store');
Route::post('news-delete','NewsController@destroy')->name('news.destroy');
Route::get('news/change-status/{id}', 'NewsController@changeStatus');
Route::get('news/{id?}/edit', 'NewsController@edit');
Route::post('/news/update','NewsController@update')->name('news.update');


Route::get('coupons','CouponsController@index')->name('coupons.index');
Route::post('coupons-delete','CouponsController@destroy')->name('coupons.destroy');
Route::get('/coupons/create','CouponsController@create')->name('coupons.create');
Route::post('/coupons/store','CouponsController@store')->name('coupons.store');
Route::get('/coupons/change-status/{id}', 'CouponsController@changeStatus');
Route::get('coupons/{id?}/edit', 'CouponsController@edit');
Route::post('/coupons/update','CouponsController@update')->name('coupons.update');




});



