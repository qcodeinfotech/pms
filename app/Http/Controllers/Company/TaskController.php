<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class TaskController extends Controller
{
    public function index()
    {
        return view('company.tasks.index');
    }

    public function create()
    {
        $status = Status::user()->pluck('name', 'id')->toArray();
        $project = Project::user()->pluck('name', 'id')->toArray();
        $users = User::whereCompanyUserId(Auth::id())->pluck('name', 'id')->toArray();
        $selectedUsers = [];

        return view('company.tasks.create', compact('status', 'project', 'users', 'selectedUsers'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $users = $request->get('users');

        try {
            DB::beginTransaction();

            $input['user_id'] = Auth::id();
            $task = Task::create($input);
            $task->users()->sync($users);

            DB::commit();
            flash()->success('Task created successfully');

            return redirect(route('company.tasks.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function edit($id, Request $request)
    {
        $task = Task::find($id);

        $status = Status::user()->pluck('name', 'id')->toArray();
        $project = Project::user()->pluck('name', 'id')->toArray();
        $users = User::whereCompanyUserId(Auth::id())->pluck('name', 'id')->toArray();
        $selectedUsers = $task->users()->pluck('user_id')->toArray();

        return view('company.tasks.edit', compact('status', 'project', 'users', 'task', 'selectedUsers'));
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);
        $input = $request->all();

        try {
            DB::beginTransaction();

            $task->update($input);
            $task->users()->sync($request->get('users'));

            DB::commit();
            flash()->success('Task updated successfully');

            return redirect(route('company.tasks.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return $this->sendMessage('Task deleted successfully.');
    }
}
