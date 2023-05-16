<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\Create;
use App\Http\Requests\Admin\Admin\Update;
use App\Models\Admin;
use App\Models\Role;
use App\Traits\ResponseTrait;

class AdminsController extends Controller {
    use ResponseTrait;
    public function index($id = null) {
        $admins = Admin::orderBy('id' , 'ASC')->get();
        return view('admin.admins.table', compact('admins'));
    }

    public function create() {
        $roles = Role::latest()->get();
        return view('admin.admins.create', compact('roles'));
    }

    public function store(Create $request) {
        Admin::create($request->validated());
        // Report::addToLog('  اضافه مدير');
        return $this->successOtherData(['url' => route('admin.index')]);
    }

    public function edit($id) {
        $admin = Admin::findOrFail($id);
        $roles = Role::latest()->get();
        return view('admin.admins.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    public function update($id, Update $request) {
        $admin = Admin::findOrFail($id);
        $admin->update($request->validated());
        // Report::addToLog('  تعديل مدير');
        return $this->successOtherData(['url' => route('admin.index')]);
    }

    public function show($id) {
        $admin = Admin::findOrFail($id);
        $roles = Role::latest()->get();
        return view('admin.admins.show', ['admin' => $admin, 'roles' => $roles]);
    }

    public function destroy($id) {
        if (1 == $id) {
            return;
        }

        Admin::findOrFail($id)->delete();
        // Report::addToLog('  حذف مدير');
        return $this->successOtherData(['id' => $id]);

    }
}
