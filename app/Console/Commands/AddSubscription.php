<?php

namespace App\Console\Commands;

use App\User;
use App\Order;
use App\Membresia;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AddSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizacion automatica de las suscripciones';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {

            if ($user->orders->count() > 0) {
                foreach ($user->orders as $order) {
                    if ($order->status_id == 2 && Carbon::create($order->fin)->subDay()) {

                        $order = Order::findOrFail($order->id);
                        $membresia = Membresia::findOrFail($order->membresia_id);


                        $date = Carbon::create(now());
                        $end = Carbon::create(now());

                        switch ($membresia->frecuencia->id) {
                            case '1':
                                $end->addYear()->subDay();
                                break;
                            case '2':
                                $end->addMonth(6)->subDay();
                                break;
                            case '3':
                                $end->addMonth(3)->subDay();
                                break;
                            case '4':
                                $end->addMonth()->subDay();
                                break;
                        }

                        $order->update([
                            'status_id' => 4,

                        ]);

                        Order::create([
                            'membresia_id' => $membresia->id,
                            'amount' => $membresia->price_with_discount,
                            'description' => 'Automatica',
                            'created_by' => "Automatica",
                            'user_id' => $user->id,
                            'status_id' => 1,
                            'inicio' => $date,
                            'fin' => $end,
                        ]);
                        //enviar email despues
                    }
                }
            }
        }
    }
}
