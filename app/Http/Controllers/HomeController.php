<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\UserEvent;
use Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $data = UserEvent::get();
 
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('home');
    }
    /**
     * To list the avg count
     * @return type
     */
    public function statistics()
    {
        return view('home');
    }
    
    /**
     * For adding event
     * @param Request $request
     * @return type
     */
    public function addEvent(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $data = $request->all();
            $valid = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'start_date' => ['required', 'date', 'date_format:Y-m-d'],
                'end_date' => ['required', 'date', 'date_format:Y-m-d'],
            ]);
            if($valid){
                UserEvent::create([
                    'name' => $data['name'],
                    'start_date' => $data['start_date'],
                    'end_date' => $data['end_date'],
                    'user_id' => Auth::user()->id    
                ]);
                return redirect('/home', 301);
            }
            
            
        }
        return view('add_event');
    }
}
