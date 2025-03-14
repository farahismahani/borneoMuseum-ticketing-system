<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\ShowAllForm;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function ticket()
    {
        return view('ticket');
    }

    public function form()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // Create a new instance of the model and fill it with data
        Form::create([
            'name'=>$request->name,
            'email'=>$request->email,
            't_type'=>$request->t_type,
            'nationality'=>$request->nationality,
            'date'=>$request->date,
            'time'=>$request->time,
            'quantity'=>$request->quantity,
        ]);

        return redirect()->route('museum.ticket')->with('info','You will receive an email 
        for the purchase receipt!');
    }

    public function readform_page() 
    { 
        return view('readform', [ 
'       data'=>Showallform::findorFail('$id') 
        ]); 
    }

    public function showform_page() 
    { 
        $ShowAllData = DB::table('ticketforms')->orderby('id','desc')->paginate(10); 
        return view('showform')->with('alldata', $ShowAllData); 
    } 

    public function updateform_page($id) 
    { 
       
        return view('updateform', [ 
            'data'=>Showallform::findorFail('$id') 
        ]); 
    } 
 
    public function update(Request $request, $id) 
    { 
        Form::where('id', $id)->update([ 
            'name' => $request->name, 
            'email' => $request->email, 
            't_type' => $request->t_type, 
            'nationality' => $request->nationality, 
            'date' => $request->date, 
            'time' => $request->time, 
            'quantity' => $request->quantity 
        ]); 
        return redirect(route('showform'))->with('info', 'Form has been updated'); 
    } 
    
    public function destroy($id) 
    { 
        Form::destroy($id); 
        return redirect(route('showform'))->with('warning', 'Form has been deleted'); 
    }


    



}
