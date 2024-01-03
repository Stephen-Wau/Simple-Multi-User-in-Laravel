<?php


namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{

    use Queueable,
        SerializesModels;

    var $name = "";
    var $link = "";

    public function __construct($name, $link){
        $this->name = $name;
        $this->link = $link;
    }

    public function build(){
        $data = array(
            'name' => $this->name,
            'link' => $this->link,
        );

        return $this->from('kuliahppl@gmail.com')->view('email/reset')->with(['data'=>$data]);
    }

}
