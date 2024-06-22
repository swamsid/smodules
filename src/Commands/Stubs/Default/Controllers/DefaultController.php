<?php

namespace __defaultNamespace__\Controllers;

use App\Http\Controllers\Controller;
use __defaultNamespace__\Requests\StoreRequest;
use __defaultNamespace__\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Log;

class __childModuleName__Controller extends Controller
{

    public function index(Request $request)
    {
        DB::beginTransaction();
        
        try {    

            // your code here
            
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('__moduleName__Controller@index => '.$th);
            
            return response()->json([
                'status'    => 'error',
                'message'   => 'Ups. sistem mengalami masalah. error ini tidak biasa, segera hubungi developer dan coba lagi nanti. T_T'
            ], 500);
        }
    }

    public function show(Request $request, $id = null)
    {
        DB::beginTransaction();
     
        try {

            // your code here
            
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('__moduleName__Controller@show => '.$th);
            
            return response()->json([
                'status'    => 'error',
                'message'   => 'Ups. sistem mengalami masalah. error ini tidak biasa, segera hubungi developer dan coba lagi nanti. T_T'
            ], 500);
        }
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
     
        try {

            // your code here

            DB::commit();
            
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('__moduleName__Controller@store => '.$th);
            
            return response()->json([
                'status'    => 'error',
                'message'   => 'Ups. sistem mengalami masalah. error ini tidak biasa, segera hubungi developer dan coba lagi nanti. T_T'
            ], 500);
        }
    }

    public function update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
     
        try {

            // your code here

            DB::commit();
            
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('__moduleName__Controller@update => '.$th);
            
            return response()->json([
                'status'    => 'error',
                'message'   => 'Ups. sistem mengalami masalah. error ini tidak biasa, segera hubungi developer dan coba lagi nanti. T_T'
            ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
     
        try {

            // your code here

            DB::commit();
            
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('__moduleName__Controller@destroy => '.$th);
            
            return response()->json([
                'status'    => 'error',
                'message'   => 'Ups. sistem mengalami masalah. error ini tidak biasa, segera hubungi developer dan coba lagi nanti. T_T'
            ], 500);
        }
    }
}