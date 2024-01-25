<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

use function Ramsey\Uuid\v1;

class ProjectController extends Controller
{
    public function index()
    {
        return view('company.projects.index');
    }

    public function create()
    {
        $users = $this->getUsers();

        return view('company.projects.create', compact('users'));
    }

    public function getUsers()
    {
        return User::role(User::ROLE_USER)
            ->whereCompanyUserId(Auth::id())
            ->pluck('name', 'id')
            ->toArray();
    }


    public function store(Request $request)
    {
        $input = $request->all();

        $exist = Project::whereRaw('lower(name) = ?', [strtolower($input['name'])])
            ->whereUserId(Auth::id())
            ->exists();

        if ($exist) {
            throw new UnprocessableEntityHttpException("Project with same name already exists");
        }

        $input['user_id'] = Auth::id();

        try {
            DB::beginTransaction();

            /** @var Project $project */
            $project = Project::create($input);
            $project->users()->sync($input['users']);

            flash()->success('Project created successfully');
            DB::commit();

            return redirect(route('company.projects.index'));
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $users = $this->getUsers();

        $selectedUsers = $project->users->pluck('id')->toArray();

        return view('company.projects.edit', compact('project', 'users', 'selectedUsers'));
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

        $project = Project::findOrFail($id);
        $exist = Project::whereRaw('lower(name) = ?', [strtolower($input['name'])])
            ->where('id', '!=', $project->id)
            ->whereUserId(Auth::id())
            ->exists();

        if ($exist) {
            throw new UnprocessableEntityHttpException("Project with same name already exists");
        }

        $input['user_id'] = Auth::id();

        try {
            DB::beginTransaction();

            /** @var Project $project */
            $project->update($input);
            $project->users()->sync($input['users']);

            flash()->success('Project updated successfully');
            DB::commit();

            return redirect(route('company.projects.index'));
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->users()->detach();
        $project->delete();

        return $this->sendMessage('Project deleted successfully');
    }
}
