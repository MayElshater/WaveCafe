<x-mail::message>
<div >
   Hello {{ $data['name']}},
<br><br>
</div>
<div >
    {{$data['email']}}
</div>
<br><br>
<div >
    {{$data['message']}}
</div>
 
</x-mail::message>