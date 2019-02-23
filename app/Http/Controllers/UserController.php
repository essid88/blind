<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;
use Crypt;
use Validator;
use Hash;
use Input;
  use Intervention\Image\ImageManagerStatic as Image;
class UserController extends Controller
{


 public function index(Request $request)
    {
         $inbox = imap_open('{imap.gmail.com:993/ssl}INBOX','blindvision88@gmail.com', 'essidl123198888') or die('Cannot connect to Gmail: ' . imap_last_error());
         
         $unread_emails = imap_search($inbox,'UNSEEN');
         $count_unread= count($unread_emails);
         session()->set('countmailer', $count_unread);
        $keyword = $request->get('search1');
        $perPage = 25;
        if (!empty($keyword)) {
            $User = User::paginate($perPage);
        } else {
            $User = User::paginate($perPage);
        }
         $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
         $User = User::where('name','like','%'.$search)->orWhere('email','like','%'.$search)->orWhere('id','like','%'.$search)->orderby('name')->paginate(20);
        return view('user.show', compact('User'));  
          }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
    	
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required',
            'photo' => 'image',      
        ]);
          $requestData = $request->all(); 
             if(empty($requestData['img'])){
            
            $photo =  Image::make( file_get_contents('uploads/no-image.jpg'));
         //  $photo = Image::make(imagecreatefromjpeg('uploads/no-image.jpg'));
             $password=bcrypt($request['password']) ; 
            $requestData['password']=$password; 
            $requestData['img']=$photo;
            User::create($requestData);
             $nom=$request->nom;
          return redirect('show_user')->with('success', $nom.'Was created  successfully!');
        }else{
        $file= $requestData['img'];
        Image::make($file)->resize(400,400);
        $file->move('uploads/', $file->getClientOriginalName());
        $requestData['img']=$file->getClientOriginalName();   
        $password=bcrypt($request['password']) ; 
        $requestData['password']=$password; 
        User::create($requestData);
        $nom=$request->nom;
        return redirect('show_user')->with('success', $nom.'Was created  successfully!');
    }
}

     public function show()
    {

       $User = User::all();  
       return view('user.show', compact('User')); 
    }


    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     *
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {


        $User = User::findOrFail($id);   
       
        $User->save();
        return view('user.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'email' => 'email|max:255',
            'photo' => 'image',
                   
        ]);
        $requestData = $request->all();
        $User = User::findOrFail($id);
        $User->update($requestData); 
    if($request->hasFile('img')){
       
        $image =$request->file('img');
        $filename = time() . '-' . $image->getClientOriginalExtension();
        $location = public_path('uploads/'. $filename);
        Image::make($image)->resize(400,400)->save($location);
        $oldfilename=$User->img;
        $User->img=$filename;
        Storage::delete($oldfilename);

        }
        $User->save();

        return redirect('show_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);


        return redirect('show_user');
    }



public function profil(){


        $user = Auth::User();     
        $UserId = $user->id; 
        $User_Name= $user->name;
        $User_Email= $user->email;
        $User_Pass= $user->password;
        $User_Role= $user->role;
        $User_photo= $user->img;
        return view ('myprofile', compact('User_photo','user','UserId','User_Name','User_Email','User_Pass','User_Role'));

}

public function reset(){
    $user = Auth::User();     
        $UserId = $user->id; 
        $User_Name= $user->name;
        $User_Email= $user->email;
        $User_Pass= $user->password;
        $User_Role= $user->role;
        return view ('user.resetpass', compact('user','UserId','User_Name','User_Email','User_Pass','User_Role'));
}


public function admin_credential_rules(array $data)
{
  $messages = [
    'current-password.required' => 'Please enter current password',
    'password.required' => 'Please enter password',
  ];

  $validator = Validator::make($data, [
    'current-password' => 'required',
    'password' => 'required|same:password',
    'password_confirmation' => 'required|same:password',     
  ], $messages);

  return $validator;
}  

public function postCredentials(Request $request)
{
  if(Auth::Check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
      return redirect('resetpassword')->with('error','The password confirmation and password must match.');
    }
    else
    {  
      $current_password = Auth::User()->password;           
      if(Hash::check($request_data['current-password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);;
        $obj_user->save(); 
      
         return redirect('resetpassword')->with('success','The Password Was Updated');
      }
      else
      {           
       
        return redirect('resetpassword')->with('error','please enter correct password');  
      }
    }        
  }
  else
  {
    return view('user.resetpass');
  }    
}



}
