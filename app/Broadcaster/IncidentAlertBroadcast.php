<?php
namespace App\Broadcaster;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class IncidentAlertBroadcast implements ShouldBroadcast {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return ['incident-alerts'];
    }

    public function broadcastAs()
    {
        return 'ialerts';
    }
    
}