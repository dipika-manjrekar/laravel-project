<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Crypt;
use Session;
use Helper;

class mainmodel extends Model
{
    public function currentdate(){
        $date = Carbon::now();
        return $currentdate = date('Y-m-d',strtotime($date));
    }
    public function currenttime(){
        $date = Carbon::now();
        return $currenttime = date('H:i:s',strtotime($date));
    }
    public function datetime(){
        $date = Carbon::now();
        $datetime['todaysDate'] = date('Y-m-d',strtotime($date));
        $datetime['currentTime'] = date('H:i:s',strtotime($date));
        return $datetime;
    }

    public function insertdata($tablename,$data){
        //echo $data['updated_by'] =Session :: get('user_id');exit;
         $datetime =$this->datetime();
       //  $data['ip_address']='192';
         $data['date']= $datetime['todaysDate'];
         $data['time']= $datetime['currentTime'];
       //  $data['updated_by'] =Session :: get('user_id');
         $data['flag'] = 'Show';
   //DB::enableQuerylog();
         $insert = DB::table($tablename)->insertGetId($data);
        //$aa = DB::getQuerylog();
    // print_r($aa); exit;
         return $insert;
     }

     public function UpdateData($table_name,$keyname,$keyvalue,$data)
     {
        $datetime =$this->datetime();
        //  $data['ip_address']='192';
          $data['date']= $datetime['todaysDate'];
          $data['time']= $datetime['currentTime'];
       
     //   DB::enableQuerylog();
         $updates =  DB::table($table_name)->where([$keyname=>$keyvalue])->update($data);
     //	$aa= DB::getQuerylog();
     //	print_r($aa);
         return $updates;
     }
}
