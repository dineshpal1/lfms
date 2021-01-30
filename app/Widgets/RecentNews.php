<?php

namespace App\Widgets;
use App\Client;
use Arrilot\Widgets\AbstractWidget;

class RecentNews extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
       
         $clients=Client::orderBy("id","DESC")->take(5)->get();
        return view('widgets.recent_news', [
            'config' => $this->config,
             'clients'=>$clients
        ]);
         /*
        $clients=Client::all()->orderBy("id","DESC")->get();
         return view('Admin.admin_dashboard', [
            //'config' => $this->config,
            'clients'=>$clients
        ]);
        */
    }
}
