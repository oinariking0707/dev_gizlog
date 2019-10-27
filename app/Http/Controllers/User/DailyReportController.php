<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\DailyReportRequest;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Illuminate\Support\Facades\Auth;

class DailyReportController extends Controller
{

    private $daily;

    public function __construct(DailyReport $instanceClass)
    {
        $this->middleware('auth');
        $this->daily = $instanceClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $dailies = $this->daily->all();
        
        return view('user.daily_report.index',compact('dailies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
       $daily = $request->all();
       $daily['user_id'] = Auth::id();
       $this->daily->fill($daily)->save();
       return redirect()->route('dailyreport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daily = $this->daily->find($id);
        return view('user.daily_report.show',compact('daily'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $daily = $this->daily->find($id);
       return view('user.daily_report.edit',compact('daily'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
       $daily = $request->all();
       $this->daily->find($id)->fill($daily)->save();
       return redirect()->route('dailyreport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->daily->find($id)->delete();
        return redirect()->route('dailyreport.index');
    }
}
