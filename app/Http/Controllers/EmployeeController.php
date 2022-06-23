<?php

namespace App\Http\Controllers;

use App\Mail\EmployeeAdminEmail;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Employee::class, 'employee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $emp = Employee::withCount('permissions')->get();
        return view('employees.index',['employees'=>$emp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.craete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(),[
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email',
            'salary'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'status'=>'required',
            'job_title'=>'required',

        ]);

        if(!$validator->fails()){
            $passwordRandom = Str::random(8);
            $emp = new Employee();
            $emp->fname = $request->input('fname');
            $emp->lname = $request->input('lname');
            try{
                /**
                 * If User Delete using SoftDelete , The result equal null , but username is orady is find .
                 */
                if(is_null(Employee::where('username',$request->input('fname').$request->input('lname'))->first())){
                    $emp->username = $request->input('fname').$request->input('lname');
                }else{
                    $emp->username = $request->input('fname').$request->input('lname').Str::random(3);
                }
            }catch(Exception $ex){
                $emp->username = $request->input('fname').$request->input('lname').Str::random(3);
            }

            $emp->email = $request->input('email');
            $emp->salary = $request->input('salary');
            $emp->jop_title = $request->input('job_title');
            $emp->phone = $request->input('phone');
            $emp->gender = $request->input('gender');
            $emp->status = $request->input('status') ? 'active' : 'block';
            $emp->is_online = 0;
            $emp->address = $request->input('address');
            $emp->password = Hash::make($passwordRandom); // password
            $emp->avater = 'assets/img/upload/media/login.png';
            $isSaved = $emp->save();
            if($isSaved){
                Mail::to($emp)->send(new EmployeeAdminEmail($emp,$passwordRandom));
            }
            return response()->json(
                [
                    'msg'=>$isSaved ? 'Save new emplyee is success' : 'Error Save is success'
                ],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{

            return response()->json(
                [
                    'msg'=>$validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show',['emp'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',['emp'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $validator = Validator($request->all(),[
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email',
            'salary'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'status'=>'required',
            'job_title'=>'required',

        ]);

        if(!$validator->fails()){
            $employee->fname = $request->input('fname');
            $employee->lname = $request->input('lname');
            $employee->username = $request->input('fname').$request->input('lname');
            $employee->email = $request->input('email');
            $employee->salary = $request->input('salary');
            $employee->jop_title = $request->input('job_title');
            $employee->phone = $request->input('phone');
            $employee->gender = $request->input('gender');
            $employee->status = $request->input('status') ? 'active' : 'block';
            $employee->address = $request->input('address');
            $employee->avater = 'assets/img/upload/media/login.png';
            $isSaved = $employee->save();

            // return
            return response()->json(
                [
                    'msg'=>$isSaved ? 'Save new emplyee is success' : 'Error Save is success'
                ],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{

            return response()->json(
                [
                    'msg'=>$validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back();
    }

     /**
     * Show All items is removed.
     *
     * @return \Illuminate\Http\Response
     */
    public function trush(){
        $emp = Employee::onlyTrashed()->get();
        return view('employees.trash',['employees'=>$emp]);
    }

     /**
     * Method Using restor item is removed softDelete.
     * @return \Illuminate\Http\Response
     */
    public function restor($id){
        Employee::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }


    public function editUserPermission(Request $request , Employee $employee ){
        $permissions = Permission::where('guard_name','admin')->get();
        $empPermissions = $employee->permissions;
        if(count($empPermissions) > 0){
            foreach($permissions as $permission){
                $permission->setAttribute('assign',false);
                foreach($empPermissions as $empPermission){
                    if($empPermission->id == $permission->id){
                        $permission->setAttribute('assign',true);
                    }
                }
            }
        }
        return view('employees.permissions',['employee'=>$employee,'permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function updateUserPermission(Request $request , Employee $employee ){

        $validator = Validator($request->all(),[
            'permission_id' =>'required|exists:permissions,id'
        ]);

        if(!$validator->fails()){
            $permission = Permission::findOrFail($request->input('permission_id'));
            if($employee->hasPermissionTo($permission)){
                $employee->revokePermissionTo($permission);
            }else{
                $employee->givePermissionTo($permission);
            }
            return response()->json(['msg'=>'Success add this permission'],Response::HTTP_OK);
        }else{
        return response()->json(['msg'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }
    }
}
