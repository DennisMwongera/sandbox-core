<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    // all applications
    public function index()
    {
        $applications = Application::all()->toArray();
        return array_reverse($applications);
    }

    public function add(Request $request)
    {
        $application = new Application([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'development_status' => $request->boolean('development_status'),
            'developer' => $request->input('developer'),
            'deployment' => $request->input('deployment')
        ]);
        $application->save();

        return response()->json('post successfully added');
    }

    // edit post
    public function edit($id)
    {
        $application = Application::find($id);
        return response()->json($application);
    }


    // update post
    public function update($id, Request $request)
    {
        $application = Application::find($id);
        $application->update($request->all());

        return response()->json('post successfully updated');
    }

    // delete post
    public function delete($id)
    {
        $application = Application::find($id);
        $application->delete();

        return response()->json('post successfully deleted');
    }
}
