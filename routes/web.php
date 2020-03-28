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

// Route::get('/', function () {
//     return view('welcome');
// });
use App\User;
use App\Favories;
use App\Message;
use App\Messageline;

Route::get('/', function () {
	$locale = ((Cookie::get('language')  !==  null) && !empty(Cookie::get('language')))?Cookie::get('language'):'en';
	Cookie::queue('language', $locale, "1000");
    return redirect()->route('accueil', ['locale' => $locale]);;
});


Route::get('/home', function () {
	$locale = ((Cookie::get('language')  !==  null) && !empty(Cookie::get('language')))?Cookie::get('language'):'en';
	Cookie::queue('language', $locale, "1000");
    return redirect()->route('accueil', ['locale' => $locale]);;
})->name('accueilVide');

Route::get('/home/{locale}', function ($locale) {
	app()->setLocale($locale);
	Cookie::queue('language', $locale, "1000");
	$favories = Favories::where('user', auth()->id())->get();
	for ($i=0; $i < count($favories) ; $i++) { 
		$favories[$i]['user'] = User::where('id', $favories[$i]['favorie_user'])->get();
	}
    return view('pages.accueil')->withFavories($favories)->withLocale($locale);
})->name('accueil');

Route::get("/findLove/{locale}",function ($locale){
	app()->setLocale($locale);
	$users = User::where('id', '!=', auth()->id())->get();

	$favories_user =  DB::select('SELECT users.*  FROM users,favories WHERE favories.favorie_user = users.id AND favories.user ='.auth()->id());

		$favories_user_obj  = array();

	foreach ($favories_user as $favorie) {
		$temp = new User;
		    $temp->id = $favorie->id;
		    $temp->name = $favorie->name;
		    $temp->subname = $favorie->subname;
		    $temp->nickname = $favorie->nickname;
		    $temp->gender = $favorie->gender;
		    $temp->dob = $favorie->dob;
		    $temp->pob = $favorie->pob;
		    $temp->country = $favorie->country;
		    $temp->town = $favorie->town;
		    $temp->phone = $favorie->phone;
		    $temp->profession = $favorie->profession;
		    $temp->children = $favorie->children;
		    $temp->email = $favorie->email;
		    $temp->interet = $favorie->interet;
		    $temp->bio = $favorie->bio;
		    $temp->img = $favorie->img;
		    $temp->email_verified_at = $favorie->email_verified_at;
		    $temp->password = $favorie->password;
		    $temp->remember_token = $favorie->remember_token;
		    $temp->created_at = $favorie->created_at;
		    $temp->updated_at = $favorie->updated_at;
		array_push($favories_user_obj, $temp);
	}


	return view('pages.findLove')->withUsers($users)->withFavories($favories_user_obj)->withLocale($locale);
})->name('findLove')->middleware('auth');

Route::get('/{locale}/profil-detail/{id}', function ($locale,$id) {
	app()->setLocale($locale);
	$userProfile = User::find($id);
    return view('pages.profil-detail')->withUser($userProfile)->withLocale($locale);
})->name('profil-detail')->middleware('auth');

Route::get("/{locale}/profil",function ($locale){
	app()->setLocale($locale);
	$users = User::where('id', '!=', auth()->id())->get();
	return view('pages.profil')->withUsers($users)->withLocale($locale);
})->name('profil')->middleware('auth');


Route::get("/{locale}/chat",function($locale){
	app()->setLocale($locale);
	return view('pages.chat')->withLocale($locale);
})->middleware('auth')->name('chat');


Route::get("/{locale}/contact",function($locale){
	app()->setLocale($locale);
	return view('pages.contact')->withLocale($locale);
})->name('contact');

Route::get("/{locale}/histoire",function($locale){
	app()->setLocale($locale);
	return view('pages.histoire')->withLocale($locale);
})->name('histoire');

Route::get("/{locale}/event",function($locale){
	// app()->setLocale($locale);
	app()->setLocale($locale);
	return view('pages.evenement')->withLocale($locale);
})->name('event');


Route::get("/{locale}/admin",function($locale){
	// app()->setLocale($locale);
	app()->setLocale($locale);
	return view('pages.admin')->withLocale($locale);
})->name('admin')->middleware('auth');


Route::get("/{locale}/event",function($locale){
	// app()->setLocale($locale);
	app()->setLocale($locale);
	return view('pages.evenement')->withLocale($locale);
})->name('event');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::group([
  'prefix' => '{locale}', 
  'where' => ['locale' => '[a-zA-Z]{2}'],
  'middleware' => 'setlocale'
], function () {
    Auth::routes();
});
Route::get('/abonement', function () {
	return view('pages.abonement');
})->name('abonement');







//route d API
Route::post('/outOfFavorie', function () {
	$favorie = Favories::find(request('favorie_id'));
	$favorie->delete();
    return response()->json(['success' => 'true'], 200);
});

Route::post('/createFavorie', function () {
	$favorie = new Favories;
	$favorie->favorie_user = request('user_id');
	$favorie->user = auth()->id();
	$favorie->save();
    return response()->json(['success' => 'true'], 200);
});

Route::post('/deleteFavorie', function () {
	$favorie = Favories::where('user', auth()->id())->where('favorie_user',request('favorie_id'));
	$favorie->delete();
    return response()->json(['success' => 'true'], 200);
});


Route::post('/addMessageToline', function () {
	$message = new Message;
	$message->user_from = auth()->id();
	$message->message_line = request("message_line");
	$message->body = request("body");
	$message->save();
    return response()->json(['success' => 'true'], 200);
});

Route::post('/deleteMessageLine', function () {
	$list_message = Message::where('message_line', request('message_line'))->delete();

	$Line = Messageline::find(request('message_line'))->delete();

    return response()->json(['success' => 'true'], 200);
});

Route::post('/deleteMessage', function () {
	$message = Message::find(request('message_id'));
	$message->delete();
    return response()->json(['success' => 'true'], 200);
});

Route::post('/getLines', function () {
	$response = array();
	// $lines = Messageline::where('user_first',auth()->id())->orWhere('user_second',auth()->id())->get();

	// $messageline_users =  DB::select('SELECT users.*, messages.message_line as mlId  FROM users,messagelines,messages WHERE messages.message_line = messagelines.id AND users.id = messagelines.user_first AND messagelines.user_second = '.auth()->id().' or  users.id = messagelines.user_second AND messagelines.user_first = '.auth()->id().' GROUP BY messages.message_line,users.* ');

	$messageline_users =  DB::select("SELECT users.*, messagesInvers.message_line as mlId FROM users,messagelines,(SELECT * FROM messages WHERE 1 ORDER by messages.id DESC) as messagesInvers WHERE users.id = messagelines.user_first AND messagelines.user_second = ".auth()->id()." or users.id = messagelines.user_second AND messagelines.user_first = ".auth()->id()." AND messagesInvers.message_line = messagelines.id GROUP BY users.id ORDER by messagesInvers.created_at DESC;");

	$messageline_users_obj  = array();

	foreach ($messageline_users as $user) {
		$temp = new User;
		    $temp->id = $user->id;
		    $temp->name = $user->name;
		    $temp->subname = $user->subname;
		    $temp->nickname = $user->nickname;
		    $temp->gender = $user->gender;
		    $temp->dob = $user->dob;
		    $temp->pob = $user->pob;
		    $temp->country = $user->country;
		    $temp->town = $user->town;
		    $temp->phone = $user->phone;
		    $temp->profession = $user->profession;
		    $temp->children = $user->children;
		    $temp->email = $user->email;
		    $temp->interet = $user->interet;
		    $temp->bio = $user->bio;
		    $temp->img = $user->img;
		    $temp->email_verified_at = $user->email_verified_at;
		    $temp->password = $user->password;
		    $temp->remember_token = $user->remember_token;
		    $temp->created_at = $user->created_at;
		    $temp->updated_at = $user->updated_at;

		    $line = array(
		    	'user' =>$temp,
		    	'id'=> $user->mlId
		    );
		array_push($messageline_users_obj, $line);
	}

    return response()->json(['lines' => $messageline_users_obj], 200);
});

Route::post('/getLineLessages', function () {
	$messages = Message::where('message_line',request('message_line'))->get();
    return response()->json(['messages' => $messages], 200);
});

Route::post('/getUser', function () {
	$user = Auth::user();
    return response()->json(['user' => $user], 200);
});

Route::post("/findLoveAPI",function (){
	$users = User::where('id', '!=', auth()->id())->get();

	$favories_user =  DB::select('SELECT users.*  FROM users,favories WHERE favories.favorie_user = users.id AND favories.user ='.auth()->id());

		$favories_user_obj  = array();

	foreach ($favories_user as $favorie) {
		$temp = new User;
		    $temp->id = $favorie->id;
		    $temp->name = $favorie->name;
		    $temp->subname = $favorie->subname;
		    $temp->nickname = $favorie->nickname;
		    $temp->gender = $favorie->gender;
		    $temp->dob = $favorie->dob;
		    $temp->pob = $favorie->pob;
		    $temp->country = $favorie->country;
		    $temp->town = $favorie->town;
		    $temp->phone = $favorie->phone;
		    $temp->profession = $favorie->profession;
		    $temp->children = $favorie->children;
		    $temp->email = $favorie->email;
		    $temp->interet = $favorie->interet;
		    $temp->bio = $favorie->bio;
		    $temp->img = $favorie->img;
		    $temp->email_verified_at = $favorie->email_verified_at;
		    $temp->password = $favorie->password;
		    $temp->remember_token = $favorie->remember_token;
		    $temp->created_at = $favorie->created_at;
		    $temp->updated_at = $favorie->updated_at;
		array_push($favories_user_obj, $temp);
	}


	return response()->json(['users' => $users,'favories' => $favories_user_obj], 200);
});

Route::post('/addLineMessage', function () {


	$lineExpected = DB::select('SELECT * FROM `messagelines` WHERE (`user_first` = '.request('user_to').' AND `user_second`= '.auth()->id().' ) OR (`user_first`= '.auth()->id().' AND `user_second`= '.request('user_to').')');

	if ($lineExpected == null) {
		$Line = new Messageline;
		$Line->user_first = auth()->id();
		$Line->user_second = request('user_to');
		$Line->save();
	    return response()->json(['success' => 'true'], 200);
	}

	return response()->json(['success' => 'true'], 200);
});

Route::post('/majUser', function () {
	$user =  Auth::user();

	if (password_verify(request('password'), $user->password)) {
    	$user->name =  (!empty(request('name')))? request('name'): $user->name;
    	$user->subname =  (!empty(request('subname')))? request('subname'): $user->subname;
    	$user->nickname =  (!empty(request('nickname')))? request('nickname'): $user->nickname;
    	$user->country =  (!empty(request('country')))? request('country'): $user->country;
    	$user->town =  (!empty(request('town')))? request('town'): $user->town;
    	$user->phone =  (!empty(request('phone')))? request('phone'): $user->phone;
    	$user->profession =  (!empty(request('profession')))? request('profession'): $user->profession;
    	$user->children =  (!empty(request('children')))? request('children'): $user->children;
    	$user->email =  (!empty(request('email')))? request('email'): $user->email;
    	if (!empty(request()->image)) {
			request()->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',]);
	        $imageName = $user->email.'.'.request()->image->getClientOriginalExtension();
	        request()->image->move(public_path('/profile_picture/'), $imageName);
	    	$user->img =  $imageName;
    	}

    	if (!empty(request()->newpasseword)) {
	    	$user->password =  Hash::make(request('newpasseword'));
    	}



    	$user->save();
    	return response()->json(['success' => 'true'], 200);

	}

    return response()->json(['error' => 'incorrect password'], 403);
});


Route::post('/majUser2', function () {
	$user =  Auth::user();


    	$user->bio =  (!empty(request('bio')))? request('bio'): $user->bio;

    	$user->interet =  (!empty(request('interet')))? request('interet'): $user->interet;

    	$user->save();
    	return response()->json(['success' => 'true'], 200);
});

Route::post('/userDeteils', function () {
		$line = Messageline::where('user_first',auth()->id())->orWhere('user_second',auth()->id())->get();
		$message = Message::where("user_from",auth()->id())->get();
		$favories = Favories::where('user',auth()->id())->get();

		$response = array(
			'message'=> count($message),
			'personnes'=> count($line),
			'favories'=> count($favories),
		);
    	return response()->json(['details' =>$response], 200);
});

Route::post('/editBanner', function () {
		$banner = request('bannier');

		$user =  Auth::user();


    	$user->bannier = request('bannier');

    	$user->save();
    	return response()->json(['success' => 'true'], 200);
});

Route::post('/contactAPI', function () {

			$errorMSG = "";

			// NAME
			if (empty(request("name"))) {
			    $errorMSG = "Name is required ";
			} else {
			    $name = request("name");
			}

			// EMAIL
			if (empty(request("email"))) {
			    $errorMSG .= "Email is required ";
			} else {
			    $email = request("email");
			}



			// MSG Event
			if (empty(request("subject"))) {
			    $errorMSG .= "Subject is required ";
			} else {
			    $subject = request("subject");
			}


			// MESSAGE
			if (empty(request("message"))) {
			    $errorMSG .= "Message is required ";
			} else {
			    $message = request("message");
			}


			$EmailTo = "contact@islandofloves.com";
			$Subject = "New Reclamation";

			// prepare email body text
			$Body = "";
			$Body .= "Name: ";
			$Body .= $name;
			$Body .= "\n";
			$Body .= "Email: ";
			$Body .= $email;
			$Body .= "\n";
			$Body .= "\n";
			$Body .= "subject: ";
			$Body .= $subject;
			$Body .= "\n";
			$Body .= "Message: ";
			$Body .= $message;
			$Body .= "\n";

			// send email
			$success = mail($EmailTo, $Subject, $Body, "From:".$email);

			// redirect to success page
			if ($success && $errorMSG == ""){
			   echo "success";
			}else{
			    if($errorMSG == ""){
			        echo "Something went wrong :(";
			    } else {
			        echo $errorMSG;
			    }
			}

    		return response()->json(['success' => 'true'], 200);
});

