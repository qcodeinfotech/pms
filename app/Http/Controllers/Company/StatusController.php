<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class StatusController extends Controller
{
    public function index()
    {
        return view('company.status.index');
    }

    public function store(Request $request)
    {
        $exist = Status::whereName($request->name)->whereUserId(Auth::id())->first();
        if ($exist) {
            throw new UnprocessableEntityHttpException('Stauts with same name already exists.');
        }

        Status::create([
            'name' => $request->name,
            'user_id' => Auth::id()
        ]);

        flash()->success('Status created successfully');

        return redirect(route('company.status.index'));
    }

    public function edit($id)
    {
        $status = Status::find($id);

        return $this->sendRespone($status, 'Status retrieived successfully');
    }

    public function update(Request $request, $id)
    {
        $status = Status::find($id);
        $exist = Status::where('id', '!=', $id)->whereName($request->name)->exists();
        if ($exist) {
            throw new UnprocessableEntityHttpException('Status with same name already exists');
        }

        $status->update(['name' => $request->name]);

        return $this->sendMessage('Status updated succssfully');
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete();

        return $this->sendMessage('Status deleted successfully');
    }
}
