
@extends('backend')

@section('content')


    <title>BlindVision FullCalendar</title>

<link href="/js/calendriercss/fullcalendar.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 40px;
        padding-left: 100px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    #calendar {
        width: 900px;
    }
    .col-centered{
        float: none;
        margin: 0 auto;
    }

    </style>



</head>

<body>

 @include('flash-message')
    <div class="container">
      <div class="row">
            <div class="col-lg-14 text-center">
            <div id="calendar" class="col-centered">
                </div>
            </div>
              </div>

        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
        style="margin-top:70px;color:#0071c5;height:900px; ">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                  {!! Form::open(['url' => '/events', 'class' => 'form-horizontal', 'files' => true]) !!}
              <div class="modal-header">
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <center> <h4 class="modal-title" id="myModalLabel" style=" font-weight: bold;margin-top:50px;color: #04A9A9;" value="#0071c5">Add Event</h4></center>
              </div>
                <div class="form-group">
          
                    <label for="title" class="col-sm-2 control-label" style="margin-left:50px;color: #43c6ac;">Title</label>
                    <div class="col-sm-10">
                  
                    <input type="text" name="title" class="form-control" id="title" placeholder="title" style="color:#00;width: 500px;margin-left:45px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label" style="margin-left:50px;color: #43c6ac;">Color</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color" style="color:#00;width: 500px;margin-left:45px;"s>
                          <option value="">Choose</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                          <option style="color:#008000;" value="#008000">&#9724; Green</option>                       
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                          <option style="color:#000;" value="#000">&#9724; Black</option>
                          
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="start" class="col-sm-2 control-label" style="margin-left:50px;color: #43c6ac;">Start date</label>
                    <div class="col-sm-10">
                      
                      <input type="text" name="start" class="form-control" id="start" placeholder="start" style="color:#00;width: 500px;margin-left:45px;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="end" class="col-sm-2 control-label" style="margin-left:50px;color: #43c6ac;">End date</label>
                    <div class="col-sm-10">
                       
                       <input type="Date" name="end" class="form-control" id="end" placeholder="end" style="color:#00;width: 500px;margin-left:45px;">
                    </div>
                  <br>
                <br>
             <br>
             <div class="col-sm-9">
                <button type="button"  style="margin-top: -50px;margin-right:45px;   " class="btn -primary _pull-right" data-dismiss="modal" > Close </button>
                  {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn -primary _pull-left',
                   'style'=> "margin-left:  30px;margin-top: -50px;  " ]) !!}
               
                 {!! Form::close() !!} 
            </div>
         </div>
       </div>
     </div>
   </div>
     </div>


        
        <!-- Modal -->
        <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
            <div id="calendar" class="col-centered">
                </div>
            </div>
              </div>
        <div class="modal fade" id="ModalEdit"  tabindex="-1" role="dialog" style="margin-top:70px;color:#0071c5;" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document" >
            <div class="modal-content" style="background: #fff;">

              <div class="row">
              <div class="">
                         
             
                       
              <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><strong><h4 class="modal-title" id="myModalLabel" style=" font-weight: bold;margin-top:50px;color: #04A9A9;" value="#0071c5">Edit Event</h4></strong></center>
              </div>
              <div class="modal-body">
                      @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                 <form id="myform" action="" method="GET" >
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label" style="margin-left:50px;color:#43c6ac ;">Id event</label>
                    <div class="col-sm-10">
                         <input type="text" name="id_event" class="form-control" style="color:#00;width: 500px;margin-left:45px;" id="id" placeholder="id event">
                         
                    </div>
                  </div>
             
                <div class="form-group">
          
                    <label for="title" class="col-sm-2 control-label" style="margin-left:50px;color: #43c6ac;">Title</label>
                    <div class="col-sm-10">
                  
                    <input type="text" name="title" class="form-control" style="color: #000;width: 500px;margin-left:45px;" id="title" placeholder="title">
                    </div>
                  </div>

                   
            <div class="form-group">
                    <label for="color" class="col-sm-2 control-label" style="margin-left:50px;color: #43c6ac;">Color</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color" style="color:#000; width: 500px;margin-left:45px;">
                          <option value="">Choose</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                          <option style="color:#008000;" value="#008000">&#9724; Green</option>                       
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                          <option style="color:#000;" value="#000">&#9724; Black</option>
                          
                        </select>
                    </div></div>
                 
                   <div class="form-group"> 
                   <div class="col-sm-offset-2 col-sm-10">
                
                  </div>
                </div>
                  
                  <input type="hidden" name="id" class="form-control" id="id">
                
                
              </div>

               <div class="col-sm-10">
                <button type="button"  style="margin-right:  50px;  " class="btn -primary _pull-right" data-dismiss="modal"> Close </button>
 
               <button type="submit" name="action" value="Update" style="margin-left:  30px;  " class="btn -primary _pull-left"> edit </button>
               <button type="submit" name="Delete" value="Delete" style="margin-left:  3px;  " class="btn -primary _pull-left"> Delete </button>

             
                 </form>
            </div>
            </div>
       <br><br><br>
            </div>
   


          <script src="{{URL ::asset('/js/calendrierjs/jquery.js')}}" type="text/javascript"></script>
          <script src="{{URL ::asset('/js/calendrierjs/bootstrap.min.js')}}" type="text/javascript"></script>
          <script src="{{URL ::asset('/js/calendrierjs/moment.min.js')}}" type="text/javascript"></script>
         <script src="{{URL ::asset('/js/calendrierjs/fullcalendar.min.js')}}" type="text/javascript"></script>


    
    <script>

    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                var today = new Date();
                today = new Date ( today.getFullYear(), today.getMonth(), today.getDate() );
                if(today>start){
                  $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('');
              }if(end<start){
                  $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('');
              }
              if(today<start){
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            }},
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
            
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit #myform').attr('action', "/editcalendar/"+event.id);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);
             ;

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);

            },
            events: [
            <?php foreach($events as $event): 
            
                $start = explode(" ", $event['start']);
                $end = explode(" ", $event['end']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['start'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['end'];
                }
            ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                },
            <?php endforeach; ?>
            ]
        });
        
     
        
    });

</script>

</body>


@endsection










