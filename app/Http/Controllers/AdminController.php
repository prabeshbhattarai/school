<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\FeeCategory;
use App\Models\FeeAmount;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function AdminDashboard(){
        return view('admin.index');
    }//end method

    public function AdminLogin(){
        return view('admin.admin_login');

    }//end method

    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//end method

    public function AdminView(){
        //$allData = User::all();
        $data['allData'] = User::all(); 
        return view('admin.backend.admin_view', $data);
    }//end method

    public function AdminAdd(){
        return view('admin.backend.admin_add');
    }//end method


    public function AdminStore(Request   $request){

        $validatedData = $request->validate([
            
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);
    
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.view')->with($notification);

    }//end method


    public function AdminEdit($id){
        $editData = User::find($id);
        return view('admin.backend.admin_edit', compact('editData'));
    }//end method

    public function AdminUpdate (request $request, $id){
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.view')->with($notification);
      
    }//end method

    public function AdminDelete( $id){
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('admin.view')->with($notification);
    }//end method


        

    public function AdminProfile(){
        $id=Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.backend.admin_profile_view',compact('adminData'));
    }//end method


    public function AdminProfileStore(request $request){
        $id=Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->gender = $request->gender;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }//end method

    public function AdminProfileEdit(){
        $id=Auth::user()->id;
        $editData = User::find($id);

        return view('admin.backend.admin_profile_edit',compact('editData'));

    }

    public function AdminPassword(){
        return view('admin.backend.admin_password');
        
    }

    public function AdminPasswordUpdate(request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();

            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }//end method

    public function AdminStudentClass(){
        $data['allData'] = StudentClass::all();
        return view('admin.backend.setup.student_class.student_class_view', $data);
    }

    public function AdminStudentClassAdd(){
        return view('admin.backend.setup.student_class.student_class_add');
    }//end method

    public function AdminStoreStudentClass(request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.student.class')->with($notification);
    }//end method

    public function AdminClassEdit($id){
        $editData = StudentClass::find($id);
        return view('admin.backend.setup.student_class.student_class_edit', compact('editData'));
    
    }//end method
    

    public function AdminUpdateClass(request $request, $id){
       
        $data = StudentClass::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.student.class')->with($notification);
    }//end method

    public function AdminClassDelete($id){
        $data = StudentClass::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('admin.student.class')->with($notification);
    }//end method

    public function AdminStudentYear(){
        $data['allData'] = StudentYear::all();
        return view('admin.backend.setup.student_year.student_year_view', $data);
    }//end method

    public function AdminYearAdd(){
        return view('admin.backend.setup.student_year.student_year_add');
    }//end method

    public function AdminStoreYear(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.student.year')->with($notification);
    }//end methods

    public function AdminYearEdit($id){
        $editData = StudentYear::find($id);
        return view('admin.backend.setup.student_year.student_year_edit', compact('editData'));
    }//end method

    public function AdminUpdateYear(request $request, $id){
        $data = StudentYear::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.student.year')->with($notification);
    }//end method
    
    public function AdminYearDelete($id){
        $data = StudentYear::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('admin.student.year')->with($notification);
    }//end method

    public function AdminStudentGroup(){
        $data['allData'] = StudentGroup::all();
        return view('admin.backend.setup.student_group.student_group_view', $data);
    }//end method

    public function AdminGroupAdd(){
        return view('admin.backend.setup.student_group.student_group_add');
    }//end method

    public function AdminStoreGroup(request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.student.group')->with($notification);
    }//end method

    public function AdminGroupEdit($id){
        $editData = StudentGroup::find($id);
        return view('admin.backend.setup.student_group.student_group_edit', compact('editData'));
    }//end method

    public function AdminUpdateGroup(request $request, $id){
        $data = StudentGroup::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.student.group')->with($notification);
    }//end method

    public function AdminGroupDelete($id){
        $data = StudentGroup::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('admin.student.group')->with($notification);
    }//end method

    public function AdminStudentShift(){
        $data['allData'] = StudentShift::all();
        return view('admin.backend.setup.student_shift.student_shift_view', $data);
    }//end method

    public function AdminShiftAdd(){
        return view('admin.backend.setup.student_shift.student_shift_add');
    }//end method

    public function AdminStoreShift(request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.student.shift')->with($notification);
    }//end method

    public function AdminShiftEdit($id){
        $editData = StudentShift::find($id);
        return view('admin.backend.setup.student_shift.student_shift_edit', compact('editData'));
    }//end method

    public function AdminUpdateShift(request $request, $id){
        $data = StudentShift::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.student.shift')->with($notification);
    }//end method

    public function AdminShiftDelete($id){
        $data = StudentShift::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('admin.student.shift')->with($notification);
    }//end method

    public function AdminFeeCategory(){
        $data['allData'] = FeeCategory::all();
        return view('admin.backend.setup.fee_category.fee_category_view', $data);
    }//end method

    public function AdminFeeCategoryAdd(){
        return view('admin.backend.setup.fee_category.fee_category_add');
    }//end method

    public function AdminStoreFeeCategory(request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.fee.category')->with($notification);
    }//end method

    public function AdminFeeCategoryEdit($id){
        $editData = FeeCategory::find($id);
        return view('admin.backend.setup.fee_category.fee_category_edit', compact('editData'));
    }//end method

    public function AdminUpdateFeeCategory(request $request, $id){
        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.fee.category')->with($notification);
    }//end method

    public function AdminFeeCategoryDelete($id){
        $data = FeeCategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('admin.fee.category')->with($notification);
    }//end method



    public function AdminFeeAmount(){
        //$data['allData'] = FeeAmount::all();
        $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('admin.backend.setup.fee_amount.fee_amount_view', $data);
    }//end method

    public function AdminFeeAmountAdd(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('admin.backend.setup.fee_amount.fee_amount_add', $data);
    }//end method

    public function AdminStoreFeeAmount(request $request){
        $countClass = count($request->class_id);
        if($countClass != NULL){
            for($i=0; $i<$countClass; $i++){
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//end for loop
        }//end if

        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.fee.amount')->with($notification);
    }//end method

    public function AdminFeeAmountEdit($fee_category_id){
        $data['editData'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('admin.backend.setup.fee_amount.fee_amount_edit', $data);
    }//end method

    public function AdminUpdateFeeAmount(request $request, $fee_category_id){
        if($request->class_id == NULL){
            return redirect()->back()->with('error', 'Sorry! You do not select any item');
        }else{
            $countClass = count($request->class_id);
            FeeAmount::where('fee_category_id', $fee_category_id)->delete();
            for($i=0; $i<$countClass; $i++){
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//end for loop
        }//end else

        $notification = array(
            'message' => 'Fee Amount Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.fee.amount')->with($notification);
    }//end method
    
    
    





    


   
    


  
   
}
