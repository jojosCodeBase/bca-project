<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        $tickets = Support::where('user_id', Auth::id())->orderByDesc('created_at')->paginate(10);
        return view('support.index', compact('tickets'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'attachment' => 'nullable|image|max:3072',
        ]);

        $support = new Support();
        $support->user_id = Auth::id();
        $support->subject = $request->subject;
        $support->description = $request->description;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('assets/support_files');

            // Create the directory if it doesn't exist
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $support->attachment = $filename;
        }

        $support->save();

        return back()->withSuccess('Support ticket created successfully!');
    }

    public function dashboard(){
        return view("support.dashboard");
        // return "hello from support dashboard";
    }
}
