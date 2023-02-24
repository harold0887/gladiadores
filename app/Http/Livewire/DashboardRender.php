<?php

namespace App\Http\Livewire;

use App\Membresia;
use App\User;
use App\Order;
use Carbon\Carbon;
use Livewire\Component;

class DashboardRender extends Component
{
    public  $users, $dias = 10, $month, $year, $membresias, $membresiaSelect = [];


    public function mount()
    {
        $this->users = User::all();


        $this->month = date("m");
        $this->year = date("Y");
        $this->membresias = Membresia::whereNotIn('id', [1])->get();
        $this->membresiaSelect;
    }



    public function render()
    {

        //cambiar el valor del type dependiendo del select
        switch ($this->membresiaSelect) {
            case '':
                $type = [1, 2, 3, 4, 5, 6, 7, 8];
                break;
            case 1:
                $type = [1];
                break;
            case 2:
                $type = [2];
                break;
            case 3:
                $type = [3];
                break;
            case 4:
                $type = [4];
                break;
            case 5:
                $type = [5];
                break;
            case 6:
                $type = [6];
                break;
            case 7:
                $type = [7];
                break;
            case 8:
                $type = [8];
                break;
            default:
                $type = [1, 2, 3, 4, 5, 6, 7, 8];
                break;
        }



        //consulta los proximos dentro de 10 dias vencimientos sin ser inscripciones y solo ordenes activas
        $proximos = Order::where(function ($query) {
            $query
                ->where('status_id', 2)
                ->whereNotIn('membresia_id', [1])
                ->whereBetween('fin', [Carbon::create(now()), Carbon::create(now())->addDays($this->dias)]);
        })
            ->orderBy('fin', 'asc')
            ->get();

        $ingresos = Order::where(function ($query) {
            $query
                ->where('status_id', 2)
                ->whereYear('date_payment', '=', $this->year)
                ->whereMonth('date_payment', '=', $this->month);
        })
            ->sum('amount');

        $active = Order::where('status_id', 2)
            ->whereNotIn('membresia_id', [1])
            ->whereIn('membresia_id', $type)
            ->get();


        return view('livewire.dashboard-render', compact('proximos', 'ingresos', 'active'));
    }
}
