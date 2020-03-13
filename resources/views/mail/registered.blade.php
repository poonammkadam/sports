
Hi {{($objData['user'])->name}}
    <p> To complete your registration for event Please Upload your payment receipt on following link.  </p>
    <a href="{{url('http://127.0.0.1:8000/upload/receipt/'.$objData['eventparticipant']->id)}}" class="btn btn-info">Upload</a>
