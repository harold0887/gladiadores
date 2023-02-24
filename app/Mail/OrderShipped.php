<?php

namespace App\Mail;

use App\Membresia;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $idSuscripcion, $price, $type, $inicio, $fin, $userName;
    public function __construct($membresia, $userName)
    {
        $this->userName=$userName;
        $this->subject = "Suscripción -" . $membresia->name;
        $this->price = $membresia->price_with_discount;
        $this->type = $this->type = $membresia->name;
        $this->inicio = date_format(new Carbon(now()), 'd-M-Y');
        $end = new Carbon(now());
        switch ($membresia->frecuencia->id) {
            case '1':
                $this->fin = date_format($end->addYear()->subDay(), 'd-M-Y');
                break;
            case '2':
                $this->fin = date_format($end->addMonth(6)->subDay(), 'd-M-Y');
                break;
            case '3':
                $this->fin = date_format($end->addMonth(3)->subDay(), 'd-M-Y');
                break;
            case '4':
                $this->fin = date_format($end->addMonth()->subDay(), 'd-M-Y');
                break;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.shipped');
    }
}
