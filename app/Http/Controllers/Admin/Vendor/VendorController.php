<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Shop\Employees\Repositories\EmployeeRepository;
use App\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Shop\Roles\Repositories\RoleRepositoryInterface;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    private $employeeRepo;
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepo;

    /**
     * EmployeeController constructor.
     *
     * @param EmployeeRepositoryInterface $employeeRepository
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(
        EmployeeRepositoryInterface $employeeRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->employeeRepo = $employeeRepository;
        $this->roleRepo = $roleRepository;
    }

    public function register(){
        return view('vendors.register');
    }

    public function store(Request $request){
        $request['status'] = false;
        // dd($request->all());
        $employee = $this->employeeRepo->createEmployee($request->all());

        $role = $this->roleRepo->findRoleByName('vendor');
        // if ($request->has('role')) {
            $employeeRepo = new EmployeeRepository($employee);
            $employeeRepo->syncRoles([$role->id]);
        // }

        return redirect()->back();
    }
}
