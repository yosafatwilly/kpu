@component('mail::message', ['token' => $token, 'pemilu' => $pemilu])
Terimakasih telah mendaftar menjadi pemilih, gunakan password dibawah ini untuk login saat melakukan pemilihan.
<br>
<center><strong>Token  : {{$token}} </strong></center>
<center><strong>Tema   : {{$pemilu->tema_pemilu}} </strong></center>
@endcomponent
