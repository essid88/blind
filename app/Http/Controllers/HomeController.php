<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Aveugle;
use Session;
use Auth;
use \stdClass;
  use Intervention\Image\ImageManagerStatic as Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
      {
        $user = Auth::User();     
        $UserId = $user->id; 
        $User_Name= $user->name;
        $User_Email= $user->email;
        $User_photo= $user->img;
        session()->set('Userid', $UserId);
        session()->set('Username', $User_Name);
        session()->set('Useremail', $User_Email);

        $User_photo= $user->img;
        if(empty($User_photo)){
         $User_photo =  'no-image.jpg';
         session()->set('Userphoto', $User_photo);
        }else{
        session()->set('Userphoto', $User_photo);
        }
         $aveugle = Aveugle::select('id','nom','prenom','photo','telephone','tele_famille')->where('statut', '=', 'urgent')->get();
         if($aveugle==true){
          $inbox = imap_open('{imap.gmail.com:993/ssl}INBOX','blindvision88@gmail.com', 'essidl123198888') or die('Cannot connect to Gmail: ' . imap_last_error());
       
         $unread_emails = imap_search($inbox,'UNSEEN');
         $count_unread= count($unread_emails);
         session()->set('countmailer', $count_unread);
         session()->set('countmailer2', $count_unread);
         session()->set('msg',$count_unread." New Emails please check your inbox .");
         $aveugles = Aveugle::all();  
         return view('google', compact('aveugle','aveugles'));
      }
          $inbox = imap_open('{imap.gmail.com:993/ssl}INBOX','blindvision88@gmail.com', 'essidl123198888') or die('Cannot connect to Gmail: ' . imap_last_error());
         
         $unread_emails = imap_search($inbox,'UNSEEN');
         $count_unread= count($unread_emails);
         session()->set('countmailer', $count_unread);
         session()->set('countmailer2', $count_unread);
         session()->set('msg',"New Emails please check your inbox .");
         $aveugles = Aveugle::all();
         return view('google', compact('aveugles'));
      }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return view('auth.login');
    }


public function pagenotfound()
    {
        return view('/404');
        }
}
