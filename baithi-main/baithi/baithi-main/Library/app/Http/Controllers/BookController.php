<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function search(Request $request){

        if($request->ajax()){
            $data=book::where('id','like','%'.$request->search.'%')
                ->orwhere('title','like','%'.$request->search.'%')->get();
            $output='';
            if(count($data)>0){

                $output ='
            <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Authorid</th>
                <th scope="col">ISBN</th>
                <th scope="col">Public Year</th>
                <th scope="col">Aviable</th>
            </tr>
            </thead>
            <tbody>';

                foreach($data as $row){
                    $output .='
                    <tr>
                    <th scope="row">'.$row->id.'</th>
                    <td>'.$row->title.'</td>
                    <td>'.$row->authorid.'</td>
                    <td>'.$row->ISBN.'</td>
                    <td>'.$row->pub_year.'</td>
                    <td>'.$row->available.'</td>
                    </tr>
                    ';
                }
                $output .= '
             </tbody>
            </table>';
            }
            else{
                $output .='No results';
            }
            return $output;
        }
    }
}
