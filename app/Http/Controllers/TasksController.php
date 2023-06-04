<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data = [
            'count_task' => Task::latest()->count(),
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_tasks',
            'title'      => 'liste de tâches'
        ];
    
        if ($request->ajax()) {
            $status = $request->status;
    
            $q_task = Task::select('*');
    
            if ($status) {
                $q_task->where('status', $status);
            }
    
            return Datatables::of($q_task)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-info btn-circle mr-2 edit edittask"><i class="fi-rr-edit"></i></div>';
                    $btn .= '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deletetask"><i class="fi-rr-trash"></i></div>';
                    $btn .= '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Complete" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 copletedTask"><i class="fi-rr-check"></i></div>';
    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('layouts.v_template', $data);
    }
    

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $task = Task::updateOrCreate(
            ['id' => $request->task_id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'Non complète',
                'user_id' => $user_id
            ]
        );

        return response()->json(['success' => 'Tâche enregistrée avec succès !']);
    }



    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Tâche non trouvée'], 404);
        }

        $task->status = 'Complète';
        $task->save();

        return response()->json(['success' => 'Statut mis à jour avec succès']);
    }

    public function destroy($id)
    {
        Task::find($id)->delete();

        return response()->json(['success' => ' deleted!']);
    }
    public function markAsCompleted($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Tâche non trouvée'], 404);
        }

        $task->status = 'Complète';
        $task->save();

        return response()->json(['success' => 'Statut mis à jour avec succès']);
    }
}
