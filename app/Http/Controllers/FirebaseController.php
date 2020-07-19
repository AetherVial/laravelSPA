<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

class FirebaseController extends Controller

{


	public function index(){

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');

		$firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://testspa-5018d.firebaseio.com')
            ->create();

		$database = $firebase->getDatabase();

		// $newPost = $database
        //     ->getReference('blog/posts')
            // ->push(['title' => 'Post title','body' => 'This should probably be longer.']);

        $Posts = $database
            ->getReference('blog/posts');

		echo"<pre>";

        // print_r($newPost->getvalue());
        // print_r($Posts->getvalue());
        return json_encode($Posts->getvalue());
        
        echo"</pre>";

	}

}

?>