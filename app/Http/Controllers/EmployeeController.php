<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Employee::all();
        return $data;
       // return view('empleados', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreEmployeeRequest $request)
    public function store(Request $request)

    {

        //
        // $request->validate([
        // 'name' => 'required',
        // 'email' => 'required',
        // 'jobposition' => 'required',
        // 'datebirth' => 'required',
        // 'address' => 'required'
        // ]);


        // $employee= new Employee;
        // $employee->save($data);
        // dd( $employee);
        // $employeeskills=$employee['skills'];
        // // $data=$request->all();
        // //     $result=Employee::create($data);
        // //     return redirect()->route('empleados');


             try {
             DB::beginTransaction();
            $data=$request->all();
            $result=Employee::create($data);


            DB::commit();
            return redirect()->route('empleados')
            ->with('success', 'Empleado creado exitosamente.');
             //$employee_id = $result->id;

            //  if ($audit['catalogAuditor']){$audits->auditor()->createMany($auditor2);}
            //  if ($audit['represent']){$audits->represent()->createMany($represent2);}
            //  if ($audit['acknowledgmentmanager_id']){$audits->acknowled()->createMany($acknowledgment);}


         }catch (\Exception $e) {
             DB::rollBack();
             return redirect()->back()->with('error', $e);

         }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Employee $employee)
    {
        $employee_id=$employee['id'];
        $data = Employee::find($employee_id);
        return $data;

    }
    public function mostrar(Request $request, Employee $employee)
    {
        $employee_id=$employee['id'];
        $data = Employee::find($employee_id);
        return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employee_id=$employee['id'];
        $employee = Employee::find($employee_id);

        return view('edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateEmployeeRequest $request, Employee $employee)
    public function update(Request $request, Employee $employee)

    {
        //
        // $request->validate([
        //     'name' => 'required',
        //     'introduction' => 'required',
        //     'location' => 'required',
        //     'cost' => 'required'
        // ]);
        $employee->update($request->all());

        return redirect()->route('empleados')
        ->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //

        dd("Llegando a Destroy");
    }
}
