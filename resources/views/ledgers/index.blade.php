@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- INGOING TRIGGER -->
<div class="px-2">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingoing">
    Going In
  </button>
<!-- Modal -->
<div class="modal fade" id="ingoing"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Passerby Form (Going In)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
   

              <form action="/ledgers" method="POST">
              @csrf
                <div class="row">
                  <div class="col">
                    <label for="fname ">First Name:</label>
                    <input type="text" class="form-control" id="fname" name="fname" required>
                  </div>
                  
                  <div class="col">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" name="lname" required>
                  </div>

                  
                  <div class="col">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" required>
                    @error('age')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror  
                  </div>
                </div>

                <div class="row pb-1 pt-2">               
                  <div class="col">
                    <label for="id_type">ID Type:</label>
                    <input type="text" class="form-control" id="id_type" name="id_type" required>
                  </div>

                  <div class="col">
                    <label for="id_number">ID Number:</label>
                    <input type="text" class="form-control" id="id_number" name="id_number" required>    
                  </div>
                </div>
                
                <div class="row pb-1">                 
                  <div class="col">
                    <label for="mode_of_transpo">Mode of Transportation:</label>
                    <input type="text" class="form-control" id="mode_of_transpo" name="mode_of_transpo" required>
                  </div>
                </div>
                
                <div class="row pb-1">                  
                  <div class="col">
                    <label for="vplatenum">Plate Number:</label>
                    <input type="text" class="form-control" id="vplatenum" name="vplatenum">  
                  </div>
                </div> 
                
                <div class="row">
                  <div class="col">
                    <label for="purpose">Purpose:</label>
                    <textarea id="purpose" class="form-control" name="purpose" rows="2" cols="30" required></textarea>    
                  </div>

                  <div class="col">
                    <label for="destination">Destination:</label>
                    <textarea id="destination" class="form-control" name="destination" rows="2" cols="30" required></textarea>  
                  </div>
                </div>

                
                <div class="row pb-1">
                  <div class="col"><br>
                    <label for="border_name">Border Name:</label>
                    <select style="width:350px" name="border_name" id="border_name" class="form-control" required> 
                    <option value=''></option>
                    </select>
                  </div>
                </div>
                
                <input name="path" type="hidden" value="1">
                
                <div class="modal-footer">
                  <input type="submit" class="btn btn-secondary" value="Add Record">
                </form>
                </div>
      </div>
    </div>
  </div>
</div>

<!-- OUTGOING TRIGGER -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#outgoing">
  Going Out
</button>

<!-- Modal -->
<div class="modal fade" id="outgoing"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Passerby Form (Going Out)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
   

              <form action="/ledgers" method="POST">
              @csrf
                <div class="row">
                  <div class="col">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" name="fname" required>
                  </div>
                  
                  <div class="col">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" name="lname" required>
                  </div>

                  
                  <div class="col">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                  </div>
                </div>
                
                <div class="row pb-1 pt-2">               
                  <div class="col">
                    <label for="id_type">ID Type:</label>
                    <input type="text" class="form-control" id="id_type" name="id_type" required>
                  </div>

                  <div class="col">
                    <label for="id_number">ID Number:</label>
                    <input type="text" class="form-control" id="id_number" name="id_number" required>    
                  </div>
                </div>
              
                <div class="row pb-1">                 
                  <div class="col">
                    <label for="mode_of_transpo">Mode of Transportation:</label>
                    <input type="text" class="form-control" id="mode_of_transpo" name="mode_of_transpo" required>
                  </div>
                </div>
                
                <div class="row pb-1">                  
                  <div class="col">
                    <label for="vplatenum">Plate Number:</label>
                    <input type="text" class="form-control" id="vplatenum" name="vplatenum">  
                  </div>
                </div> 
                
                <div class="row pb-1">
                  <div class="col">
                    <label for="purpose">Purpose:</label>
                    <textarea id="purpose" class="form-control" name="purpose" rows="2" cols="30" required></textarea>    
                  </div>

                  <div class="col">
                    <label for="destination">Destination:</label>
                    <textarea id="destination" class="form-control" name="destination" rows="2" cols="30" required></textarea>  
                  </div>
                </div>

                
                <div class="row pb-1">
                  <div class="col"><br>
                    <label for="border_name">Border Name:</label>
                    <select style="width:350px" name="border_name" id="border_nameout" class="form-control" required> 
                    <option value=''></option>
                    </select>
                  </div>
                </div>
                
                <input name="path" type="hidden" value="2">
                
                <div class="modal-footer">
                  <input type="submit" class="btn btn-secondary" value="Add Record">
                </form>
                </div>
      </div>
    </div>
  </div>
</div>

<br><br>
<table class="table table-striped">
         <thead>
         <tr>
            <th>Date Created</th>
            <th>Name</th>
            <th>ID Type</th>
            <th>ID Number</th>
            <th>Plate Number</th>
            <th>Border Name</th>
            <th>Going In/Going Out</th>
            <th></th>
         </tr>
         </thead>
         <tbody>
            @foreach($ledgers as $ledger)
            <tr>
               <td>{{ $ledger->created_at }}</td>
               <td>{{ $ledger->fname }} {{ $ledger->lname }}</td>
               <td>{{ $ledger->id_type }}</td>
               <td>{{ $ledger->id_number }}</td>
               @if(is_null($ledger->vplatenum))
               <td>N/A</td>
               @endif
               @if(!is_null($ledger->vplatenum))
               <td>{{ $ledger->vplatenum }}</td>
               @endif
               <td>{{ $ledger->border_name }}</td>
               @if($ledger->path == 1)
               <td>Going In</td>
               @else
               <td>Going Out</td>
               @endif
               <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewinfo-{{ $ledger->id }}">
                View
              </button>
              
              <div class="modal fade" id="viewinfo-{{ $ledger->id }}" role="dialog" aria-labelledby="viewinfo-{{ $ledger->id }} aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="viewinfo-{{ $ledger->id }}">Ledger Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form action="#">

          <div class="row">

            <div class="col">
            <label>First Name:</label>
            <input class ="form-control" type="text" value=" {{$ledger->fname}}" readonly>
            </div> 
            
            <div class="col">
            <label>Last Name:</label>
            <input class ="form-control" type="text" value="{{$ledger->lname}}" readonly>
            </div> 

            <div class="col">
              <label>Age:</label>
              <input class ="form-control" type="text" value="{{$ledger->age}}" readonly>
              </div> 
          </div>

          <div class="row pb-1 pt-2">
            <div class="col">
            <label>ID Type:</label>
            <input class ="form-control" type="text" value=" {{$ledger->id_type}}" readonly>
            </div>

            <div class="col">
             <label>ID Number:</label>
             <input class ="form-control" type="text" value=" {{$ledger->id_number}}" readonly>  
            </div>     
          </div>

          <div class="row pb-1">
            <div class="col">
            <label>Mode of Transportation:</label>
            <input class ="form-control" type="text" value="{{$ledger->mode_of_transpo}}" readonly>
            
            </div> 
          </div>     

          @if(!is_null($ledger->vplatenum))
          <div class="row pb-1">
              <div class="col">
              <label>Plate Number:</label>
              <input class ="form-control" type="text" value="{{$ledger->vplatenum}}" readonly>
              </div>
          </div>
          @endif
                                
          <div class="row pb-1">
            <div class="col">
            <label>Purpose:</label>
              <textarea class="form-control" rows="2" cols="30" readonly>{{$ledger->purpose}}</textarea>  
            </div>

            <div class="col">
            <label>Destination:</label>
              <textarea class="form-control" rows="2" cols="30" readonly>{{$ledger->destination}}</textarea>
            </div>     
          </div>

          <div class="row">
            <div class="col">
            <label>Border Name:</label>
              <input class="form-control" type="text" value="{{$ledger->border_name}}" readonly>
              </div> 
          </div>

          </form>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
</td>
</tr>
@endforeach
         </tbody>
      </table>
      {{ $ledgers->links() }}


<script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$('#border_name').select2({
  tags: true,
  placeholder: 'Select border',
  ajax: {
    url: "{{route('borders.dataAjax')}}",
    type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              _token: CSRF_TOKEN,
              search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }
}),

$('#border_nameout').select2({
  placeholder: 'Select border',
  tags: true,
  ajax: {
    url: "{{route('borders.dataAjax')}}",
    type: "post",
          dataType: 'json',
          delay: 150,
          data: function (params) {
            return {
              _token: CSRF_TOKEN,
              search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }
});
</script>
@endsection