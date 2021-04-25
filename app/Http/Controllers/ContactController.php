<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailServices;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function send(Request $request)
    {
        $request = $request->all();
        if(isset($request['email']) && !empty($request['email'])){
            
                $emailServices = new EmailServices;
                $emailServices->contact($request['nombre'], $request['email'], $request['mensaje']);
                return View('front.contact')->with([
                    'allcorrect' => 'mensaje envíado con éxito'
                ]);
                
            }else{
                return back()->withErrors([
                    'errors'=> 'No se ha enocontrado al ususrio',
                ]);
            }
        
        return back()->withErrors([
            'errors'=> 'completa los campos requeridos',
        ]); 
    }
}
