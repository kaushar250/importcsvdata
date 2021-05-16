<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvimportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_object = course::all()->toArray();
        return view("viewcsvdata",compact('course_object'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("csv_import");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            "csv_import"=>"required|mimes:csv,txt"
        ]);
        $path   = $request->file('csv_import');
        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
            print_r($data);
        } else {
            $data = array_map('str_getcsv', file($path));
        }
        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;    
                }
            }   
            $csv_data = array_slice($data, 0, 2);
            /** checking the part whether the course_name and course_code column is empty or not */
            foreach ($data as $key => $value) 
            {
                if ($key === 0)
                {
                    $headers[] = $value;
                } 
                else
                {
                    for($i=0;$i<3;$i++)
                    {
                        if(strpos($headers[0][$i],"course_name") !== false)
                        {
                            if($value[$i]=="")
                            {
                                $message="course_name column is missing";
                                return view("csv_import")->with("message",$message);
                               // exit(1);
                                
                            }
                         }
                        if(strpos($headers[0][$i],"course_code") !== false)
                        {
                            if($value[$i]=="")
                            {
                                $message= "course_code column is missing";
                                return view("csv_import")->with("message",$message);
                                //exit(1);
                            }
                        }
                       
                    } /** end of for loop */
                }  /** end of else condition */
            } /** end of foreach loop */ 
         /** end of that part */
            foreach ($data as $key => $value) 
            {
                if ($key === 0)
                {
                    $headers[] = $value;
                } 
                else
                {
                    for($i=0;$i<3;$i++)
                    {
                        if(strpos($headers[0][$i],"course_name") !== false)
                        {
                            $course_name=array("course_name"=>$value[$i]);
                        }
                        if(strpos($headers[0][$i],"course_code") !== false)
                        {
                            $course_code = array("course_code"=>$value[$i]);
                        }
                        if(strpos($headers[0][$i],"course_info") !== false)
                        {
                            $course_info = array("course_info"=>$value[$i]);
                        }
                       
                    } /** end of for loop */
                        $res = array_merge($course_name, $course_code,$course_info);
                        course::create($res);
                } 
            } /** end of foreach loop */ 
            $message="Data has been imported successfully";
            return view("csv_import")->with("message",$message);
        }
        else 
        {
            $message="There is no data in csv file";
            return view("csv_import")->with("message",$message);
           //return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        //
    }
}
