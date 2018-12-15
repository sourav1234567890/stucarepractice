<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stu;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class StuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pagname');
    }

    /*new code for namesearch*/
    public function namesearch(Request $request){
    $name=$request->name;
     $result=DB::table('stus')->where('name','LIKE',"%{$name}%")->get();
     $Count = $result->count();

     if($Count>0){
        $response['success']=1;
        $response['error']=0;
        $response['data']=$result;
        echo json_encode($response);
        die();
     }else{
        $response['error']="1";
        $response['success']="0";
        echo json_encode($response);
        die();
     }
        
    }
    /*end*/

    /*new code for fetch all data*/
    public function fetchdata(){
        $result=DB::table('stus')->get();
        $response['success']='1';
        $response['error']='0';
        $response['data']=$result;
        echo json_encode($response);
        exit(0);
    }
    /*end*/

    /*new code add for fetch the designation department wise*/
    public function department(Request $request){
    $result=DB::table('designation')->where('departmentid',$request->departmentid)->get();
    $response['success'] = '1';
    $response['error'] = '0';
    $response['data']=$result;
    echo json_encode($response);
    exit(0);
    }
    /*end*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validation = Validator::make( Input::all(), [
            'name' => 'required',
            'agecount' => 'required',
            'date_of_birth' =>'required',
            'department' =>'required',
            'salarynew' =>'required',
            'image' =>'required',
            'designation'=>'required',

        ]);

        if( $validation->fails())
        {
            $response['success']='0';
            $response['error']='1';
            $response['successmsg'] = $validation->errors()->getMessages();
            echo json_encode($response);
            exit(0);

            
        }
        else{
        //
            if ($request->hasFile('image')) {
                $alldata=$request->all();
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $imgname = uniqid().$filename;
                $destinationPath = public_path('/image/');
                $file->move($destinationPath,$imgname);
                if($alldata['department']==1){
                    $department="cse";
                }
                if($alldata['department']==2){
                    $department="electrical";
                }

                $postdata=array(
                    'name'=>$alldata['name'],
                    'dob'=>$alldata['date_of_birth'],
                    'agecount'=>$alldata['agecount'],
                    'department'=>$department,
                    'designation'=>$alldata['designation'],
                    'salary'=>$alldata['salarynew'],
                    'image'=>$imgname,
                    
                );

                $submitdata=Stu::create($postdata);
                if($submitdata){

                    $response['success']='1';
                    $response['error']='0';
                    $response['success-msg']="data successfully inserted";
                    echo json_encode($response);
                    exit(0);


            }
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
