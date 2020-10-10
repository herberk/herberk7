{{--Incrustado en el edit de empresas para mostar logo y notas--}}
 <div class="card mt-2 ">
     <h5 class="ml-4"><strong>Logo y notas de la empresa</strong></h5>
     <div class="row">
         <div class="col-6">
            <div class="row justify-content-center">
                 <img class="rounded-circle" src="/storage/logos/{{ $empresas->logo }}" width="150" height="150" />
             </div>
         </div>
         <div class="col-6">
             <div class="form-group">
                 <label for="comment">Notas:</label>
                 <textarea readonly class="form-control" rows="8" id="editor1">{{$empresas->notas}}</textarea>
             </div>
           </div>
     </div>
 </div>
