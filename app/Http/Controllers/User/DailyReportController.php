<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\DailyReportRequest;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\DailyReportSearchMonthRequest;

class DailyReportController extends Controller
{
    private $report;

    public function __construct(DailyReport $dailyReport)
    {
        $this->middleware('auth');
        $this->report = $dailyReport;
    }

    /**
     * Display a listing of the resource.
     * @param  DailyReportSearchMonthRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(DailyReportSearchMonthRequest $request)
    {
        $user_id = Auth::id();
        $input = $request->all(); 
        if(empty($input)){
            $reports = $this->report->where('user_id', $user_id)->get();
        } else {
            $reports = $this->report->where('user_id', $user_id)->where('reporting_time', 'like', '%'. $input['search-month']. '%')->get();
        }
        return view('user.daily_report.index', compact('reports', 'input'));
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
     * @param  DailyReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
       $report = $request->all();
       $report['user_id'] = Auth::id();
       $this->report->fill($report)->save();
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
        $report = $this->report->find($id);
        return view('user.daily_report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $report = $this->report->find($id);
       return view('user.daily_report.edit', compact('report'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DailyReportRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
       $report = $request->all();
       $this->report->find($id)->fill($report)->save();
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
        $this->report->find($id)->delete();
        return redirect()->route('dailyreport.index');
    }
}
