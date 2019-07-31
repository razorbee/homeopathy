<?php

namespace App\Http\Controllers;


use App\Model\About;
use App\Model\Appointment;
use DotEnvEditor\DotenvEditor;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show dashboard
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Show webpage
     */
    public  function welcome() {
        if(config('app.has_installed') == 1){
          
          return redirect()->to('/login');
          /*$appointment = Appointment::all();
          return view('welcome',[
              'appointments'  =>  $appointment
           
          ]);*/
        }else{
            return redirect()->to('/install');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Show install page
     */
    public function install()
    {

        if (config('app.has_installed') == 0) {
            return view('install.install');
        } else {
            return redirect()->back();
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show account is disable
     */
    public function accountDisable()
    {
        return view('errors.account-disable');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show access denied page
     */
    public function accessDenied()
    {
        return view('errors.permission-denied');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show appointment page
     */
     public function appointment()
    {
        $appointment = Appointment::all();
        return view('welcome',[
            'appointments'  =>  $appointment,
            
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Save about me page
     */
    public function saveAboutMe(Request $request)
    {
        if(count(About::all()) == 0){
            $about = new About();

        }else{
            $about = About::first();
        }
        $about->about = $request->get('about');
        $about->save();
        return response()->json('ok',200);


    }
    public function file()
    {
        return view('user.doctor.file_manager.index');
    }
    public function scan(){
        $dir = "files";

// Run the recursive function 

$response = scan($dir);


// This function scans the files folder recursively, and builds a large array

function scan($dir){

	$files = array();

	// Is there actually such a folder/file?

	if(file_exists($dir)){
	
		foreach(scandir($dir) as $f) {
		
			if(!$f || $f[0] == '.') {
				continue; // Ignore hidden files
			}

			if(is_dir($dir . '/' . $f)) {

				// The path is a folder

				$files[] = array(
					"name" => $f,
					"type" => "folder",
					"path" => $dir . '/' . $f,
					"items" => scan($dir . '/' . $f) // Recursively get the contents of the folder
				);
			}
			
			else {

				// It is a file

				$files[] = array(
					"name" => $f,
					"type" => "file",
					"path" => $dir . '/' . $f,
					"size" => filesize($dir . '/' . $f) // Gets the size of this file
				);
			}
		}
	
	}

	return $files;
}



// Output the directory listing as JSON

header('Content-type: application/json');

echo json_encode(array(
	"name" => "files",
	"type" => "folder",
	"path" => $dir,
	"items" => $response
));
    }
}
