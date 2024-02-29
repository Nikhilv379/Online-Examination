<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Notification;
use App\Notifications\WelcomeNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Session;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = user::orderBy('updated_at', 'desc')->paginate(7);
        return view('/user/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('/user/create');
    }

    public function sendnotification(){
        $user=User::all();

        $detials=[
            'greeting'=>'Hi laravel developer',
        ];

        Notification::send($user, new WelcomeNotification($detials));
        // dd('done');
    }
    public function store(Request $request)
{
    $storeData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255|unique:users,email',
        'role' => 'required|in:admin,student,teacher',
        'password' => 'required|max:255',
    ]);

    // Hash the user's password before storing it
    // $storeData['password'] = Hash::make($request->password);

    // Create the user
    $user = User::create($storeData);
    $details = [
        'greeting' => 'Hello, new user!',
        'body' => 'Welcome to our platform. Enjoy your experience!',
        'password'=> $request->password
    ];

    // Notify the new user with the welcome notification
    $user->notify(new WelcomeNotification($details));

    return redirect('admin/users')->with('completed', 'User has been saved!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = user::findOrFail($id);
        return view('user/edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'role' => 'required|max:255',
        ]);

        // Hash the password
        $updateData['password'] = Hash::make($request->password);

        // Update the user
        User::whereId($id)->update($updateData);

        \Session::flash('completed', 'User has been updated'); // Flash the success message

        return redirect('admin/users');
    }



    public function destroy(string $id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect('admin/users')->with('completed', 'User has been deleted');
    }


}
