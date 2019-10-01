<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainmodel;
	use Datatables;
	use Illuminate\Support\Facades\Storage;
	use App\Users;
	
	use Illuminate\Support\Facades\Hash;
	use DB; 
	use Redirect;
	use Validator;
	use View;
	use Session;
	use Config;
	use Excel;
	use Crypt;
	use Flash;
	use Alert;

class usercontroller extends Controller
{
    public function index()
    {
        $showrecord = DB::table('tbl_contact_directory')->where('flag','Show')->get();
        return view('show-list',compact('showrecord'));
    }

    public function create()
    {
        return view('create-user');
    }

    public function store(Request $request){
      
        $mainmodel = new mainmodel();
        $photo = $request->file('photo');
        $data['first_name'] = $request->input('firstname');
        $data['middle_name'] = $request->input('lastname');
        $data['last_name'] = $request->input('middlename');
        $data['mobile_number'] = $request->input('contact_no');
        $data['landline_no'] = $request->input('landlineno');
        $data['email'] = $request->input('email_id');
        $data['notes'] = $request->input('notes');
		 $data['views'] = '0';
       if(!empty($photo))
	   {
		   $destinationPath = public_path('/uploads');
        $photo->move($destinationPath,$photo->getClientOriginalName());
            
        $data['photo'] = $photo->getClientOriginalName();
	   }
	   else{
		   $data['photo'] = '';
		   
	   }
        
        $table_name = 'tbl_contact_directory';
           
		$mainmodel->insertdata($table_name,$data);
        return redirect('show/list')->with('success', 'User Added Successfully');
    }

    public function show(Request $request){
        $showrecord = DB::table('tbl_contact_directory')->where('flag','Show')->get();
			
			return Datatables::of($showrecord)->addColumn('delete', function ($query) {
				$Deleteid = "'".Crypt::encrypt($query->id)."'";
				return '<center><a onclick="deleteFunction('.$Deleteid.',event)" ><img class="imgresp" src="'.asset('images/delete.png').'"></a></center>';
				})->addColumn('edit',function($query){			
				return '<center><a class="tdbutton  tdbuttonmargin" href="' . action('ActiveDirectoryController@edit',Crypt::encrypt($query->id)) .'" ><img class="imgresp" src="'.asset('images/edit.png').'"></a></center>';
			})
            ->rawColumns(['edit','delete'])
            ->escapeColumns(null)->make(true);
    }
    public function edit($id,$viewid){
    
        $user = DB::table('tbl_contact_directory')->where('id', $id)->first();
        return view('editUser', compact('user', 'id','viewid'));
    }

    public function update(Request $request,$id){
       
       
        $mainmodel = new mainmodel();
        $photo = $request->file('photo');
        $data['first_name'] = $request->input('firstname');
        $data['middle_name'] = $request->input('lastname');
        $data['last_name'] = $request->input('middlename');
        $data['mobile_number'] = $request->input('contact_no');
        $data['landline_no'] = $request->input('landlineno');
        $data['email'] = $request->input('email_id');
        $data['notes'] = $request->input('notes');
        $data['flag'] = 'Show';
		
        $data['views'] =$request->input('viewid');
       
        
        
        $table_name = 'tbl_contact_directory';
		$keyname = 'id';
        $keyvalue = $id;
      
        $mainmodel->UpdateData($table_name,$keyname,$keyvalue,$data);
		// Alert::success('Success', 'User Updated Successfully')->persistent(false,true);
       // return redirect('show/list')->with('success', 'User Updated Successfully');
    }

    public function destroy(Request $request){
       $id = $request->input('id');
        $mainmodel = new mainmodel();
        $table_name = 'tbl_contact_directory';
		$keyname = 'id';
        $keyvalue = $id;
        $data['flag'] = 'Deleted';
        $mainmodel->UpdateData($table_name,$keyname,$keyvalue,$data);
}
    
}
