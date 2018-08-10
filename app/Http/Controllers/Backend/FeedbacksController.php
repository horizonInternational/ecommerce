<?php

namespace App\Http\Controllers\Backend;
use App\Feedbacks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedbacks::orderBy('feedbacks_id', 'DESC')->paginate(8);
        return view('backend.feedback.list_feedback', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Feedback();
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        $data['fname'] = $request->fname;
        $data['lname'] = $request->lname;
        $data['email']= $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        $item->save();
        return view('frontend.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $feedbackId=$request->id;
        $feedback = Feedbacks::where('feedbacks_id',$feedbackId)->first();
        return view('backend.feedback.view_feedback', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $feedbackId = $request->id;
        if ( Feedbacks::where('feedbacks_id',$feedbackId)->delete()) {
            return redirect()->route('feedbacks')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('feedbacks')->with('error','Sorry,the record couldn\'t be deleted');
    }

}