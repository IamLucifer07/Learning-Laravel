<?php

namespace App\Http\Controllers;

use App\Models\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(4);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // public function store()
    // {
    //     request()->validate([
    //         'title' => ['required', 'min:4'],
    //         'salary' => ['required']
    //     ]);

    //     Job::create([
    //         'title' => request('title'),
    //         'salary' => request('salary'),
    //         'employer_id' => 4
    //     ]);

    //     return redirect('/jobs');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:4'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
            'employer_id' => 4
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    // public function update(Job $job)
    // {
    //     // authorize on hold.. 

    //     request()->validate([
    //         'title' => ['required', 'min:4'],
    //         'salary' => ['required']
    //     ]);

    //     $job->update([
    //         'title' => request('title'),
    //         'salary' => request('salary')
    //     ]);

    //     return redirect('/jobs/' . $job->id);
    // }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => ['required', 'min:4'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => $request->input('title'),
            'salary' => $request->input('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
