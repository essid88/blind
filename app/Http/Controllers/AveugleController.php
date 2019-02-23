<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Aveugle;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;
  use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Auth;

class AveugleController extends Controller
{


     public function map(Request $request)
      {       
       $aveugles = Aveugle::all();  
       return view('google', compact('aveugles')); 
      }
        public function mapAll(Request $request)
      {       
       $aveugles = Aveugle::all();  
       return view('googleAll', compact('aveugles')); 
      }
      public function map1(Request $request)
      {       
       $aveugles = Aveugle::all();  
       return view('maps1', compact('aveugles')); 
      }



        public function mapidurgent($id)
        {
        $aveugle = Aveugle::select('id','nom','prenom','region','ville','photo','telephone','tele_famille','log','lat')->where('statut', '=', 'urgent')->get();
        $ave = Aveugle::findOrFail($id);
        $photo=$ave->photo;
        return view('google3', compact('aveugle','photo'));
        }

        public function mapid($id)
        {
        $aveugle = Aveugle::findOrFail($id);
        return view('google2', compact('aveugle'));
        }

        public function ok($id)
        {
         $aveugles = Aveugle::all();
        $ave = Aveugle::findOrFail($id);
        $i=$ave->id;
        $aveugle = Aveugle::select('id','nom','prenom','region','ville','photo','telephone','tele_famille','log','lat')->where('statut', '=', 'urgent')->get();
        $ave=Aveugle::where('id', '=', $i)->update(array('statut' => 'ok'));      
         if($aveugle){
        $aveugle = Aveugle::select('id','nom','prenom','region','ville','photo','telephone','tele_famille','log','lat')->where('statut', '=', 'urgent')->get();
          return view('google3', compact('aveugle'));
         }
        }


      public function table_detailed(Request $request)
      {         
       $aveugles = Aveugle::all();
       return view('aveugle.detailedtable', compact('aveugles')); 
       }


     public function showtable ($id)
        {
         $aveugle = Aveugle::findOrFail($id);
        return view('aveugle.detailedtable', compact('aveugle'));
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
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
         $aveugle1 = Aveugle::select('id','nom','prenom','photo','telephone','tele_famille')->where('statut', '=', 'urgent')->get();
         if($aveugle1==true){
         $aveugle = Aveugle::all();
         return view('aveugle.index', compact('aveugle1','aveugle'));
      }
        else{
        $keyword = $request->get('search');
        $perPage = 25;
        if (!empty($keyword)) {
            $aveugle = Aveugle::paginate($perPage);
        } else {
            $aveugle = Aveugle::paginate($perPage);
        }
         $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
         $aveugle = Aveugle::where('nom','like','%'.$search)->orWhere('prenom','like','%'.$search)->orWhere('ville','like','%'.$search)->orWhere('region','like','%'.$search)->orWhere('prenom','like','%'.$search)->orWhere('telephone','like','%'.$search)->orWhere('tele_famille','like','%'.$search)->orderby('nom')->paginate(20);
        return view('aveugle.index', compact('aveugle'));  
          }}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('aveugle.create');
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
            'auth' => 'required|unique:aveugles',
            'nom' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'prenom' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'ville' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'region' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'telephone' => 'required|numeric|min:8|unique:aveugles',
            'tele_famille' => 'required|numeric|min:8', 
            'photo' => 'image',        
        ]);
        $requestData = $request->all();
        if(empty($requestData['photo'])){
            echo "no photo created";
            $photo =  Image::make( file_get_contents('uploads/no-image.jpg'));
         //  $photo = Image::make(imagecreatefromjpeg('uploads/no-image.jpg'));
            $requestData['photo']=$photo;
            Aveugle::create($requestData);

        }
        else{
        $file= $requestData['photo'];
        Image::make($file)->resize(400,400);
        $file->move('uploads/', $file->getClientOriginalName());
        $requestData['photo']=$file->getClientOriginalName();   
        Aveugle::create($requestData);
        }
        $nom=$request->nom;
        return redirect('aveugle')->with('success', $nom.'Was created  successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $aveugle = Aveugle::findOrFail($id);
        return view('aveugle.show', compact('aveugle'));
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


        $aveugle = Aveugle::findOrFail($id);   
       
        $aveugle->save();
        return view('aveugle.edit', compact('aveugle'));
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
            
            'nom' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'prenom' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'ville' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'region' => 'required|regex:/^[A-Za-z\s-_]+$/',
            'telephone' => 'required|numeric|min:8',
            'tele_famille' => 'required|numeric|min:8', 
            'photo' => 'image',        
        ]);
        $requestData = $request->all();
        $aveugle = Aveugle::findOrFail($id);
        $aveugle->update($requestData);
        if($request->hasFile('photo')){
       
        $image =$request->file('photo');
        $filename = time() . '-' . $image->getClientOriginalExtension();
        $location = public_path('uploads/'. $filename);
        Image::make($image)->resize(400,400)->save($location);
        $oldfilename=$aveugle->photo;
        $aveugle->photo=$filename;
        Storage::delete($oldfilename);

        } 
        $aveugle->save();
        $nom=$request->nom;
        return redirect('aveugle')->with('success', $nom.'Was Updated !');
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
        Aveugle::destroy($id);
 
        Session::flash('flash_message', 'Blind deleted!');

        return redirect('aveugle');
    }
     public function calendar(Request $request)
      {       
       $aveugles = Aveugle::all();  
       return view('cal', compact('aveugles')); 
     }

    
}
