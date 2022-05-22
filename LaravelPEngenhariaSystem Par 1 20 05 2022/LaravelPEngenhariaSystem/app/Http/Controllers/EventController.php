<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller

{
    //
     //
     public function index(){
        
        //It has doing the search in Data Base
        $search = request('search');
        if($search){
            $event =  Event:: where([
            ['title', 'like', '%'.$search.'%' ]

            ]) ->get() ;

        }
        else{

            $event = Event::all();//It has calling all events of database

        }
        
        
       // $event = Event::all();//It has calling all events of database

        return view ('welcome',['event'=> $event, 'search'=>$search]);// It has sending these parameter

     }

     //For event of the data base
     public function destroy($id)
     {
        Event:: findOrFail($id)-> delete();//It has deleting by the primary code

        return redirect('/dashboard')-> with ('msg', 'Evento excluido com sucesso');
     }

        public function store( Request $request){
            $event = new Event;
            
            $event -> title =$request->title;
            $event -> date = $request ->date;
            $event -> city = $request -> city;
            $event-> private = $request ->private;
            $event -> description = $request -> description;
            //created_at It has taking real time
            $event -> updated_at	= $request -> updated_at	;
            $event -> image = $request -> image;

            $event->items = $request->items;

            //For It has working with image:
            if($request-> hasfile('image') && $request->file('image')->isValid())
            {
                $requestImage = $request-> image;

                $extension= $requestImage->extension();

                //It has taking real time and It puts the file MD5
               
                $imageName = md5($requestImage -> getClientOriginalName().strtotime('now')) . "." .$extension;
               
                    //It has putting in project public_path
                $requestImage ->move(public_path('img/events'),$imageName);
                $event-> image = $imageName;//It has saving in Data Base
            }   

            // It has taking the login user of the data base
            $user= auth()->user();
            $event-> user_id = $user->id;

            $event -> save();

            //return redirect ('/');
            // For It has creating msg to user
            return redirect ('/') -> with('msg', 'Evento criado com sucesso'); 
        }

        
        public function create(){
            return view ('/events.create');
    
        }

/*
            public function show(){
       $events = Event::all();//It has calling all events of database

        

        //$eventOwer = User:: where ('id', $event -> user_id) -> first()->toArray();

        return view ('/events.show',['events'=> $events, 'eventOwer'=> $eventOwer]);

            return view ('/events.show');
*/
      public function show($id){
       // $event = Event::all();//It has calling all events of database
        
        $event = Event:: findOrFail($id);//It has taking id of the Data Base exemple array()
        // it has cheking if user already joined some event
        $user = auth()->user();

        $hasUserJoined = false;
        if($user)
        {// It has taking all array user
            $userEvents = $user-> eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent){
                if($userEvent['id']== $id){// This id is of the event
                    $hasUserJoined = true;


                }

            }
        }


        //$events = Event::all();
        //It has finding  user first that can be find
        $eventOwer = User::where ('id', $event->user_id) -> first()->toArray(); //It has transforming object in array
        //return view('events.show',['event'=> $event]);
        return view('events.show',['event'=> $event, 'eventOwer'=>$eventOwer, 'hasUserJoined' => $hasUserJoined]);


        }

        public function dashboard(){

            $user = auth()->user();
            $event= $user->events;//It has using data of the model

            $eventsAsParticipant= $user->eventsAsParticipant;


            return view('events.dashboard', ['event'=>$event, 'eventasparticipant' => $eventsAsParticipant]);


        }
        public function joinEvent($id){
            //Auth has been logged
            $user = auth()->user();

            $user->eventsAsParticipant()->attach($id);// It has saving the user at event

            
            $event= Event:: findOrFail($id);

            return redirect('/dashboard')->with ('mgs', 'Sua presença está confirmada no evento'.$event->title);


        }
              public function showAll(){
            $events = Event::all();//It has calling all events of database
     
             
     
             //$eventOwer = User:: where ('id', $event -> user_id) -> first()->toArray();
     
            // return view ('/events.show',['events'=> $events, 'eventOwer'=> $eventOwer]);
     
                 return view ('/events.showcopy', ['event'=> $events]);
                
                }
                //It has doing all event's edic 
                public function edit($id)
                {//It has taking data of the data base
                    
                    $user= auth() -> user();

                    
                    $event= Event::findOrFail($id);
                    //It has checking if user can use or to see event
                    if($user->id != $event->user_id){

                        return redirect('/dashboard');
                    }
        


                    return view('events.edit', ['event'=>$event]  );
                }

                public function update(Request $request){
                    $data = $request->all();

                    


                    //For It has working with image:
                    if($request-> hasfile('image') && $request->file('image')->isValid())
                    {
                        $requestImage = $request-> image;
        
                        $extension= $requestImage->extension();
        
                        //It has taking real time and It puts the file MD5
                       
                        $imageName = md5($requestImage -> getClientOriginalName().strtotime('now')) . "." .$extension;
                       
                            //It has putting in project public_path
                        $requestImage ->move(public_path('img/events'),$imageName);
                        $data ['image']=$imageName;//It has saving in Data Base
                    }   
                    Event::findOrFail($request->id) ->update($data);


                    return redirect('/dashboard')->with('msg', 'Evento editado com sucesso !!');

                }


                public function leaveEvent($id){
                    $user = auth()->user();
                    // It has deleting the link 
                    $user ->eventsAsParticipant()->detach($id);
                    
                    $event= Event::findOrFail($id);

                    return redirect('/dashboard')-> with('msg', 'Você saiu com sucesso do evento:' .$event->title);


                }

}
