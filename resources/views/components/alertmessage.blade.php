<div>
@if(session("alert"))
                        <div class="alert alert-danger font-italic">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="text-white">&times;</span></button>
                            {{session("alert")}}
                        </div>
                        @endif
                     @if(session("msg"))
                        <div class="alert alert-success font-italic">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="text-white">&times;</span></button>
                            {{session("msg")}}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-danger font-italic">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="text-white">&times;</span></button>
                            <ul>
                                @foreach($errors->all() as $error)
                                   <li style="list-style-type:none;">{{$error}}</li>    
    
                                @endforeach
                            </ul>
                            </div>
 @endif
</div>